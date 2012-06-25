<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	//CHANGE NEWSCATEGORY
	if(isset($_POST['newscat_role_confirm'])) {
		$newscat_list = getNewscatList($db);
		for($i=0;$i<$newscat_list['0']['count'];$i++) {
			$new_info = strip_tags(trim($_POST['info___'.$newscat_list[$i]['id']]));
			$sql = "UPDATE news_cat SET info = '".$new_info."' WHERE id = ".$newscat_list[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			$new_access = $_POST['newscat___'.$newscat_list[$i]['id']];
			if($new_access == 0) { 
				$sql = "INSERT INTO access_newscat(newscat_id) VALUES ('".$newscat_list[$i]['id']."')";
				$result = $db->query($sql);
				if (!$result) {
					die ('Etwas stimmte mit dem Query nicht: '.$db->error);
				}
				$registered = getRegisteredLevel($db);
				$new_access = $registered['id'];
			}
			$sql = "UPDATE access_newscat SET access_id = '".$new_access."' WHERE newscat_id = ".$newscat_list[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		}
		echo NEWSCATCHANGESAVED;		
		
	}
	//ADD NEWSCATEGORY
	if(isset($_POST['newscat_add_confirm'])) {
		$name = strip_tags(trim($_POST['newscat_add_name']));
		$role = $_POST['newscat_add_role'];
		$sql = "SELECT id FROM news_cat WHERE name = '".$name."' LIMIT 0,1";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		if($result->num_rows == 0) {		
			$sql = "INSERT INTO news_cat(`name`) VALUES ('".$name."')";
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			$sql = "SELECT id FROM news_cat WHERE name = '".$name."' LIMIT 0,1";
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			$catid = $result->fetch_assoc();		
			$sql = "INSERT INTO access_newscat(newscat_id, access_id) VALUES (".$catid['id'].", ".$role.")";
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			echo NEWSCATADD.$name;	
		}
		else {
			echo NEWSCATADDERROR.$name;
		}
	}
	//DEL NEWSCATEGORY	
	if(isset($_POST['newscat_del_confirm'])) {
		$newscat = $_POST['newscat_del'];
		$sql = "SELECT * FROM news_2_cat WHERE cat_id = '".$newscat."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		if($result->num_rows > 0) {
			echo NEWSINCAT;
		}
		else {
			$sql = "DELETE FROM news_cat WHERE id = ".$_POST['newscat_del'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			echo NEWSCATDELETED;
			$sql = "DELETE FROM access_newscat WHERE newscat_id = ".$_POST['newscat_del'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		}
		
	}	
$template = get_template($db);
$newscat_list = getNewscatList($db);
$access_list = getAccessLevelList($db);
$include_templatefile = './templates/'.$template['dir'].'/admin_newscat_edit.tpl';
}
?>
