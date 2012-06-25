<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo BORROWER_HEADER; ?>
<?php global $userlist; ?>
<?php global $borrowerlist; ?>
<?php global $borrower; ?>
<?php global $show_edit_details; ?>

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
        <legend><?php echo BORROWER_SUBHEADER1; ?></legend>
		<table border="1" width="100%">
		<colgroup><col width="30%"><col width="70%"></colgroup>
		<tr><td><?php echo BORROWER_ADD_NAME; ?></td>
		<td><input type="text" name="name" size="60" maxlength="255"></td></tr>
		<tr><td><?php echo BORROWER_ADD_EMAIL; ?></td>
		<td><input type="text" name="email" size="60" maxlength="255"></td></tr>		
		<tr><td><?php echo BORROWER_ADD_PHONE; ?></td>
		<td><input type="text" name="phone" size="60" maxlength="100"></td></tr>
		<tr><td><?php echo BORROWER_ADD_PHONE_MOBILE; ?></td>
		<td><input type="text" name="phone_mobile" size="60" maxlength="100"></td></tr>
		<tr><td><?php echo BORROWER_ADD_INFO; ?></td>
		<td><textarea name="info" rows="4" cols="80" style="width: 100%"></textarea></td></tr>
		</table>
        <input type="submit" name="borrower_add" value="<?php echo BORROWER_ADD_CONFIRM; ?>" />
	</fieldset>
	<fieldset>
        <legend><?php echo BORROWER_SUBHEADER2; ?></legend>
		<select name="user_id"><option value="0">----------</option>
		<?php for($i=0;$i<$userlist[0]['count'];$i++) { ?>
			<option value="<?php echo $userlist[$i]['id']; ?>"><?php echo $userlist[$i]['realname']; ?></option>
		<?php } ?>
		</select>
        <input type="submit" name="borrower_copy" value="<?php echo BORROWER_COPY_CONFIRM; ?>" />
	</fieldset>
	<fieldset>
        <legend><?php echo BORROWER_SUBHEADER3; ?></legend>
		<table border="1" width="100%">
		<colgroup><col width="30%"><col width="70%"></colgroup>
		<tr><td></td>
		<td><select name="borrower_id"><option value="0">----------</option>
		<?php for($i=0;$i<$borrowerlist[0]['count'];$i++) { ?>
			<option value="<?php echo $borrowerlist[$i]['id']; ?>" <?php if($borrowerlist[$i]['id'] == $borrower['id']) { echo " selected = 'selected'";} ?>><?php echo $borrowerlist[$i]['name']; ?></option>
		<?php } ?>
		</select><input type="submit" name="borrowerchose_edit" value="<?php echo BORROWERCHOSE_EDIT_CONFIRM; ?>" /></td></tr>
		<?php if($show_edit_details) { ?>
		<tr><td><?php echo BORROWER_ADD_NAME; ?></td>
		<td><input type="text" name="name_edit" size="60" maxlength="255" value="<?php echo $borrower['name']; ?>"></td></tr>
		<tr><td><?php echo BORROWER_ADD_EMAIL; ?></td>
		<td><input type="text" name="email_edit" size="60" maxlength="255" value="<?php echo $borrower['email']; ?>"></td></tr>		
		<tr><td><?php echo BORROWER_ADD_PHONE; ?></td>
		<td><input type="text" name="phone_edit" size="60" maxlength="100" value="<?php echo $borrower['phone']; ?>"></td></tr>
		<tr><td><?php echo BORROWER_ADD_PHONE_MOBILE; ?></td>
		<td><input type="text" name="phone_mobile_edit" size="60" maxlength="100" value="<?php echo $borrower['phone_mobile']; ?>"></td></tr>
		<tr><td><?php echo BORROWER_ADD_INFO; ?></td>
		<td><textarea name="info_edit" rows="4" cols="80" style="width: 100%"><?php echo $borrower['info']; ?></textarea></td></tr>
		<?php } ?>
		</table>
		<input type="hidden" name="borroweredit_id" value="<?php echo $borrower['id']; ?>">
        <input type="submit" name="borrower_edit" value="<?php echo BORROWER_EDIT_CONFIRM; ?>" />
	</fieldset>		
</form>




<?php } ?>