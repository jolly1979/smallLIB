<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php global $itemlist; ?>

<fieldset>
    <legend><?php echo $itemlist[0]['TotalResults'].ITEMADD_SUBHEADER2; ?></legend>
	<table border="1" width="100%">
	<?php for($i=0;$i<$itemlist[0]['count'];$i++) { ?>		
	<tr><td width="150px" style="vertical-align:top">
	<p style="text-align:center"><img src="<?php echo $itemlist[$i]['Image']; ?>" /></p>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?com=item_mgt_add&nav=".$_GET['nav']) ?>" method="post">	
    <p style="text-align:center"><input type="submit" name="add_confirm_keywords" value="<?php echo ITEMADD_CONFIRM; ?>"></p>
	<input type="hidden" name="imageurl" value="<?php echo htmlspecialchars($itemlist[$i]['MediumImageURL']); ?>">
	<input type="hidden" name="detailpage" value="<?php echo htmlspecialchars($itemlist[$i]['DetailPageURL']); ?>">
	<input type="hidden" name="title" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesTitle']); ?>">
	<input type="hidden" name="author" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesAuthor']); ?>">
	<input type="hidden" name="creator" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesCreator']); ?>">
	<input type="hidden" name="label" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesLabel']); ?>">
	<input type="hidden" name="publisher" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesPublisher']); ?>">
	<input type="hidden" name="binding" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesBinding']); ?>">
	<input type="hidden" name="pubdate" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesPublicationDate']); ?>">
	<input type="hidden" name="feature" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesFeature']); ?>">
	<input type="hidden" name="numpages" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesNumberOfPages']); ?>">
	<input type="hidden" name="edition" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesEdition']); ?>">
	<input type="hidden" name="price" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesListPriceAmount']); ?>">
	<input type="hidden" name="curr" value="<?php echo htmlspecialchars($itemlist[$i]['ItemAttributesListPriceCurrencyCode']); ?>">
	<input type="hidden" name="asin" value="<?php echo htmlspecialchars($itemlist[$i]['ASIN']); ?>">
	<input type="hidden" name="ean" value="<?php echo htmlspecialchars($itemlist[$i]['EAN']); ?>">
	<input type="hidden" name="isbn" value="<?php echo htmlspecialchars($itemlist[$i]['ISBN']); ?>">
	<input type="hidden" name="keywords" value="<?php echo htmlspecialchars($itemlist[0]['ItemSearchRequestKeywords']); ?>">
	<input type="hidden" name="index" value="<?php echo htmlspecialchars($itemlist[0]['ItemSearchRequestSearchIndex']); ?>">
	<input type="hidden" name="lib_id_add" value="<?php echo $_POST['lib_id_add']; ?>">
	<input type="hidden" name="floor_id_add" value="<?php echo $_POST['floor_id_add']; ?>">
	<input type="hidden" name="room_id_add" value="<?php echo $_POST['room_id_add']; ?>">
	<input type="hidden" name="rack_id_add" value="<?php echo $_POST['rack_id_add']; ?>">
</form></td>
	<td style="vertical-align:top;">
	<p style="font-weight: bold;"><?php echo $itemlist[$i]['ItemAttributesTitle']; ?></p>
	<?php echo ITEMADD_EDITION.$itemlist[$i]['ItemAttributesEdition']; ?><br />
	<?php echo ITEMADD_AUTHOR0.$itemlist[$i]['ItemAttributesAuthor']; ?><br />
	<?php echo ITEMADD_BINDING.$itemlist[$i]['ItemAttributesBinding']; ?><br />
	<?php echo ITEMADD_PUBDATE.$itemlist[$i]['ItemAttributesPublicationDate']; ?><br />
	<?php echo ITEMADD_NUMPAGES.$itemlist[$i]['ItemAttributesNumberOfPages']; ?><br />
	</td>
	</tr>
	<?php } ?>
	</table>
	
	<?php echo setItempages($itemlist); ?>
</fieldset>




<?php } ?>