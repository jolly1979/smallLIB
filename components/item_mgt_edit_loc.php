<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {

	$locedit_enable	= false;
	//CHECK ITEM
	$item_id		= $_GET['itemid'];
	$sql			= "SELECT * FROM item WHERE id = ".$item_id;
	$result			= $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$iteminfo		= $result->fetch_assoc();
	$rackinfo		= getRackInfo($db, $iteminfo['rack_id']);
	$roominfo		= getRoomInfo($db, $rackinfo['room_id']);
	$floorinfo		= getFloorInfo($db, $roominfo['floor_id']);
	$libinfo		= getLibInfo($db, $floorinfo['lib_id']);
	$iteminfo['room_id']	= $rackinfo['room_id'];
	$iteminfo['floor_id']	= $roominfo['floor_id'];
	$iteminfo['lib_id']		= $floorinfo['lib_id'];	
	$liblist 				= getLibList($db);
	$floorlist 				= getFloorList($db, $iteminfo['lib_id']);
	$roomlist 				= getRoomList($db, $floorlist[0]['id']);
	$racklist 				= getRacklist($db, $roomlist[0]['id']);
	$iteminfo['sug_rack_id']= $racklist[0]['id'];				
	if(isset($_POST['lib_refresh'])) {
	$iteminfo['lib_id']		= $_POST['lib_id'];
	$floorlist 				= getFloorList($db, $iteminfo['lib_id']);
	$roomlist 				= getRoomList($db, $floorlist[0]['id']);
	$racklist 				= getRacklist($db, $roomlist[0]['id']);
	$iteminfo['sug_rack_id']= $racklist[0]['id'];
	}
	if(isset($_POST['floor_refresh'])) {
	$iteminfo['lib_id']		= $_POST['lib_id'];
	$floorlist 				= getFloorList($db, $iteminfo['lib_id']);
	$iteminfo['floor_id']	= $_POST['floor_id'];
	$roomlist 				= getRoomList($db, $iteminfo['floor_id']);
	$racklist 				= getRacklist($db, $roomlist[0]['id']);
	$iteminfo['sug_rack_id']= $racklist[0]['id'];
	}
	if(isset($_POST['room_refresh'])) {
	$iteminfo['lib_id']		= $_POST['lib_id'];
	$floorlist 				= getFloorList($db, $iteminfo['lib_id']);
	$iteminfo['floor_id']	= $_POST['floor_id'];
	$roomlist 				= getRoomList($db, $iteminfo['floor_id']);
	$iteminfo['room_id']	= $_POST['room_id'];
	$racklist 				= getRacklist($db, $iteminfo['room_id']);
	$iteminfo['sug_rack_id']= $racklist[0]['id'];
	}
	if(isset($_POST['rack_refresh'])) {
	$iteminfo['lib_id']		= $_POST['lib_id'];
	$floorlist 				= getFloorList($db, $iteminfo['lib_id']);
	$iteminfo['floor_id']	= $_POST['floor_id'];
	$roomlist 				= getRoomList($db, $iteminfo['floor_id']);
	$iteminfo['room_id']	= $_POST['room_id'];
	$racklist 				= getRacklist($db, $iteminfo['room_id']);
	$iteminfo['sug_rack_id']= $_POST['rack_id'];
	}

	if(($result->num_rows==1) and (($iteminfo['user_id']==getUserID($db)) or (getUserID==0))) {
		$locedit_enable		= true;
	} else { $locedit_enable= false; }
	
	if(isset($_POST['locedit_confirm']) and $locedit_enable) {
		$sql				= "UPDATE item SET rack_id = ".$_POST['final_rack_id']." WHERE id = ".$item_id;
		$result				= $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$item_id		= $_GET['itemid'];
	//RELOAD
	$sql			= "SELECT * FROM item WHERE id = ".$item_id;
	$result			= $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$iteminfo		= $result->fetch_assoc();
	$rackinfo		= getRackInfo($db, $iteminfo['rack_id']);
	$roominfo		= getRoomInfo($db, $rackinfo['room_id']);
	$floorinfo		= getFloorInfo($db, $roominfo['floor_id']);
	$libinfo		= getLibInfo($db, $floorinfo['lib_id']);
	$iteminfo['room_id']	= $rackinfo['room_id'];
	$iteminfo['floor_id']	= $roominfo['floor_id'];
	$iteminfo['lib_id']		= $floorinfo['lib_id'];
	$liblist 				= getLibList($db);
	$floorlist 				= getFloorList($db, $iteminfo['lib_id']);
	$roomlist 				= getRoomList($db, $iteminfo['floor_id']);
	$racklist 				= getRacklist($db, $iteminfo['room_id']);
	$iteminfo['sug_rack_id']= $iteminfo['rack_id'];	
	}
	




	$template 				= get_template($db);
	$include_templatefile 	= './templates/'.$template['dir'].'/item_mgt_edit_loc.tpl';
}
?>
