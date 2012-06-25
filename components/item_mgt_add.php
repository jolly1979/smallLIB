<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {

	$keywords		= ITEMADD_EAN_FILL;

if(isset($_POST['lib_id']) or $_POST['rack_id_add']) {
	$lib_list_only = false;
	//INIT
	if(isset($_POST['lib_id'])) {
		$lib_id 	= $_POST['lib_id'];
		$floorlist 	= getFloorList($db, $_POST['lib_id']);
		$roomlist 	= getRoomList($db, $floorlist[0]['id']);
		$racklist 	= getRacklist($db, $roomlist[0]['id']);
		$floor_id 	= $floorlist[0]['id'];
		$room_id 	= $roomlist[0]['id'];
		$rack_id 	= $racklist[0]['id'];
		//After Refresh
		if(isset($_POST['floor_refresh'])) {
			$roomlist 	= getRoomList($db, $_POST['floor_id']);
			$racklist 	= getRacklist($db, $roomlist[0]['id']);
			$floor_id 	= $_POST['floor_id'];
			$room_id 	= $roomlist[0]['id'];
			$rack_id 	= $racklist[0]['id'];
		}
		if(isset($_POST['room_refresh'])) {
			$roomlist 	= getRoomList($db, $_POST['floor_id']);
			$racklist 	= getRacklist($db, $_POST['room_id']);
			$floor_id 	= $_POST['floor_id'];
			$room_id 	= $_POST['room_id'];
			$rack_id 	= $racklist[0]['id'];
		}
		if(isset($_POST['rack_refresh'])) {
			$roomlist 	= getRoomList($db, $_POST['floor_id']);
			$racklist 	= getRacklist($db, $_POST['room_id']);
			$floor_id 	= $_POST['floor_id'];
			$room_id 	= $_POST['room_id'];		
			$rack_id 	= $_POST['rack_id'];
		}		
	}
	if(isset($_POST['rack_id_add'])) {
		$lib_id 	= $_POST['lib_id_add'];
		$floor_id 	= $_POST['floor_id_add'];
		$room_id 	= $_POST['room_id_add'];
		$rack_id 	= $_POST['rack_id_add'];
		$floorlist 	= getFloorList($db, $_POST['lib_id_add']);
		$roomlist 	= getRoomList($db, $_POST['floor_id_add']);
		$racklist 	= getRacklist($db, $_POST['room_id_add']);		
	}
} else { $lib_list_only = true; }

if(isset($_POST['add_confirm_keywords']) or $_POST['add_confirm']) {
	$user_id	= getUserID($db);
	$rack_id	= strip_tags(trim($_POST['rack_id_add']));
	$index_id	= strip_tags(trim($_POST['index']));
	$imageurl	= $_POST['imageurl'];
	$detailpage	= $_POST['detailpage'];
	$title		= strip_tags(trim($_POST['title']));
	$isbn		= strip_tags(trim($_POST['isbn']));
	$asin		= strip_tags(trim($_POST['asin']));
	$ean		= strip_tags(trim($_POST['ean']));
	$owncode	= strip_tags(trim($_POST['owncode']));
	$author		= strip_tags(trim($_POST['author']));
	$creator	= strip_tags(trim($_POST['creator']));
	$label		= strip_tags(trim($_POST['label']));
	$publisher	= strip_tags(trim($_POST['publisher']));
	$binding	= strip_tags(trim($_POST['binding']));
	$pubdate	= strip_tags(trim($_POST['pubdate']));
	$feature	= $_POST['feature'];
	$numpages	= strip_tags(trim($_POST['numpages']));
	$edition	= strip_tags(trim($_POST['edition']));
	$keywords	= strip_tags(trim($_POST['keywords']));
	$price		= strip_tags(trim($_POST['price']))/100;
	$curr		= strip_tags(trim($_POST['curr']));
	$descr		= $_POST['descr'];
	if(isset($_POST['add_confirm'])) {
		$imagename = "noimage.gif";
	}
	if(isset($_POST['add_confirm_keywords'])) {
		$descr		= strip_tags($descr);
		$feature 	= strip_tags($feature);
		$index_id 	= getItemIndexID($db, $index_id);
		if(isset($asin) and ($asin > 0)) {
			$details	= GetAmazonDetails($db, $asin);
			$descr		= $details['ShortDescription'];
			//$adescr		= $details['AuthorDescription'];			
		}
		if($imageurl != "images/articles/noimage.gif") {
			$imagename	= md5($imageurl).".jpg";			
			$ch 		= curl_init($imageurl);
			$fp 		= fopen($_SERVER['DOCUMENT_ROOT']."/".get_para($db, "subdir")."/images/items/".$imagename, "w");
			curl_setopt($ch, CURLOPT_URL, $imageurl);
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_exec($ch);
			curl_close($ch);
			fclose($fp);
		} else { $imagename = $imageurl; }
	}

	$sql 		= "INSERT INTO `bibliothek`.`item` (`user_id`, `rack_id`, `index_id`, `image`, " .
			"`DetailPageURL`, `Title`, `isbn`, `asin`, `ean`, `owncode`, `Author`, `Creator`, " .
			"`Label`, `Publisher`, `Binding`, `PublicationDate`, `Feature`, `Pages`, `Edition`, " .
			"`Keywords`, `Price`, `Currency`, `ShortDescription`) VALUES (" .
			"'".$user_id."', '".$rack_id."', '".$index_id."', '".$imagename."', " .
			"'".$detailpage."', '".$title."', '".$isbn."', '".$asin."', '".$ean."', '".$owncode."', '".$author."', '".$creator."', " .
			"'".$label."', '".$publisher."', '".$binding."', '".$pubdate."', '".$feature."', '".$numpages."', '".$edition."', " .
			"'".$keywords."', '".$price."', '".$curr."', '".$descr."')";
	$result		= $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	} else { echo ITEMADD_ADDED; }
}

	$lib_list 				= getLibList($db);
	$SearchIndexList 		= getSearchIndexList($db);
	$template 				= get_template($db);
	$include_templatefile 	= './templates/'.$template['dir'].'/item_mgt_add.tpl';
}
?>