<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo ACCESS_HEADER; ?>
<?php global $access_list; ?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo ACCESSROLE_HEADER; ?></legend>
		<table border="1" width="100%">		
		<tr><td width="50%"><?php echo ACCESSROLE_NAME; ?></td><td><?php echo ACCESSROLE_ROLE; ?></td></tr>
		<?php for($i=0;$i<$access_list['0']['count'];$i++) { ?>
		<?php $locked=checkLockedAccess($access_list[$i]['accesslevel']); ?>
		<tr>
			<td><?php echo $access_list[$i]['name'] ?></td>
			<td><input name="access___<?php echo $access_list[$i]['id'] ?>" type="text" size="4" maxlength="4" value="<?php echo $access_list[$i]['accesslevel'] ?>" <?php echo $locked; ?> /></td>
		</tr>
		<?php } ?>
		</table>
        <input type="submit" name="accessrole_confirm" value="<?php echo ACCESSROLE_CONFIRM; ?>" />
    </fieldset>
</form>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
        <legend><?php echo ACCESSROLE_ADDROLE_HEADER; ?></legend>
        <table border="1" width="100%">
        <tr><td width="35%"><?php echo ACCESSROLE_ADDROLE_NAME; ?></td><td><input name="addrole_name" type="text" size="40" maxlength="40" value="<?php echo ACCESSROLE_ADDROLE_NAME; ?>"/></td></tr>
        <tr><td><?php echo ACCESSROLE_ADDROLE_LEVEL; ?></td><td><input name="addrole_level" type="text" size="4" maxlength="4" value="500"/></td></tr>
        </table>
        <input type="submit" name="accessrole_add_confirm" value="<?php echo ACCESSROLE_ADD_CONFIRM; ?>" />
	</fieldset>
</form>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
        <legend><?php echo ACCESSROLE_DELROLE_HEADER; ?></legend>
        <select name="role_del">
        <?php for($i=0;$i<$access_list['0']['count'];$i++) { ?>
        <option value="<?php echo $access_list[$i]['id'] ?>"><?php echo $access_list[$i]['name'] ?></option>
        <?php } ?>
        </select>
        <input type="submit" name="accessrole_del_confirm" value="<?php echo ACCESSROLE_DEL_CONFIRM; ?>" />
	</fieldset>
</form>
<?php } ?>