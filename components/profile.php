<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$done = "";
	if(isset($_POST['profile_confirm'])) {
		$realname		= htmlspecialchars(strip_tags(trim($_POST['realname'])));
		$email 			= htmlspecialchars(strip_tags(trim($_POST['email'])));
		$street 		= htmlspecialchars(strip_tags(trim($_POST['street'])));	
		$street_no 		= htmlspecialchars(strip_tags(trim($_POST['street_no'])));	
		$city 			= htmlspecialchars(strip_tags(trim($_POST['city'])));	
		$zip 			= htmlspecialchars(strip_tags(trim($_POST['zip'])));
		$country 		= htmlspecialchars(strip_tags(trim($_POST['country'])));
		$phone 			= htmlspecialchars(strip_tags(trim($_POST['phone'])));
		$phone_mobile 	= htmlspecialchars(strip_tags(trim($_POST['phone_mobile'])));	
		$fax 			= htmlspecialchars(strip_tags(trim($_POST['fax'])));	
		$info 			= htmlspecialchars(trim($_POST['info']));	
		$sql			= "UPDATE user SET" .
							" realname = '".$realname."'" .
							", email = '".$email."'" .
							", street = '".$street."'" .
							", street_no = '".$street_no."'" .
							", city = '".$city."'" .
							", zip = '".$zip."'" .
							", country_id = ".$country."" .
							", phone = '".$phone."'" .
							", phone_mobile = '".$phone_mobile."'" .
							", fax = '".$fax."'" .
							", info = '".$info."'" .
							" WHERE id = ".getUserID($db);
		$result 		= $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
		$done 			= PROFILE_UPDATED;
	}
	$user 			= getUserInfo($db, getUserID($db));
	$countrylist 	= getCountryList($db);
	$template 		= get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/profile.tpl';
} ?>