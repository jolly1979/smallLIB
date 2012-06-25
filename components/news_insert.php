<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	if(isset($_POST['insertnews_confirm'])) {
		$insert_confirmed = true;
		$new_user = $_POST['newsinsert_name'];
		$new_cat = $_POST['newsinsert_cat'];
		$new_title = strip_tags(trim($_POST['newsinsert_title']));
		$new_text = $_POST['newsinsert_text'];
		$sql = "INSERT INTO news(user_id, title, text, date) " .
				"VALUES ('".$new_user."', '".$new_title."', '".$new_text."', NOW())";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
		$sql = "SELECT id FROM news WHERE (user_id = '".$new_user."'" .
				"AND title = '".$new_title."'" .
				"AND text = '".$new_text."') LIMIT 0,1";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$news_id = $result->fetch_assoc();
		$sql = "INSERT INTO news_2_cat(cat_id, news_id) VALUES ('".$new_cat."', '".$news_id['id']."')";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
	}
	else {
		$insert_confirmed = false;
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
	}	
	$template=get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/news_insert.tpl';
} ?>