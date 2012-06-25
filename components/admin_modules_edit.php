<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	//FIND UNREGISTERED MODULES OR DB-ENTRIES
	if ($dh = opendir('./modules/')) {
		$i = 0;
       	while (($file = readdir($dh)) !== false) {
    		if(filetype('./modules/' . $file) == "file") {
    			$file = rtrim($file, '.php');
    			$filelist[$i] =	$file;
    		} 
    		$i++;
    	}
    closedir($dh);
	}
	$diff = array_diff($filelist, getModuleNameList($db));
	foreach($diff as $filename) {
		$sql = "INSERT INTO modules(name) VALUES ('".$filename."')";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$sql = "SELECT id FROM modules WHERE name = '".$filename."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$moduleid = $result->fetch_assoc();		
		$sql = "INSERT INTO access_modules(modules_id, access_id) VALUES (".$moduleid['id'].", 1)";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
	}
	$diff = array_diff(getModuleNameList($db), $filelist);
	foreach($diff as $filename) {
		$sql = "SELECT id FROM modules WHERE name = '".$filename."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$moduleid = $result->fetch_assoc();
		$sql = "DELETE FROM access_modules WHERE modules_id = '".$moduleid['id']."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
		$sql = "DELETE FROM modules WHERE id = '".$moduleid['id']."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
	}
	//UPDATE MODULES
	if(isset($_POST['module_confirm'])) {
		$module_list = getModuleList($db);
		for($i=0;$i<$module_list['0']['count'];$i++) {
			$new_info = strip_tags(trim($_POST['info___'.$module_list[$i]['id']]));
			$sql = "UPDATE modules SET info = '".$new_info."' WHERE id = ".$module_list[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			$sql = "UPDATE access_modules SET access_id = '".$_POST['module___'.$module_list[$i]['id']]."' WHERE modules_id = ".$module_list[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		}
		echo ROLECHANGESAVED;				
	}

		
		


$template = get_template($db);
$module_list = getModuleList($db);
$access_list = getAccessLevelList($db);
$include_templatefile = './templates/'.$template['dir'].'/admin_modules_edit.tpl';
}
?>
