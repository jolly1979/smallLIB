<?php 
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$show_edit_details	= false;
	if(isset($_POST['borrower_add'])) {
		$name 			= htmlspecialchars(strip_tags(trim($_POST['name'])));
		$email 			= htmlspecialchars(strip_tags(trim($_POST['email'])));
		$phone 			= htmlspecialchars(strip_tags(trim($_POST['phone'])));
		$phone_mobile 	= htmlspecialchars(strip_tags(trim($_POST['phone_mobile'])));
		$info 			= htmlspecialchars(trim($_POST['info']));
		$sql			= "INSERT INTO borrower(name, user_id, email, phone, phone_mobile, info) VALUES " .
							"('".$name."', '".getUserID($db)."', '".$email."', '".$phone."'," .
							" '".$phone_mobile."', '".$info."')";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
	}
	if(isset($_POST['borrower_copy']) and $_POST['user_id']!=0) {
		$user			= getUserInfo($db, $_POST['user_id']);
		$sql			= "INSERT INTO borrower(name, user_id, email, phone, phone_mobile, info) VALUES " .
							"('".$user['realname']."', '".getUserID($db)."', " .
							"'".$user['email']."', '".$user['phone']."'," .
							" '".$user['phone_mobile']."', '".$user['info']."')";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}

	}
	if(isset($_POST['borrowerchose_edit']) and $_POST['borrower_id']!=0) {
		$show_edit_details		= true;
		$borrower				= getBorrowerInfo($db, $_POST['borrower_id']);
		
		
	}
	if(isset($_POST['borrower_edit']) and $_POST['borroweredit_id']!=0) {
		$name 			= htmlspecialchars(strip_tags(trim($_POST['name_edit'])));
		$email 			= htmlspecialchars(strip_tags(trim($_POST['email_edit'])));
		$phone 			= htmlspecialchars(strip_tags(trim($_POST['phone_edit'])));
		$phone_mobile 	= htmlspecialchars(strip_tags(trim($_POST['phone_mobile_edit'])));
		$info 			= htmlspecialchars(trim($_POST['info_edit']));
		$sql			= "UPDATE borrower SET " .
							" name = '".$name."'" .
							", email = '".$email."'" .
							", phone = '".$phone."'" .
							", phone_mobile = '".$phone_mobile."'" .
							", info = '".$info."'" .
							" WHERE id = ".$_POST['borroweredit_id'];
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$borrower				= getBorrowerInfo($db, $_POST['borroweredit_id']);
		$show_edit_details		= true;
	}
	
	
	
	$userlist 		= getUserList($db);
	$borrowerlist 	= getBorrowerList($db);
	$template		= get_template($db);
	$include_templatefile = './templates/'.$template['dir'].'/library_mgt_borrower.tpl';	
} ?>
