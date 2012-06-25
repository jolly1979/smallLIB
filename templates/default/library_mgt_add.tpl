<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo LIBADD_HEADER; ?>
<?php global $insert_confirmed; ?>
<?php global $country_list; ?>
<?php global $accesslist; ?>
<?php global $userinfo; ?>

<?php if($insert_confirmed) { ?>

	<?php echo LIBADD_DONE; ?>	

	<?php } ?>
<?php if(!$insert_confirmed) { ?>

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

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo LIBADD_SUBHEADER1; ?></legend>
		<table border="1" width="100%">		
		<tr><td width="150px"><?php echo LIBADD_NAME; ?></td><td><input type="text" size="30" maxlength="255" name="libadd_name" value="<?php echo NEWLIB_NAME; ?>" /></td></tr>
		<tr><td><?php echo LIBADD_ROLE; ?></td><td><select name="libadd_role">
		<?php for($i=0;$i<$accesslist[0]['count'];$i++) { ?>
		<option value="<?php echo $accesslist[$i]['id']; ?>"><?php echo $accesslist[$i]['name']; ?></option>
		<?php } ?>
		</select></td></tr>
		<tr><td><?php echo LIBADD_OWNER; ?></td><td><input type="text" size="30" value="<?php echo $userinfo['realname']; ?>" readonly /><input type="hidden" name="libadd_owner" value="<?php echo $userinfo['id']; ?>" /></td></tr>
		<tr><td style="vertical-align: top;"><?php echo LIBADD_INFO; ?></td><td><textarea name="libadd_info" rows="15" cols="80" style="width: 100%"><?php echo NEWLIB_INFO; ?></textarea></td></tr>
		</table>
    </fieldset>
    <fieldset>
        <legend><?php echo LIBADD_SUBHEADER2; ?></legend>
        <table border="1" width="100%">
		<tr><td width="150px"><?php echo LIBADD_STREET; ?></td><td><input type="text" size="30" maxlength="255" name="libadd_street" /> <?php echo LIBADD_STREET_NO; ?> <input type="text" size="10" maxlength="10" name="libadd_street_no" /></td></tr>
		<tr><td><?php echo LIBADD_CITY; ?></td><td><input type="text" size="30" maxlength="255" name="libadd_city" /> <?php echo LIBADD_ZIP; ?> <input type="text" size="10" maxlength="10" name="libadd_zip" /></td></tr>
		<tr><td><?php echo LIBADD_COUNTRY; ?></td><td><select name="libadd_country">
		<?php for($i=0;$i<$country_list[0]['count'];$i++) { ?>
		<option value="<?php echo $country_list[$i]['id']; ?>"><?php echo $country_list[$i]['name']; ?></option>
		<?php } ?>
		</select></td></tr>
		</table>
    </fieldset>
    <fieldset>
        <legend><?php echo LIBADD_SUBHEADER3; ?></legend>
        <table border="1" width="100%">
		<tr><td width="150px"><?php echo LIBADD_PHONE; ?></td><td><input type="text" size="30" maxlength="255" name="libadd_phone" /></td></tr>
		<tr><td><?php echo LIBADD_PHONE_MOBILE; ?></td><td><input type="text" size="30" maxlength="255" name="libadd_phone_mobile" /></td></tr>
		<tr><td><?php echo LIBADD_FAX; ?></td><td><input type="text" size="30" maxlength="255" name="libadd_fax" /></td></tr>
		<tr><td><?php echo LIBADD_EMAIL; ?></td><td><input type="text" size="30" maxlength="255" name="libadd_email" value="<?php echo $userinfo['email']; ?>" /></td></tr>
		</table>
    </fieldset>		
    <center><input type="submit" name="libadd_confirm" value="<?php echo LIBADD_CONFIRM; ?>" /></center>

</form><?php } ?>

<?php } ?>