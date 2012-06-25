<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$template=get_template($db);
	//USERROLECHANGE
	if(isset($_POST['userrole_confirm'])) {
		$userlist = getUserList($db);
		for($i=0;$i<$userlist['0']['count'];$i++) {
			$new_access = $_POST['user___'.$userlist[$i]['id']];
			if($new_access == 0) { 
				$sql = "INSERT INTO access_user(user_id) VALUES ('".$userlist[$i]['id']."')";
				$result = $db->query($sql);
				if (!$result) {
					die ('Etwas stimmte mit dem Query nicht: '.$db->error);
				}
				$registered = getRegisteredLevel($db);
				$new_access = $registered['id'];
			}
			$sql = "UPDATE access_user SET access_id = ".$new_access." WHERE user_id=".$userlist[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		}
		echo ROLECHANGESAVED;
	}
	//USERDEL
	if(isset($_POST['user_del_confirm'])) {
		if(getUserAccessLevel($db, $_POST['user_del']) < 1) {
			echo USERDELETEDERROR;
		}
		else {
			$sql = "DELETE FROM user WHERE id = ".$_POST['user_del'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			echo USERDELETED;
			$sql = "DELETE FROM access_user WHERE user_id = ".$_POST['user_del'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}	
		}
	}

$userlist = getUserList($db);
$access_list = getAccessLevelList($db);
$include_templatefile = './templates/'.$template['dir'].'/admin_user_rights.tpl';
}
?>