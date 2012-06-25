<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {

	$edit_enable	= false;
	//CHECK ITEM
	$item_id		= $_GET['itemid'];
	$sql			= "SELECT * FROM item WHERE id = ".$item_id;
	$result			= $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$iteminfo		= $result->fetch_assoc();
	if(($result->num_rows==1) and (($iteminfo['user_id']==getUserID($db)) or (getUserID==0))) {
		$edit_enable	= true;
	} else { $edit_enable	= false; }
	
	if(isset($_POST['edit_confirm']) and $edit_enable) {
		$item_id	= strip_tags(trim($_POST['item_id']));
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
		$price		= strip_tags(trim($_POST['price']));
		$curr		= strip_tags(trim($_POST['curr']));
		$descr		= $_POST['descr'];
		$sql 		= "UPDATE item SET" .
				" Title = '" .mysql_real_escape_string($title)."',". 
				" isbn = '" .mysql_real_escape_string($isbn)."',".
				" ean = '" .mysql_real_escape_string($ean)."',".
				" asin = '" .mysql_real_escape_string($asin)."',".
				" owncode = '" .mysql_real_escape_string($owncode)."',".
				" Author = '" .mysql_real_escape_string($author)."',".
				" Creator = '" .mysql_real_escape_string($creator)."',".
				" Label = '" .mysql_real_escape_string($label)."',".
				" Publisher = '" .mysql_real_escape_string($publisher)."',".
				" Binding = '" .mysql_real_escape_string($binding)."',".
				" PublicationDate = '" .mysql_real_escape_string($pubdate)."',".
				" Feature = '" .mysql_real_escape_string($feature)."'," .
				" Pages = '" .mysql_real_escape_string($numpages)."'," .
				" Edition = '" .mysql_real_escape_string($edition)."'," .
				" Keywords = '" .mysql_real_escape_string($keywords)."'," .
				" Price = " .mysql_real_escape_string($price)."," .
				" Currency = '" .mysql_real_escape_string($curr)."'," .
				" ShortDescription = '" .mysql_real_escape_string($descr)."'" .							
				" WHERE id = ".$item_id;
		$result		= $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$sql		= "SELECT * FROM item WHERE id = ".$item_id;
		$result		= $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$iteminfo	= $result->fetch_assoc();
	}


	$template 				= get_template($db);
	$include_templatefile 	= './templates/'.$template['dir'].'/item_mgt_edit_edit.tpl';
}
?>
