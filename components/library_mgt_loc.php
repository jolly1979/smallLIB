<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {

if(isset($_POST['lib_id'])) {
	//INIT
	$lib_id = $_POST['lib_id'];
	$floorlist = getFloorList($db, $_POST['lib_id']);
	$roomlist = getRoomList($db, $floorlist[0]['id']);
	$racklist = getRacklist($db, $roomlist[0]['id']);
	$floor_id = $floorlist[0]['id'];
	$room_id = $roomlist[0]['id'];
	$rack_id = $racklist[0]['id'];
	//After Refresh
	if(isset($_POST['floor_refresh'])) {
		$roomlist = getRoomList($db, $_POST['floor_id']);
		$racklist = getRacklist($db, $roomlist[0]['id']);
		$floor_id = $_POST['floor_id'];
		$room_id = $roomlist[0]['id'];
		$rack_id = $racklist[0]['id'];
	}
	if(isset($_POST['room_refresh'])) {
		$roomlist = getRoomList($db, $_POST['floor_id']);
		$racklist = getRacklist($db, $_POST['room_id']);
		$floor_id = $_POST['floor_id'];
		$room_id = $_POST['room_id'];
		$rack_id = $racklist[0]['id'];
	}
	if(isset($_POST['rack_refresh'])) {
		$roomlist = getRoomList($db, $_POST['floor_id']);
		$racklist = getRacklist($db, $_POST['room_id']);
		$floor_id = $_POST['floor_id'];
		$room_id = $_POST['room_id'];		
		$rack_id = $_POST['rack_id'];
	}
	
	//Update Floor
	if(isset($_POST['floor_confirm'])) {
		$floor_id = $_POST['floor_id'];
		$room_id = $_POST['room_id'];
		$rack_id = $_POST['rack_id'];
		$new_name = htmlspecialchars(strip_tags(trim($_POST['floor_name'])));
		$new_info = htmlspecialchars(strip_tags(trim($_POST['floor_text'])));
		$sql = "UPDATE lib_floor SET name = '".$new_name."', info = '".$new_info."' WHERE id = ".$floor_id;		
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$floorlist = getFloorList($db, $_POST['lib_id']);
		$roomlist = getRoomList($db, $floor_id);
		$racklist = getRacklist($db, $room_id);
	}
	//Update Room	
	if(isset($_POST['room_confirm'])) {
		$floor_id = $_POST['floor_id'];
		$room_id = $_POST['room_id'];
		$rack_id = $_POST['rack_id'];
		$new_name = htmlspecialchars(strip_tags(trim($_POST['room_name'])));
		$new_info = htmlspecialchars(strip_tags(trim($_POST['room_text'])));
		$sql = "UPDATE lib_room SET name = '".$new_name."', info = '".$new_info."' WHERE id = ".$room_id;		
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$floorlist = getFloorList($db, $_POST['lib_id']);
		$roomlist = getRoomList($db, $floor_id);
		$racklist = getRacklist($db, $room_id);
	}
	//Update Rack	
	if(isset($_POST['rack_confirm'])) {
		$floor_id = $_POST['floor_id'];
		$room_id = $_POST['room_id'];
		$rack_id = $_POST['rack_id'];
		$new_name = htmlspecialchars(strip_tags(trim($_POST['rack_name'])));
		$new_info = htmlspecialchars(strip_tags(trim($_POST['rack_text'])));		
		$sql = "UPDATE lib_rack SET name = '".$new_name."', info = '".$new_info."' WHERE id = ".$rack_id;		
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$floorlist = getFloorList($db, $_POST['lib_id']);
		$roomlist = getRoomList($db, $floor_id);
		$racklist = getRacklist($db, $room_id);
	}
	//Insert Floor
	if(isset($_POST['newfloor_confirm'])) {
		$floor_id = $_POST['floor_id'];
		$room_id = $_POST['room_id'];
		$rack_id = $_POST['rack_id'];
		$new_name = htmlspecialchars(strip_tags(trim($_POST['floor_insert'])));		
		$sql = "INSERT INTO lib_floor(lib_id, name, info) VALUES (".$lib_id.", '".$new_name."', 'default')";		
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$floor_insertid = $db->insert_id;
		$sql = "INSERT INTO lib_room(floor_id, name, info) VALUES (".$floor_insertid.", 'default', 'default');";
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$room_insertid = $db->insert_id;		
		$sql = "INSERT INTO lib_rack(room_id, name, info) VALUES (".$room_insertid.", 'default', 'default');";
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$floorlist = getFloorList($db, $_POST['lib_id']);
		$roomlist = getRoomList($db, $floor_id);
		$racklist = getRacklist($db, $room_id);
	}	
	//Insert Room
	if(isset($_POST['newroom_confirm'])) {
		$floor_id = $_POST['floor_id'];
		$room_id = $_POST['room_id'];
		$rack_id = $_POST['rack_id'];
		$new_name = htmlspecialchars(strip_tags(trim($_POST['room_insert'])));		
		$sql = "INSERT INTO lib_room(floor_id, name, info) VALUES (".$floor_id.", '".$new_name."', 'default')";		
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$room_insertid = $db->insert_id;		
		$sql = "INSERT INTO lib_rack(room_id, name, info) VALUES (".$room_insertid.", 'default', 'default');";
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$floorlist = getFloorList($db, $_POST['lib_id']);
		$roomlist = getRoomList($db, $floor_id);
		$racklist = getRacklist($db, $room_id);
	}	
	//Insert Rack
	if(isset($_POST['newrack_confirm'])) {
		$floor_id = $_POST['floor_id'];
		$room_id = $_POST['room_id'];
		$rack_id = $_POST['rack_id'];
		$new_name = htmlspecialchars(strip_tags(trim($_POST['rack_insert'])));		
		$sql = "INSERT INTO lib_rack(room_id, name, info) VALUES (".$room_id.", '".$new_name."', 'default')";		
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$floorlist = getFloorList($db, $_POST['lib_id']);
		$roomlist = getRoomList($db, $floor_id);
		$racklist = getRacklist($db, $room_id);
	}

}


else {
	$lib_list_only = true;
}
	$lib_list = getLibList($db);
	$template = get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/library_mgt_loc.tpl';

} ?>