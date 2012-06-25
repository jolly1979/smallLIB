<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo PROFILE_HEADER; ?>
<?php global $user; ?>
<?php global $countrylist; ?>
<?php global $done; ?>

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
<?php echo $done; ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo PROFILE_SUBHEADER; ?></legend>
		<table border="1" width="100%">
		<colgroup><col width="30%"><col width="70%"></colgroup>
		<tr><td><?php echo PROFILE_REALNAME; ?></td>
		<td><input type="text" name="realname" size="60" maxlength="255" value="<?php echo $user['realname']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_EMAIL; ?></td>
		<td><input type="text" name="email" size="60" maxlength="255" value="<?php echo $user['email']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_STREET; ?></td>
		<td><input type="text" name="street" size="60" maxlength="255" value="<?php echo $user['street']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_STREET_NO; ?></td>
		<td><input type="text" name="street_no" size="60" maxlength="255" value="<?php echo $user['street_no']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_CITY; ?></td>
		<td><input type="text" name="city" size="60" maxlength="255" value="<?php echo $user['city']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_ZIP; ?></td>
		<td><input type="text" name="zip" size="60" maxlength="10" value="<?php echo $user['zip']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_COUNTRY; ?></td>
		<td><select name="country"><option value="0">-------</option>
		<?php for($i=0;$i<$countrylist[0]['count'];$i++) { ?>
			<option value="<?php echo $countrylist[$i]['id']; ?>"><?php echo $countrylist[$i]['name']; ?></option>
		<?php } ?>
		</select></td></tr>
		<tr><td><?php echo PROFILE_PHONE; ?></td>
		<td><input type="text" name="phone" size="60" maxlength="100" value="<?php echo $user['phone']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_PHONE_MOBILE; ?></td>
		<td><input type="text" name="phone_mobile" size="60" maxlength="100" value="<?php echo $user['phone_mobile']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_FAX; ?></td>
		<td><input type="text" name="fax" size="60" maxlength="100" value="<?php echo $user['fax']; ?>"></td></tr>
		<tr><td><?php echo PROFILE_INFO; ?></td>
		<td><textarea name="info" rows="15" cols="80" style="width: 100%"><?php echo $user['info']; ?></textarea></td></tr>
		</table>
        <input type="submit" name="profile_confirm" value="<?php echo PROFILE_CONFIRM; ?>" />
    </fieldset>
</form>

<?php } ?>