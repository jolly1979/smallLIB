<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo NEWSCAT_HEADER; ?>
<?php global $newscat_list; ?>
<?php global $access_list; ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo NEWSCATROLE_HEADER; ?></legend>
		<table border="1" width="100%">		
		<tr><td width="50%"><?php echo NEWSCAT_NAME; ?></td><td><?php echo NEWSCAT_INFO; ?></td><td><?php echo NEWSCAT_ROLE; ?></td></tr>
		<?php for($i=0;$i<$newscat_list['0']['count'];$i++) { ?>
		<tr>
			<td><?php echo $newscat_list[$i]['name']; ?> (ID: <?php echo $newscat_list[$i]['id']; ?>)</td>
			<td><input name="info___<?php echo $newscat_list[$i]['id']; ?>" type="text" value="<?php echo $newscat_list[$i]['info']; ?>" size="40" maxlength="255" /></td>
			<td>
				<select name="newscat___<?php echo $newscat_list[$i]['id']; ?>" size="1">
				<option value="0"></option>
				<?php for($ii=0;$ii<$access_list[0]['count'];$ii++) { ?>
				<option value="<?php echo $access_list[$ii]['id']; ?>"<?php if($newscat_list[$i]['access_id']==$access_list[$ii]['id'] && isset($access_list[$ii]['id'])) { echo ' selected="selected"';} ?>><?php echo $access_list[$ii]['name']; ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<?php } ?>		
		</table>
        <input type="submit" name="newscat_role_confirm" value="<?php echo NEWSCATROLE_CONFIRM; ?>" />
    </fieldset>
</form>    
<fieldset>
	<legend><?php echo USER_INFO_HEADER; ?></legend>
	<?php echo USER_INFO; ?>
</fieldset>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
        <legend><?php echo NEWSCAT_ADDNEWSCAT_HEADER; ?></legend>
        <table border="1" width="100%">
        <tr>
        <td width="35%"><?php echo NEWSCAT_ADDNEWSCAT_NAME; ?></td><td><input name="newscat_add_name" type="text" size="40" maxlength="40" /></td></tr>
        <tr><td><?php echo NEWSCAT_ADDNEWSCAT_LEVEL; ?></td>
        <td>
        <select name="newscat_add_role">
        <?php for($i=0;$i<$access_list['0']['count'];$i++) { ?>
        <option value="<?php echo $access_list[$i]['id'] ?>"><?php echo $access_list[$i]['name'] ?></option>
        <?php } ?>
        </select>
        </td>
        </tr>
        </table>
        <input type="submit" name="newscat_add_confirm" value="<?php echo NEWSCAT_ADDNEWSCAT_CONFIRM; ?>" />
	</fieldset>
</form>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
        <legend><?php echo NEWSCAT_DELNEWSCAT_HEADER; ?></legend>
        <select name="newscat_del">
  	      <?php for($i=0;$i<$newscat_list['0']['count'];$i++) { ?>
  	      <option value="<?php echo $newscat_list[$i]['id']; ?>"><?php echo $newscat_list[$i]['name']; ?></option>
  	      <?php } ?>
	    </select>
        <input type="submit" name="newscat_del_confirm" value="<?php echo NEWSCAT_DEL_CONFIRM; ?>" />
	</fieldset>
</form>
<?php } ?>