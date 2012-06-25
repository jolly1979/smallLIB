<?php

function getLibList($db) {
	if(getRoleID($db, getUserAccessLevel($db, getUserID($db))) == 1) {
		$sql = "SELECT * FROM libraries ORDER BY name";
	}
	else {	
		$sql = "SELECT * FROM libraries WHERE user_id = '".getUserID($db)."' ORDER BY name LIMIT 0,100";
	}
	
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	if($result->num_rows != 0) {
		$i=0;
		while ($libs = $result->fetch_assoc()) {
			$lib_list[$i]['id']=$libs['id'];
			$lib_list[$i]['name']=$libs['name'];
			//$subsql = "SELECT news_cat.* FROM news_cat" .
			//		" JOIN news_2_cat" .
			//		" ON news_cat.id = news_2_cat.cat_id" .
			//		" WHERE news_2_cat.news_id = ".$news_list[$i]['id'];		
			//$subresult = $db->query($subsql);
			//if (!$subresult) {
			//	die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			//}
			//$cats = $subresult->fetch_assoc();
			//$news_list[$i]['cat_name']=$cats['name'];
			//$news_list[$i]['cat_id']=$cats['id'];					
			$i++;
		}
		$lib_list[0]['count'] = $i;
		return $lib_list;		
	}
	else {
		return $lib_list[0]['count'] = 0;
	}

}

function getLibInfo($db, $lib_id) {
	$sql = "SELECT * FROM libraries WHERE id = ".$lib_id." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$libinfo = $result->fetch_assoc();
	$sql = "SELECT access_id FROM access_libraries WHERE library_id = ".$libinfo['id'];
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$access_id = $result->fetch_assoc();
	$libinfo['access_id'] = $access_id['access_id'];
	return $libinfo;
}

function getFloorList ($db, $lib_id) {
	$sql = "SELECT * FROM lib_floor WHERE lib_id = '".$lib_id."'";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$i=0;
	while ($floors = $result->fetch_assoc()) {
		$floorlist[$i]['id']=$floors['id'];
		$floorlist[$i]['lib_id']=$floors['lib_id'];
		$floorlist[$i]['name']=$floors['name'];
		$floorlist[$i]['info']=$floors['info'];
		$i++;
	}
	$floorlist[0]['count']=$i;	
	return $floorlist;
}

function getFloorInfo ($db, $floor_id) {
	$sql = "SELECT * FROM lib_floor WHERE id = ".$floor_id." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$floorinfo = $result->fetch_assoc();
	return $floorinfo;
}

function getRoomList ($db, $floor_id) {
	$sql = "SELECT * FROM lib_room WHERE floor_id = '".$floor_id."'";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$i=0;
	while ($rooms = $result->fetch_assoc()) {
		$roomlist[$i]['id']=$rooms['id'];
		$roomlist[$i]['floor_id']=$rooms['floor_id'];
		$roomlist[$i]['name']=$rooms['name'];
		$roomlist[$i]['info']=$rooms['info'];
		$i++;
	}
	$roomlist[0]['count']=$i;	
	return $roomlist;
}

function getRoomInfo ($db, $room_id) {
	$sql = "SELECT * FROM lib_room WHERE id = ".$room_id." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$roominfo = $result->fetch_assoc();
	return $roominfo;
}

function getRackList ($db, $room_id) {
	$sql = "SELECT * FROM lib_rack WHERE room_id = '".$room_id."'";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$i=0;
	while ($racks = $result->fetch_assoc()) {
		$racklist[$i]['id']=$racks['id'];
		$racklist[$i]['room_id']=$racks['room_id'];
		$racklist[$i]['name']=$racks['name'];
		$racklist[$i]['info']=$racks['info'];
		$i++;
	}
	$racklist[0]['count']=$i;	
	return $racklist;
}

function getRackInfo ($db, $rack_id) {
	$sql = "SELECT * FROM lib_rack WHERE id = ".$rack_id." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$rackinfo = $result->fetch_assoc();
	return $rackinfo;
}

function getBorrowerList($db) {
	$sql = "SELECT * FROM borrower WHERE user_id = ".getUserID($db)." ORDER BY id ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($borrower = $result->fetch_assoc()) {
		$borrowerlist[$i]['id']=$borrower['id'];
		$borrowerlist[$i]['user_id']=$borrower['user_id'];
		$borrowerlist[$i]['name']=$borrower['name'];
		$borrowerlist[$i]['email']=$borrower['email'];
		$borrowerlist[$i]['phone']=$borrower['phone'];
		$borrowerlist[$i]['phone_mobile']=$borrower['phone_mobile'];
		$borrowerlist[$i]['info']=$borrower['info'];	
		$i++;
	}
	$borrowerlist[0]['count']=$i;	
	return $borrowerlist;
}

function getBorrowerInfo($db, $UserID) {
	$sql="SELECT * FROM borrower WHERE id = ".$UserID." LIMIT 1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}		
	$borrowerinfo=$result->fetch_assoc();
	return $borrowerinfo;  
}

function showLocationChain ($db, $rack_id) {
	$rackinfo		= getRackInfo($db, $rack_id);
	$roominfo		= getRoomInfo($db, $rackinfo['room_id']);
	$floorinfo		= getFloorInfo($db, $roominfo['floor_id']);
	$libinfo		= getLibInfo($db, $floorinfo['lib_id']);
	$html			= $libinfo['name']." -> ".$floorinfo['name']." -> ".$roominfo['name']." -> ".$rackinfo['name'];
	return $html;
}
?>
