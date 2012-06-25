<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo ITEMDEL_HEADER; ?>
<?php global $itemflag; ?>
<?php global $iteminfo; ?>
<?php global $del_enable; ?>

<?php if($del_enable) { ?>
<?php if($itemflag) { ?>
	<?php echo ITEMDEL_DONE; ?>
	<form action="index.php?com=item_mgt_edit&amp;nav=<?php echo $_GET['nav']; ?>" method="post">
	<center><input type="submit" name="del_gotosearch" value="<?php echo ITEMDEL_GOTOSEARCH; ?>"></center>	
	</form>
<?php } else { ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo ITEMDEL_SUBHEADER1; ?></legend>
        <center><input type="submit" name="del_confirm" value="<?php echo ITEMDEL_CONFIRM; ?>"></center>
        <table border="1" width="100%">	
        <tr><td width="200px" height="80px"></td><td><img height="80px" src="<?php echo "/".get_para($db, "subdir")."/images/items/".$iteminfo['image']; ?>" /></td></tr>
        <tr><td><?php echo ITEMADD_TITLE; ?></td><td><?php echo $iteminfo['Title']; ?></td></tr> 
        <tr><td><?php echo ITEMADD_AUTHOR0; ?></td><td><?php echo $iteminfo['Author']; ?></td></tr>        
		<tr><td><?php echo ITEMADD_CREATOR; ?></td><td><?php echo $iteminfo['Creator']; ?></td></tr> 
		<tr><td><?php echo ITEMADD_PUBLISHER; ?></td><td><?php echo $iteminfo['Publisher']; ?></td></tr>
		<tr><td><?php echo ITEMADD_LABEL; ?></td><td><?php echo $iteminfo['Label']; ?></td></tr>
		<tr><td><?php echo ITEMADD_EDITION; ?></td><td><?php echo $iteminfo['Edition']; ?></td></tr>
		<tr><td><?php echo ITEMADD_BINDING; ?></td><td><?php echo $iteminfo['Binding']; ?></td></tr>				
		<tr><td><?php echo ITEMADD_PUBDATE; ?></td><td><?php echo $iteminfo['PublicationDate']; ?></td></tr>
		<tr><td><?php echo ITEMADD_NUMPAGES; ?></td><td><?php echo $iteminfo['Pages']; ?></td></tr>
		<tr><td><?php echo ITEMADD_KEYWORDS; ?></td><td><?php echo $iteminfo['Keywords']; ?></td></tr>
		<tr><td><?php echo ITEMADD_PRICE; ?></td><td><?php echo $iteminfo['Price']; ?></td></tr>
		<tr><td><?php echo ITEMADD_CURR; ?></td><td><?php echo $iteminfo['Currency']; ?></td></tr>
		<tr><td><?php echo ITEMADD_FEATURE; ?></td><td><?php echo $iteminfo['Feature']; ?></td></tr>		
		<tr><td><?php echo ITEMADD_DESCR; ?></td><td><?php echo $iteminfo['ShortDescription']; ?></td></tr>
		<tr><td><?php echo ITEMADD_ISBN; ?></td><td><?php echo $iteminfo['isbn']; ?>/<?php echo $iteminfo['ean']; ?></td></tr>
		<tr><td><?php echo ITEMADD_OWNCODE; ?></td><td><?php echo $iteminfo['owncode']; ?></td></tr>
        </table> 
		<center><input type="submit" name="del_confirm" value="<?php echo ITEMDEL_CONFIRM; ?>"></center>		
	</fieldset>   
</form>
<?php } ?>
<?php } else { ?>
	<?php echo ITEMDEL_NO; ?>
<?php } ?>
<?php } ?>