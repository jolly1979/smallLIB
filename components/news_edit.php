<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$template=get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/news_edit.tpl';
	if(isset($_POST['newsedit_confirm'])) {
		$new_user = $_POST['newsedit_name'];
		$new_cat = $_POST['newsedit_cat'];
		$new_title = strip_tags(trim($_POST['newsedit_title']));
		$new_text = $_POST['newsedit_text'];
		$sql = "UPDATE news SET" .
				" user_id = '".$new_user."'," .
				" title = '".$new_title."'," .
				" text = '".$new_text."'" .
				" WHERE id = '".$_GET['news_id']."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$sql = "UPDATE news_2_cat SET cat_id = ".$new_cat." WHERE news_id = ".$_GET['news_id'];
			$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$done = NEWSEDITSAVED;
	}

	$news = getNewsbyID($db, $_GET['news_id']);
	$newscat_list = getNewscatList($db);
	for($i=0;$i<$newscat_list['0']['count'];$i++) {
		$sql = "SELECT name FROM access_list WHERE id = ".$newscat_list[$i]['access_id'];
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$access = $result->fetch_assoc();
		$newscat_list[$i]['rolename'] = $access['name'];
	}
} ?>