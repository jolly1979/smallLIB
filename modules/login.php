<div id="Login">
<?php
$template=get_template($db);
if (getUserID($db) && isset($_POST['logout'])) {
	
			setcookie('UserID', '', strtotime('-1 day'));
			setcookie('Password', '', strtotime('-1 day'));
			unset($_COOKIE['UserID']);
			unset($_COOKIE['Password']);	

	}
if (!getUserID($db) && !isset($_POST['logout']) && isset($_POST['login'])) {
		if (!isset($_POST['LUsername'], $_POST['LPassword'], $_POST['login'])) {
			echo INVALID_FORM;
			}
		if (('' == $LUsername = trim($_POST['LUsername'])) OR ('' == $LPassword = trim($_POST['LPassword']))) {
			echo EMPTY_FORM;
			}
		$sql = 'SELECT id FROM user WHERE username = ?';
		$stmt = $db->prepare($sql);
		if (!$stmt) {
			return $db->error;
			}
		$stmt->bind_param('s', $LUsername);
		if (!$stmt->execute()) {
			return $stmt->error;
			}
		$stmt->bind_result($UserID);
		if (!$stmt->fetch()) {
			echo NOUSER;
			}
		$stmt->close();
		$sql = 'SELECT Password FROM User WHERE ID = ? AND Password = ?';
		$stmt = $db->prepare($sql);
		if (!$stmt) {
			return $db->error;
			}
		$Hash = md5(md5($UserID).$LPassword);
		$stmt->bind_param('is', $UserID, $Hash);
		if (!$stmt->execute()) {
			return $stmt->error;
			}
		$stmt->bind_result($Hash);
		if (!$stmt->fetch()) {
			echo WRONGPASSWORD;
			}
		$stmt->close();
		setcookie('UserID', $UserID, strtotime("+1 month"));
		setcookie('Password', $Hash, strtotime("+1 month"));
		$_COOKIE['UserID'] = $UserID;
		$_COOKIE['Password'] = $Hash;

	}
	
if (getUserID($db)) {
	include('./templates/'.$template['dir'].'/logout.tpl');
	}
else {
	include('./templates/'.$template['dir'].'/login.tpl');
	}
?>    
</div>