<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {

	if(!isset($_POST['itempage'])) { $itempage = 1; } else { $itempage = $_POST['itempage']; }
	if(isset($_POST['forward'])) { $itempage++; }
	if(isset($_POST['backward'])) { $itempage--; }	
	$itemlist				= AmazonSearch ($db, $_POST['keywords'], $_POST['SearchIndex'], $itempage);
	$SearchIndexList 		= getSearchIndexList($db);
	$template 				= get_template($db);
	$include_templatefile 	= './templates/'.$template['dir'].'/item_mgt_add_ean.tpl';
}
?>
