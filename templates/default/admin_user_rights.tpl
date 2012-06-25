<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo USER_HEADER; ?>
<?php global $userlist; ?>
<?php global $access_list; ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo USERROLE_HEADER; ?></legend>
		<table border="1" width="100%">		
		<tr><td width="33%"><?php echo USERROLE_REALNAME; ?></td><td width="33%"><?php echo USERROLE_NAME; ?></td><td><?php echo USERROLE_ROLE; ?></td></tr>
		<?php for($i=0;$i<$userlist[0]['count'];$i++) { ?>
		<tr>
			<td><?php echo $userlist[$i]['realname']; ?></td>
			<td><?php echo $userlist[$i]['username']; ?></td>
			<td>
				<select name="user___<?php echo $userlist[$i]['id']; ?>" size="1">
				<option value="0"></option>
				<?php for($ii=0;$ii<$access_list[0]['count'];$ii++) { ?>
				<option value="<?php echo $access_list[$ii]['id']; ?>"<?php if($userlist[$i]['access_id']==$access_list[$ii]['id'] && isset($access_list[$ii]['id'])) { echo ' selected="selected"';} ?>><?php echo $access_list[$ii]['name']; ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<?php } ?>
		</table>
        <input type="submit" name="userrole_confirm" value="<?php echo USERROLE_CONFIRM; ?>" />
    </fieldset>
</form>
<fieldset>
	<legend><?php echo USER_INFO_HEADER; ?></legend>
	<?php echo USER_INFO; ?>
</fieldset>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<fieldset>
        <legend><?php echo USERROLE_DEL_HEADER; ?></legend>
        <select name="user_del">
        <?php for($i=0;$i<$userlist['0']['count'];$i++) { ?>
        <option value="<?php echo $userlist[$i]['id']; ?>"><?php echo $userlist[$i]['realname']; ?> - <?php echo $userlist[$i]['username']; ?></option>
        <?php } ?>
        </select>
        <input type="submit" name="user_del_confirm" value="<?php echo USERROLE_DEL_CONFIRM; ?>" />
	</fieldset>
</form>

<?php } ?>