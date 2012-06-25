<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {  
	//FIND UNREGISTERED COMPONENTS OR DB-ENTRIES
	if ($dh = opendir('./components/')) {
		$i = 0;
       	while (($file = readdir($dh)) !== false) {
    		if(filetype('./components/' . $file) == "file") {
    			$file = rtrim($file, '.php');
    			$filelist[$i] =	$file;
    		} 
    		$i++;
    	}
    closedir($dh);
	}
	$diff = array_diff($filelist, getComNameList($db));
	foreach($diff as $filename) {
		$sql = "INSERT INTO components(name) VALUES ('".$filename."')";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$sql = "SELECT id FROM components WHERE name = '".$filename."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$comid = $result->fetch_assoc();		
		$sql = "INSERT INTO access_components(com_id, access_id) VALUES (".$comid['id'].", 1)";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
	}
	$diff = array_diff(getComNameList($db), $filelist);
	foreach($diff as $filename) {
		$sql = "SELECT id FROM components WHERE name = '".$filename."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$comid = $result->fetch_assoc();
		$sql = "DELETE FROM access_components WHERE com_id = '".$comid['id']."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
		$sql = "DELETE FROM components WHERE id = '".$comid['id']."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
	}	
	//UPDATE COMPONENTS
	if(isset($_POST['com_confirm'])) {
		$com_list = getComList($db);
		for($i=0;$i<$com_list['0']['count'];$i++) {
			$new_info = strip_tags(trim($_POST['info___'.$com_list[$i]['id']]));
			$sql = "UPDATE components SET info = '".$new_info."' WHERE id = ".$com_list[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			$sql = "UPDATE access_components SET access_id = '".$_POST['com___'.$com_list[$i]['id']]."' WHERE com_id = ".$com_list[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		}
		echo ROLECHANGESAVED;				
	}

$template = get_template($db);
$com_list = getComList($db);
$access_list = getAccessLevelList($db);
$include_templatefile = './templates/'.$template['dir'].'/admin_components_edit.tpl';
}
?>
