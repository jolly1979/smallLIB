<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$country_list = getCountryList($db);
	$userinfo = getUserInfo($db, getUserID($db));
	$useraccesslevel = getUserAccessLevel($db, getUserID($db));
	$accesslist = getAccessLevelListbyAccess($db, $useraccesslevel); 
	$template = get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/library_mgt_edit.tpl';


if(isset($_POST['lib_id'])) {
	$libinfo = getLibInfo($db, $_POST['lib_id']);
	if(isset($_POST['libedit_confirm'])) {
		$library_id = $_POST['lib_id'];
		$new_owner = $_POST['libedit_owner'];
		$new_name = htmlspecialchars(strip_tags(trim($_POST['libedit_name'])));
		$new_info = trim($_POST['libedit_info']);
		$new_street = htmlspecialchars(strip_tags(trim($_POST['libedit_street'])));		
		$new_street_no = htmlspecialchars(strip_tags(trim($_POST['libedit_street_no'])));
		$new_city = htmlspecialchars(strip_tags(trim($_POST['libedit_city'])));
		$new_zip = htmlspecialchars(strip_tags(trim($_POST['libedit_zip'])));
		$new_country = $_POST['libedit_country'];						
		$new_phone = htmlspecialchars(strip_tags(trim($_POST['libedit_phone'])));		
		$new_phone_mobile = htmlspecialchars(strip_tags(trim($_POST['libedit_phone_mobile'])));
		$new_fax = htmlspecialchars(strip_tags(trim($_POST['libedit_fax'])));
		$new_email = htmlspecialchars(strip_tags(trim($_POST['libedit_email'])));		    
		$sql = "UPDATE libraries SET" .
				" user_id = " .$new_owner.",". 
				" name = '" .$new_name."',".
				" info = '" .$new_info."',".
				" street = '" .$new_street."',".
				" street_no = '" .$new_street_no."',".
				" city = '" .$new_city."',".
				" zip = '" .$new_zip."',".
				" country_id = " .$new_country.",".
				" phone = '" .$new_phone."',".
				" phone_mobile = '" .$new_phone_mobile."',".
				" fax = '" .$new_fax."',".
				" email = '" .$new_email."' ".
				" WHERE id = ".$library_id;
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$new_role = $_POST['libedit_role'];
		$sql = "UPDATE access_libraries SET access_id = ".$new_role." WHERE library_id = ".$library_id;
 		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}		
		$insert_confirmed = true;
		$lib_list_only = false;
		$lib_list = getLibList($db);		 
	}
	else {
		$lib_list = getLibList($db);
		$insert_confirmed = false;
	}	
}
else {
	$lib_list = getLibList($db);
	$lib_list_only = true;
}
} ?>