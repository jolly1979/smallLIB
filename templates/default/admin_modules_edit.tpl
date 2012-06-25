<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo MODULES_HEADER; ?>
<?php global $access_list; ?>
<?php global $module_list; ?>
<fieldset>
	<legend><?php echo MODULES_INFO_HEADER; ?></legend>
	<?php echo MODULES_INFO; ?>
</fieldset>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
	<legend><?php echo MODULESROLE_HEADER; ?></legend>
	<table border="1" width="100%">
	<tr><td width="30%"><?php echo MODULEROLE_FILE; ?></td><td width="45%"><?php echo MODULEROLE_NAME; ?></td><td><?php echo MODULEROLE_ROLE; ?></td></tr>
	<?php for($i=0;$i<$module_list['0']['count'];$i++) { ?>
	<tr>
		<td><?php echo $module_list[$i]['name']; ?></td>
		<td><input name="info___<?php echo $module_list[$i]['id']; ?>" type="text" value="<?php echo $module_list[$i]['info']; ?>" size="40" maxlength="255" /></td>
		<td>
			<select name="module___<?php echo $module_list[$i]['id']; ?>" size="1">
			<option value="0"></option>
			<?php for($ii=0;$ii<$access_list[0]['count'];$ii++) { ?>
			<option value="<?php echo $access_list[$ii]['id']; ?>"<?php if($module_list[$i]['access_id']==$access_list[$ii]['id'] && isset($access_list[$ii]['id'])) { echo ' selected="selected"';} ?>><?php echo $access_list[$ii]['name']; ?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
	<?php } ?>
	</table>
	<input type="submit" name="module_confirm" value="<?php echo MODULE_CONFIRM; ?>" />
	</fieldset>
</form>



<?php } ?>