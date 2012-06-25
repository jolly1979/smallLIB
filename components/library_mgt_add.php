<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$country_list = getCountryList($db);
	$userinfo = getUserInfo($db, getUserID($db));
	$useraccesslevel = getUserAccessLevel($db, getUserID($db));
	$accesslist = getAccessLevelListbyAccess($db, $useraccesslevel); 
	if(isset($_POST['libadd_confirm'])) {
		//Set Library
		$new_owner = $_POST['libadd_owner'];
		$new_name = htmlspecialchars(strip_tags(trim($_POST['libadd_name'])));
		$new_info = trim($_POST['libadd_info']);
		$new_street = htmlspecialchars(strip_tags(trim($_POST['libadd_street'])));		
		$new_street_no = htmlspecialchars(strip_tags(trim($_POST['libadd_street_no'])));
		$new_city = htmlspecialchars(strip_tags(trim($_POST['libadd_city'])));
		$new_zip = htmlspecialchars(strip_tags(trim($_POST['libadd_zip'])));
		$new_country = $_POST['libadd_country'];						
		$new_phone = htmlspecialchars(strip_tags(trim($_POST['libadd_phone'])));		
		$new_phone_mobile = htmlspecialchars(strip_tags(trim($_POST['libadd_phone_mobile'])));
		$new_fax = htmlspecialchars(strip_tags(trim($_POST['libadd_fax'])));
		$new_email = htmlspecialchars(strip_tags(trim($_POST['libadd_email'])));		    
		$sql = "INSERT INTO libraries(user_id, name, info," .
				" street, street_no, city, zip, country_id," .
				" phone, phone_mobile, fax, email, created) VALUES (" .
				"" .$new_owner.",". 
				" '" .$new_name."',".
				" '" .$new_info."',".
				" '" .$new_street."',".
				" '" .$new_street_no."',".
				" '" .$new_city."',".
				" '" .$new_zip."',".
				" " .$new_country.",".
				" '" .$new_phone."',".
				" '" .$new_phone_mobile."',".
				" '" .$new_fax."',".
				" '" .$new_email."',".
				"NOW())";
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		//Set Access
		$library_id = $db->insert_id;
		$new_role = $_POST['libadd_role'];
		$sql = "INSERT INTO access_libraries(access_id, library_id) VALUES (".$new_role.",".$library_id.");";
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		//Set Location with Default
		$sql = "INSERT INTO lib_floor(lib_id, name, info) VALUES (".$library_id.", 'default', 'default');";
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$floor_id = $db->insert_id;
		$sql = "INSERT INTO lib_room(floor_id, name, info) VALUES (".$floor_id.", 'default', 'default');";
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$room_id = $db->insert_id;		
		$sql = "INSERT INTO lib_rack(room_id, name, info) VALUES (".$room_id.", 'default', 'default');";
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$insert_confirmed = true;
		$autonews = autoNews($db, 0, 0, AUTONEWS_LIBADDTITLE.$new_name, '<p>'.AUTONEWS_LIBADDTEXT.$userinfo['realname'].' ('.$userinfo['username'].')</p>');		 
	}
	else {
		$insert_confirmed = false;
	}	
	$template = get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/library_mgt_add.tpl';
} ?>