<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$itemflag		= false;
	$del_enable		= false;
	//CHECK ITEM
	$item_id		= $_GET['itemid'];
	$sql			= "SELECT * FROM item WHERE id = ".$item_id;
	$result			= $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$iteminfo		= $result->fetch_assoc();
	if(($result->num_rows==1) and (($iteminfo['user_id']==getUserID($db)) or (getUserID==0))) {
		$del_enable	= true;
	} else { $del_enable	= false; }
	
	if(isset($_POST['del_confirm']) and $del_enable) {
		$itemflag	= true;
		$sql		= "DELETE FROM item WHERE id = ".$item_id;
		$result			= $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
	}


	$template 				= get_template($db);
	$include_templatefile 	= './templates/'.$template['dir'].'/item_mgt_edit_del.tpl';
}
?>
