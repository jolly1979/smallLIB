<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo ITEMEDIT_EDITHEADER; ?>

<?php global $iteminfo; ?>
<?php global $edit_enable; ?>

<?php if($edit_enable) { ?>
<!-- TinyMCE -->
<script type="text/javascript" src="./plugins/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple",
		language : "de"
	});
</script>
<!-- /TinyMCE -->
	<form action="index.php?com=item_mgt_edit&amp;nav=<?php echo $_GET['nav']; ?>" method="post">
	<center><input type="submit" name="edit_gotosearch" value="<?php echo ITEMEDIT_EDITGOTOSEARCH; ?>"></center>	
	</form>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo ITEMEDIT_EDITSUBHEADER1; ?></legend>
        <center><input type="submit" name="edit_confirm" value="<?php echo ITEMEDIT_EDITCONFIRM; ?>"></center>
        <table border="1" width="100%">	
        <tr><td width="200px" height="80px"></td><td><img height="80px" src="<?php echo "/".get_para($db, "subdir")."/images/items/".$iteminfo['image']; ?>" /></td></tr>
        <tr><td><?php echo ITEMADD_TITLE; ?></td><td><input type="text" size="50" maxlength="255" name="title" value="<?php echo $iteminfo['Title']; ?>" /></td></tr> 
        <tr><td><?php echo ITEMADD_AUTHOR0; ?></td><td><input type="text" size="50" maxlength="255" name="author" value="<?php echo $iteminfo['Author']; ?>" /></td></tr>        
		<tr><td><?php echo ITEMADD_CREATOR; ?></td><td><input type="text" size="50" maxlength="255" name="creator" value="<?php echo $iteminfo['Creator']; ?>" /></td></tr> 
		<tr><td><?php echo ITEMADD_PUBLISHER; ?></td><td><input type="text" size="50" maxlength="255" name="publisher" value="<?php echo $iteminfo['Publisher']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_LABEL; ?></td><td><input type="text" size="50" maxlength="255" name="label" value="<?php echo $iteminfo['Label']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_EDITION; ?></td><td><input type="text" size="50" maxlength="255" name="edition" value="<?php echo $iteminfo['Edition']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_BINDING; ?></td><td><input type="text" size="50" maxlength="255" name="binding" value="<?php echo $iteminfo['Binding']; ?>" /></td></tr>				
		<tr><td><?php echo ITEMADD_PUBDATE; ?></td><td><input type="text" size="50" maxlength="255" name="pubdate" value="<?php echo $iteminfo['PublicationDate']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_NUMPAGES; ?></td><td><input type="text" size="50" maxlength="100" name="numpages" value="<?php echo $iteminfo['Pages']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_KEYWORDS; ?></td><td><input type="text" size="50" maxlength="255" name="keywords" value="<?php echo $iteminfo['Keywords']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_PRICE; ?></td><td><input type="text" size="50" maxlength="10" name="price" value="<?php echo $iteminfo['Price']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_CURR; ?></td><td><input type="text" size="50" maxlength="100" name="curr" value="<?php echo $iteminfo['Currency']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_FEATURE; ?></td><td><textarea name="feature" rows="3" cols="80" style="width: 100%"><?php echo $iteminfo['Feature']; ?></textarea></td></tr>		
		<tr><td><?php echo ITEMADD_DESCR; ?></td><td><textarea name="descr" rows="3" cols="80" style="width: 100%"><?php echo $iteminfo['ShortDescription']; ?></textarea></td></tr>
		<tr><td><?php echo ITEMADD_ISBN; ?></td><td><input type="text" size="20" maxlength="20" name="isbn" value="<?php echo $iteminfo['isbn']; ?>" />/<input type="text" size="20" maxlength="100" name="ean" value="<?php echo $iteminfo['ean']; ?>" /></td></tr>
		<tr><td><?php echo ITEMADD_OWNCODE; ?>/<?php echo ITEMADD_ASIN; ?></td><td><input type="text" size="20" maxlength="100" name="owncode" value="<?php echo $iteminfo['owncode']; ?>" />/<input type="text" size="20" maxlength="100" name="asin" value="<?php echo $iteminfo['asin']; ?>" /></td></tr>
        </table> 
		<input type="hidden" name="item_id" value="<?php echo $_GET['itemid']; ?>" />
		<center><input type="submit" name="edit_confirm" value="<?php echo ITEMEDIT_EDITCONFIRM; ?>"></center>		
	</fieldset>   
</form>
	<form action="index.php?com=item_mgt_edit&amp;nav=<?php echo $_GET['nav']; ?>" method="post">
	<center><input type="submit" name="edit_gotosearch" value="<?php echo ITEMEDIT_EDITGOTOSEARCH; ?>"></center>	
	</form>
<?php } else { ?>
	<?php echo ITEMEDIT_EDITNO; ?>
<?php } ?>
<?php } ?>