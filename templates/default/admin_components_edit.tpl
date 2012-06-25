<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo COM_HEADER; ?>
<?php global $access_list; ?>
<?php global $com_list; ?>
<fieldset>
	<legend><?php echo COM_INFO_HEADER; ?></legend>
	<?php echo COM_INFO; ?>
</fieldset>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
	<legend><?php echo COMROLE_HEADER; ?></legend>
	<table border="1" width="100%">
	<tr><td width="30%"><?php echo COMROLE_FILE; ?></td><td width="45%"><?php echo COMROLE_NAME; ?></td><td><?php echo COMROLE_ROLE; ?></td></tr>
	<?php for($i=0;$i<$com_list['0']['count'];$i++) { ?>
	<tr>
		<td><?php echo $com_list[$i]['name']; ?></td>
		<td><input name="info___<?php echo $com_list[$i]['id']; ?>" type="text" value="<?php echo $com_list[$i]['info']; ?>" size="40" maxlength="255" /></td>
		<td>
			<select name="com___<?php echo $com_list[$i]['id']; ?>" size="1">
			<option value="0"></option>
			<?php for($ii=0;$ii<$access_list[0]['count'];$ii++) { ?>
			<option value="<?php echo $access_list[$ii]['id']; ?>"<?php if($com_list[$i]['access_id']==$access_list[$ii]['id'] && isset($access_list[$ii]['id'])) { echo ' selected="selected"';} ?>><?php echo $access_list[$ii]['name']; ?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
	<?php } ?>
	</table>
	<input type="submit" name="com_confirm" value="<?php echo COM_CONFIRM; ?>" />
	</fieldset>
</form>

<?php } ?>