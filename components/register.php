<?php
echo "<h2>".REGISTERHEAD."</h2>";
$template=get_template($db);
if (getUserID($db)) {
    echo ALLR_LOGGED; }
else {
if (isset($_POST['register'])) {
	$error = false;
	if (!isset($_POST['Realname'], $_POST['Username'], $_POST['Password'], $_POST['Email'], $_POST['Antwort'], $_POST['register'])) {
		echo INVALID_FORM;
		$error = true;
		}
    if (!is_array($_POST['Password']) OR count($_POST['Password']) != 2) {
        echo INVALID_FORM;
		$error = true;
		}
    if ($_POST['Password'][0] != $_POST['Password'][1]) {
        echo SAMEPWD;
		$error = true;
		}
	if(($Realname = trim($_POST['Realname'])) == '' OR ($Username = trim($_POST['Username'])) == '' OR ($Password = trim($_POST['Password'][0])) == '' OR ($Email = trim($_POST['Email'])) == '' OR ($Antwort = trim($_POST['Antwort'])) == '') {
		echo EMPTY_FORM;
		$error = true;
		}
	if ('2' != $_POST['Antwort']) {
        echo ANSWER;
		$error = true;
		}
    if (!preg_match('~\A\S{3,30}\z~', $Username)) {
        echo ERROR_USERNAME;
		$error = true;
		}
    $sql='SELECT id FROM user WHERE username = ? LIMIT 1';
    $stmt = $db->prepare($sql);
    if (!$stmt) { return $db->error; }
    $stmt->bind_param('s', $Username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows) {
		echo USED_USERNAME;
		$error = true;
		}
	$stmt->close();
	if(!$error) {
		$sql = "INSERT INTO user(username, email, realname) VALUES ('".$Username."', '".$Email."', '".$Realname."')";
		$result = $db->query($sql);
		if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		$sql = "SELECT id FROM user WHERE username = '".$Username."' LIMIT 1";
		$result = $db->query($sql);
		if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}		
		$UserID=$result->fetch_assoc();
		$Hash = md5(md5($UserID['id']).$Password);
		$sql = "UPDATE user SET password = '".$Hash."' WHERE id =".$UserID['id'];
		$result = $db->query($sql);
		if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		$registered = getRegisteredLevel($db);
		$sql = "INSERT INTO access_user(user_id, access_id) VALUES ('".$UserID['id']."','".$registered['id']."')";
		$result = $db->query($sql);
		if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		$autonews = autoNews($db, 0, 0, AUTONEWS_TITLE, '<p>'.AUTONEWS_TEXT.$Realname.' ('.$Username.')</p>');
		$include_templatefile = './templates/'.$template['dir'].'/register_done.tpl';
		}
	}

if($error or !isset($error)) {	
	$include_templatefile = './templates/'.$template['dir'].'/register.tpl';
	}
}
?>
