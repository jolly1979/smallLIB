<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo LIBEDIT_HEADER; ?>
<?php global $lib_list_only; ?>
<?php global $lib_list; ?>
<?php global $insert_confirmed; ?>
<?php global $country_list; ?>
<?php global $accesslist; ?>
<?php global $userinfo; ?>
<?php global $libinfo; ?>



<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo LIBEDIT_SUBHEADER4; ?></legend>
        <select name="lib_id">
		<?php for($i=0;$i<$lib_list[0]['count'];$i++) { ?>
		<option value="<?php echo $lib_list[$i]['id']; ?>" <?php if($lib_list[$i]['id']==$libinfo['id']) { echo "selected='selected'"; } ?>><?php echo $lib_list[$i]['name']; ?></option>
		<?php } ?>
		</select>
        <input type="submit" name="libchose_confirm" value="<?php echo LIBCHOSE_CONFIRM; ?>" />
	</fieldset>
</form>



<?php if(!$lib_list_only) { ?>
<?php if($insert_confirmed) { ?>

	<?php echo LIBEDIT_DONE; ?>	

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
        <legend><?php echo LIBEDIT_SUBHEADER1; ?></legend>
		<table border="1" width="100%">		
		<tr><td width="150px"><?php echo LIBEDIT_NAME; ?></td><td><input type="text" size="30" maxlength="255" name="libedit_name" value="<?php echo $libinfo['name']; ?>" /></td></tr>
		<tr><td><?php echo LIBEDIT_ROLE; ?></td><td><select name="libedit_role">
		<?php for($i=0;$i<$accesslist[0]['count'];$i++) { ?>
		<option value="<?php echo $accesslist[$i]['id']; ?>"<?php if($accesslist[$i]['id']==$libinfo['access_id']) { echo " selected='selected'"; } ?>><?php echo $accesslist[$i]['name']; ?></option>
		<?php } ?>
		</select></td></tr>
		<tr><td><?php echo LIBEDIT_OWNER; ?></td><td><input type="text" size="30" value="<?php echo getRealname($db, $libinfo['user_id']); ?>" readonly /><input type="hidden" name="libedit_owner" value="<?php echo $libinfo['user_id']; ?>" /></td></tr>
		<tr><td style="vertical-align: top;"><?php echo LIBEDIT_INFO; ?></td><td><textarea name="libedit_info" rows="15" cols="80" style="width: 100%"><?php echo $libinfo['info']; ?></textarea></td></tr>
		</table>
    </fieldset>
    <fieldset>
        <legend><?php echo LIBEDIT_SUBHEADER2; ?></legend>
        <table border="1" width="100%">
		<tr><td width="150px"><?php echo LIBEDIT_STREET; ?></td><td><input type="text" size="30" maxlength="255" name="libedit_street" value="<?php echo $libinfo['street']; ?>" /> <?php echo LIBEDIT_STREET_NO; ?> <input type="text" size="10" maxlength="10" name="libedit_street_no" value="<?php echo $libinfo['street_no']; ?>" /></td></tr>
		<tr><td><?php echo LIBEDIT_CITY; ?></td><td><input type="text" size="30" maxlength="255" name="libedit_city" value="<?php echo $libinfo['city']; ?>" /> <?php echo LIBEDIT_ZIP; ?> <input type="text" size="10" maxlength="10" name="libedit_zip" value="<?php echo $libinfo['zip']; ?>" /></td></tr>
		<tr><td><?php echo LIBEDIT_COUNTRY; ?></td><td><select name="libedit_country">
		<?php for($i=0;$i<$country_list[0]['count'];$i++) { ?>
		<option value="<?php echo $country_list[$i]['id']; ?>"<?php if($country_list[$i]['id']==$libinfo['country_id']) { echo " selected='selected'"; } ?>><?php echo $country_list[$i]['name']; ?></option>
		<?php } ?>
		</select></td></tr>
		</table>
    </fieldset>
    <fieldset>
        <legend><?php echo LIBEDIT_SUBHEADER3; ?></legend>
        <table border="1" width="100%">
		<tr><td width="150px"><?php echo LIBEDIT_PHONE; ?></td><td><input type="text" size="30" maxlength="255" name="libedit_phone" value="<?php echo $libinfo['phone']; ?>" /></td></tr>
		<tr><td><?php echo LIBEDIT_PHONE_MOBILE; ?></td><td><input type="text" size="30" maxlength="255" name="libedit_phone_mobile" value="<?php echo $libinfo['phone_mobile']; ?>" /></td></tr>
		<tr><td><?php echo LIBEDIT_FAX; ?></td><td><input type="text" size="30" maxlength="255" name="libedit_fax" value="<?php echo $libinfo['fax']; ?>" /></td></tr>
		<tr><td><?php echo LIBEDIT_EMAIL; ?></td><td><input type="text" size="30" maxlength="255" name="libedit_email" value="<?php echo $libinfo['email']; ?>" /></td></tr>
		</table>
    </fieldset>
    <input type="hidden" name="lib_id" value="<?php echo $libinfo['id']; ?>" />		
    <center><input type="submit" name="libedit_confirm" value="<?php echo LIBEDIT_CONFIRM; ?>" /></center>

</form><?php } ?>
<?php } ?>
<?php } ?>