<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$search_only = false;	
	if(isset($_POST['search_confirm'])) {
		$search_only= true;	
		$searchterm	= $_POST['searchterm'];
		if(getUserAccessLevel($db, getUserID($db)) < 10 ) {
			$sqladd ="";
		} else {
			$sqladd	= " user_id = '".getUserID($db)."'";
		}
		$sql	= "SELECT * FROM item WHERE (MATCH (`Title` , `isbn` , `asin` , `ean` ," .
				" `owncode` , `Author` , `Creator` , `Label` , `Publisher` , `Binding` ," .
				" `Feature` , `Edition` , `Keywords` , `ShortDescription`) AGAINST" .
				" ('".$searchterm."'))".$sqladd." LIMIT 0,100";
		$result		= $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$i = 0;
		while($items = $result->fetch_assoc()) {
			$itemlist[$i]['id']			= $items['id'];
			$itemlist[$i]['title']		= $items['Title'];
			$itemlist[$i]['imageurl']	= "/".get_para($db, "subdir")."/images/items/".$items['image'];
			$itemlist[$i]['edition']	= $items['Edition'];
			$itemlist[$i]['author']		= $items['Author'];
			$itemlist[$i]['binding']	= $items['Binding'];
			$itemlist[$i]['pubdate']	= $items['PublicationDate'];
			$itemlist[$i]['numpages']	= $items['Pages'];
			$itemlist[$i]['borrower_id']= $items['borrower_id'];
			$itemlist[$i]['codes']		= $items['isbn']."/".$items['ean']."/".$items['asin']."/".$items['owncode'];
			$i++;
		}
		$itemlist[0]['count']	= $i;		
	}




	$template 				= get_template($db);
	$include_templatefile 	= './templates/'.$template['dir'].'/item_mgt_edit.tpl';
}
?>
