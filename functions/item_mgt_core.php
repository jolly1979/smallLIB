<?php
function AmazonSearch ($db, $keywords, $searchindex, $itempage) {
	$in_list 			= array('%C3%84','%C3%A4','%C3%96','%C3%B6','%C3%9C','%C3%BC','%C3%9F','%3C','%3E','%28','%29','%7B','%7D','%5B','%5D','%2F','%5C%5C','%2B',' ');         
    $out_list 			= array('Ae','ae','Oe','oe','Ue','ue','ss','no','nie','nicht','nein','na','nae','nee','nu','lr','rl','+','+');
    $keywords			= urlencode(str_replace($in_list,$out_list,$keywords));
    $searchindex 		= urlencode(preg_replace("/[^a-zA-Z]/", "no", $searchindex));	 
	$itempage    		= preg_replace("/[^0-9]/", "1", $itempage);
	$time 				= urlencode(gmdate("Y-m-d\TH:i:s\Z"));
	$params		 		= "AWSAccessKeyId" ."=".  get_para($db, "amazon_access_key_id")       ."&".
        		          "AssociateTag"   ."=".  get_para($db, "amazon_associate_id")        ."&".
            		      "ItemPage"       ."=".  $itempage            ."&".
       		      	  	  "Keywords"       ."=".  $keywords           ."&".
      		       		  "Operation"      ."=". "ItemSearch"          ."&".
      			          "ResponseGroup"  ."=". "Medium"              ."&".
                 		  "SearchIndex"    ."=".  $searchindex         ."&".
                 		  "Service"        ."=". "AWSECommerceService" ."&".
                 		  "Timestamp"      ."=".  $time        ."&".
                 		  "Version"        ."=". "2009-07-16"; 
	$stringsignr 		= "GET\n"."ecs.amazonaws.de"."\n"."/onca/xml"."\n".$params;
	$signature1 		= base64_encode(hash_hmac("sha256", $stringsignr, get_para($db, "amazon_secret_access_key"), True));
	$signature2  		= urlencode($signature1);
	$signedurl			= "http://ecs.amazonaws.de/onca/xml?".$params."&Signature=".$signature2;
	$c 					= curl_init($signedurl);
    curl_setopt($c, CURLOPT_HEADER, false);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $response 			= curl_exec($c);
    curl_close($c);
	$response 			= simplexml_load_string($response);
	$i					= 0;
	foreach ($response->Items->Item as $item) {
		if($item->MediumImage->URL) {
			$itemlist[$i]['MediumImageURL']				= $item->MediumImage->URL;
			$itemlist[$i]['Image']						= $itemlist[$i]['MediumImageURL'];
		} else { 
			if($item->LargeImage->URL) {
				$itemlist[$i]['MediumImageURL']				= $item->LargeImage->URL;
				$itemlist[$i]['Image']						= $itemlist[$i]['MediumImageURL'];
			} else {
				if($item->SmallImage->URL) {
				$itemlist[$i]['MediumImageURL']				= $item->SmallImage->URL;
				$itemlist[$i]['Image']						= $itemlist[$i]['MediumImageURL'];
				} else { $itemlist[$i]['MediumImageURL'] = "noimage.gif"; $itemlist[$i]['Image'] = "images/articles/noimage.gif"; }
			}
		}
		$itemlist[$i]['DetailPageURL']					= $item->DetailPageURL;
		$itemlist[$i]['ItemAttributesTitle']			= htmlspecialchars($item->ItemAttributes->Title);
		if($item->ItemAttributes->Author[0]) {
			$itemlist[$i]['ItemAttributesAuthor']		= htmlspecialchars($item->ItemAttributes->Author[0]);	
		} else { $itemlist[$i]['ItemAttributesAuthor'] 	= ""; }
		if($item->ItemAttributes->Author) {
			$itemlist[$i]['ItemAttributesAuthor']		= htmlspecialchars($item->ItemAttributes->Author);	
		} else { $itemlist[$i]['ItemAttributesAuthor'] 	= ""; }
		if($item->ItemAttributes->Creator){ 
			$itemlist[$i]['ItemAttributesCreator']		= htmlspecialchars($item->ItemAttributes->Creator);
		} else { $itemlist[$i]['ItemAttributesCreator'] 	= ""; }
		if($item->ItemAttributes->Label){ 
			$itemlist[$i]['ItemAttributesLabel']		= htmlspecialchars($item->ItemAttributes->Label);
		} else { $itemlist[$i]['ItemAttributesLabel'] 	= ""; }
		if($item->ItemAttributes->Publisher){ 
			$itemlist[$i]['ItemAttributesPublisher']	= htmlspecialchars($item->ItemAttributes->Publisher);
		} else { $itemlist[$i]['ItemAttributesPublisher'] 	= ""; }
		if($item->ItemAttributes->Binding){ 
			$itemlist[$i]['ItemAttributesBinding']		= htmlspecialchars($item->ItemAttributes->Binding);
		} else { $itemlist[$i]['ItemAttributesBinding'] 	= ""; }
		if($item->ItemAttributes->PublicationDate){ 
			$itemlist[$i]['ItemAttributesPublicationDate']	= htmlspecialchars($item->ItemAttributes->PublicationDate);
		} else { $itemlist[$i]['ItemAttributesPublicationDate'] 	= ""; }	
		if($item->ItemAttributes->Feature[0]) {
			$itemlist[$i]['ItemAttributesFeature']		= $item->ItemAttributes->Feature[0];			
		} else { $itemlist[$i]['ItemAttributesFeature'] 	= ""; }
		if($item->ItemAttributes->NumberOfPages) {
			$itemlist[$i]['ItemAttributesNumberOfPages']= htmlspecialchars($item->ItemAttributes->NumberOfPages);				
		} else { $itemlist[$i]['ItemAttributesNumberOfPages'] 	= ""; }
		if($item->ItemAttributes->Edition) {
			$itemlist[$i]['ItemAttributesEdition']		= htmlspecialchars($item->ItemAttributes->Edition);				
		} else { $itemlist[$i]['ItemAttributesEdition'] 	= ""; }		
		if($item->ItemAttributes->ListPrice->Amount) {
			$itemlist[$i]['ItemAttributesListPriceAmount']	= htmlspecialchars($item->ItemAttributes->ListPrice->Amount);				
		} else { $itemlist[$i]['ItemAttributesListPriceAmount'] 	= ""; }
		if($item->ItemAttributes->ListPrice->CurrencyCode) {
			$itemlist[$i]['ItemAttributesListPriceCurrencyCode']= htmlspecialchars($item->ItemAttributes->ListPrice->CurrencyCode);				
		} else { $itemlist[$i]['ItemAttributesListPriceCurrencyCode'] 	= ""; }
		if($item->ASIN) {
			$itemlist[$i]['ASIN']						= htmlspecialchars($item->ASIN);				
		} else { $itemlist[$i]['ASIN'] 	= ""; }
		if($item->ItemAttributes->EANList->EANListElement) {
			$itemlist[$i]['EAN']						= htmlspecialchars($item->ItemAttributes->EANList->EANListElement);
			$itemlist[$i]['owncode']					= htmlspecialchars($item->ItemAttributes->EANList->EANListElement);
		} else { $itemlist[$i]['EAN'] 	= ""; }
		if($item->ItemAttributes->ISBN) {
			$itemlist[$i]['ISBN']						= htmlspecialchars($item->ItemAttributes->ISBN);				
		} else { $itemlist[$i]['ISBN'] 	= ""; }	
	$i++;	
	}
	
	foreach ($response->Items as $item) {}
		$itemlist[0]['ItemSearchRequestItemPage']			= $item->ItemSearchRequest->ItemPage;
		$itemlist[0]['TotalPages']							= $item->TotalPages;
		$itemlist[0]['TotalResults']						= $item->TotalResults;
		$itemlist[0]['ItemSearchRequestSearchIndex']		= $searchindex;
		$itemlist[0]['ItemSearchRequestKeywords']			= $keywords;
		$itemlist[0]['ItemPage']							= $itempage;
	$itemlist[0]['count'] = $i;
	return $itemlist;
}

function GetAmazonDetails ($db, $asin) {
	$details 										= "http://www.amazon.de/dp/".$asin;
	$c 												= curl_init($details);
    curl_setopt($c, CURLOPT_HEADER, false);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $response 										= curl_exec($c);
    curl_close($c);
	$response_info_start 							= stripos($response, "<h3 class=\"productDescriptionSource\">Kurzbeschreibung</h3>")+60;
	$response_info 									= substr($response, $response_info_start);
	$response_info_ende 							= stripos($response_info, "<div class=\"emptyClear\"> </div>");
	$item['ShortDescription']						= substr($response_info, 0, $response_info_ende);
	//No use right now
	/*
	$details 										= "http://www.amazon.de/dp/".$asin;
	usleep(500000);
	$c 												= curl_init($details);
    curl_setopt($c, CURLOPT_HEADER, false);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $response 										= curl_exec($c);
    curl_close($c);
	$response_author_info_start 					= stripos($response, "<h3 class=\"productDescriptionSource\">&#xDC;ber den Autor</h3>")+63;
	$response_author_info 							= substr($response, $response_author_info_start);
	$response_author_info_ende 						= stripos($response_author_info, "<div class=\"emptyClear\"> </div>");
	$item['AuthorDescription'] 						= htmlspecialchars(substr($response_author_info, 0, $response_author_info_ende)); */
	return $item;
}

function setItempages($itemlist) {
	$html = "";
	if ($itemlist[0]['TotalPages'] > 1) {
		if ($itemlist[0]['ItemPage'] > 1) {
		$html = $html."<form action='".htmlspecialchars($_SERVER['REQUEST_URI'])."' method='post'>".
					"<input type='hidden' name='SearchIndex' value='".$itemlist[0]['ItemSearchRequestSearchIndex']."'>" .
					"<input type='hidden' name='keywords' value='".$itemlist[0]['ItemSearchRequestKeywords']."'>" .
					"<input type='hidden' name='itempage' value='".$itemlist[0]['ItemPage']."'>".
					"<input type='submit' name='backward' value='".ITEMADD_BACKWARD."'>".
					"</form>";
       	}
       	$html = $html." ".$itemlist[0]['ItemPage']." - ".$itemlist[0]['TotalPages']." ";
       	if ($itemlist[0]['ItemPage']< $itemlist[0]['TotalPages']) {
		$html = $html."<form action='".htmlspecialchars($_SERVER['REQUEST_URI'])."' method='post'>".
					"<input type='hidden' name='SearchIndex' value='".$itemlist[0]['ItemSearchRequestSearchIndex']."'>" .
					"<input type='hidden' name='keywords' value='".$itemlist[0]['ItemSearchRequestKeywords']."'>" .
					"<input type='hidden' name='itempage' value='".$itemlist[0]['ItemPage']."'>".
					"<input type='submit' name='forward' value='".ITEMADD_FORWARD."'>".
					"</form>";
       	}

    }
	return $html;
}

function getSearchIndexList ($db) {
	$sql = "SELECT * FROM item_cat";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$i = 0;
	while ($IndexList = $result->fetch_assoc()) {
		$SearchIndexList[$i]['id']=$IndexList['id'];
		$SearchIndexList[$i]['searchindex']=$IndexList['searchindex'];
		$SearchIndexList[$i]['name']=$IndexList['name'];
		$i++;
	}
	$SearchIndexList[0]['count'] = $i;
	return $SearchIndexList;
}

function getItemIndexID($db, $index) {
	$sql		= "SELECT id FROM item_cat WHERE searchindex = '".$index."' LIMIT 0,1";
	$result		= $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$index_id 	= $result->fetch_assoc();
	return $index_id['id'];
}

?>
