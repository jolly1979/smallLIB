<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$template=get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/news_del.tpl';
	if(isset($_POST['newsdel_confirm'])) {
		$del_confirmed = true;
		$news_id = $_POST['newsdel'];
		$sql = "DELETE FROM news WHERE id = ".$news_id;
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$sql = "DELETE FROM news_2_cat WHERE news_id = ".$news_id;
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
	}
	else {
		$del_confirmed = false;
		$news = getNewsbyID($db, $_GET['news_id']);
	}
}

?>