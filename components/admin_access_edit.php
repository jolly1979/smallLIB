<?php 
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	
	
function checkLockedAccess($access) {
	if($access == 0 || $access == 999 || $access == 1000) {
		return "readonly";
	}
	else { return null;
	}
}
$template=get_template($db);
	//ROLEUPDATE
	if(isset($_POST['accessrole_confirm'])) {
		$access_list = getAccessLevelList($db);
		for($i=0;$i<$access_list['0']['count'];$i++) {
			$new_access = $_POST['access___'.$access_list[$i]['id']];
			if($access_list[$i]['accesslevel'] > 0 && $access_list[$i]['accesslevel'] < 999) {
				if(preg_match('~^[0-9]{1,4}$~', $new_access) && $new_access > 0 && $new_access < 999) {
					$sql = "UPDATE access_list SET accesslevel = ".$new_access." WHERE id=".$access_list[$i]['id'];
					$result = $db->query($sql);
					if (!$result) {
						die ('Etwas stimmte mit dem Query nicht: '.$db->error);
					}
				}
				else {
					echo ACCESSUPDATEERROR.$access_list[$i]['name'];
				}
			}
		}
		echo ACCESSCHANGESAVED;
	}
	//ROLEADD
	if(isset($_POST['accessrole_add_confirm'])) {
		$new_name = strip_tags(trim($_POST['addrole_name']));
		$new_level = strip_tags(trim($_POST['addrole_level'])); 
		if($new_level < 1 || $new_level > 998 || !preg_match('~^[0-9]{1,4}$~', $new_level) || in_array($new_name, getAccessNameList($db))) {
			echo NEWROLEERROR;
		}
		else {
			$sql = "INSERT INTO access_list(name, accesslevel) VALUES ('".$new_name."', '".$new_level."')";
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
				}
			echo NEWROLESAVED;	
		}
	}
	//ROLEDEL
	if(isset($_POST['accessrole_del_confirm'])) {
		$sql = "SELECT accesslevel, name FROM access_list WHERE id = ".$_POST['role_del'];
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$accesslevel = $result->fetch_assoc();
		if($accesslevel['accesslevel'] < 1 || $accesslevel['accesslevel'] > 998) {
			echo ROLEDELETEDERROR.$accesslevel['name'];
		}
		else {
			$sql = "DELETE FROM access_list WHERE id = ".$_POST['role_del'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			echo ROLEDELETED.$accesslevel['name'];
			$sql = "DELETE FROM access_user WHERE access_id = ".$_POST['role_del'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			$sql = "DELETE FROM access_modules WHERE access_id = ".$_POST['role_del'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}	
		}
	}
$access_list = getAccessLevelList($db);	

$include_templatefile = './templates/'.$template['dir'].'/admin_access_edit.tpl';
}
?>
