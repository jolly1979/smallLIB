<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$template = get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/library_mgt_del.tpl';	
	if($_POST['libdel_confirm']) {
		$lib_list = getLibList($db);
		for($i=0;$i<$lib_list['0']['count'];$i++) {
			if($_POST['lib_del___'.$lib_list[$i]['id']] == "dellib") {
				$libinfo = getLibInfo($db, $lib_list[$i]['id']);			
				$sql = "DELETE FROM libraries WHERE id = ".$lib_list[$i]['id'];
				$result = $db->query($sql);
				if (!$result) {
					die ('Etwas stimmte mit dem Query nicht: '.$db->error);
				}
				$sql = "DELETE FROM access_libraries WHERE library_id = ".$lib_list[$i]['id'];
				$result = $db->query($sql);
				if (!$result) {
					die ('Etwas stimmte mit dem Query nicht: '.$db->error);
				}
				$autonews = autoNews($db, 0, 0, AUTONEWS_LIBDELTITLE, '<p>'.AUTONEWS_LIBDELTEXT.$libinfo['name'].'</p>');								
			}
		}
	}
	$lib_list = getLibList($db);
}
?>

