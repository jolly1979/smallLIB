<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo PARAMETER_HEADER; ?>
<?php global $parameter_list; ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo PARAEDIT_HEADER; ?></legend>
		<table border="1" width="100%">		
		<tr><td width="33%"><?php echo PARA_NAME; ?></td><td width="34%"><?php echo PARA_INFO; ?></td><td width="33%"><?php echo PARA_VALUE; ?></td></tr>
		<?php for($i=0;$i<$parameter_list['0']['count'];$i++) { ?>
		<?php $locked=checkLockedParameter($parameter_list[$i]['del']); ?>
		<tr>
		<td><input name="parameter___<?php echo $parameter_list[$i]['id']; ?>" type="text" maxlength="64" value="<?php echo $parameter_list[$i]['parameter']; ?>" <?php echo $locked; ?>/></td>
		<td><input name="parameterinfo___<?php echo $parameter_list[$i]['id']; ?>" type="text" maxlength="255" value="<?php echo $parameter_list[$i]['info']; ?>" /></td>
		<td><input name="parametervalue___<?php echo $parameter_list[$i]['id']; ?>" type="text" maxlength="64" value="<?php echo $parameter_list[$i]['value']; ?>" /></td>
		</tr>
		<?php } ?>
		</table>
        <input type="submit" name="parameter_edit_confirm" value="<?php echo NEWSCATROLE_CONFIRM; ?>" />
    </fieldset>
</form>    
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
        <legend><?php echo PARAADD_HEADER; ?></legend>
        <table border="1" width="100%">
		<tr><td><?php echo PARAADD_PARAMETER; ?></td><td><input name="parameteradd" type="text" maxlength="64" value="<?php echo PARAADD_PARAMETER; ?>" /></td></tr>
		<tr><td><?php echo PARAADD_INFO; ?></td><td><input name="parameteraddinfo" type="text" maxlength="255" value="<?php echo PARAADD_INFO; ?>" /></td></tr>
		<tr><td><?php echo PARAADD_VALUE; ?></td><td><input name="parameteraddvalue" type="text" maxlength="64" value="<?php echo PARAADD_VALUE; ?>" /></td></tr>
		<tr><td><?php echo PARAADD_DEL; ?></td>
		<td><input name="parameteradddel" type="radio" value="0" />JA&nbsp;<input name="parameteradddel" type="radio" value="1" checked="checked"/>NEIN</td>
		</tr>
        </table>
        <input type="submit" name="parameter_add_confirm" value="<?php echo PARA_ADD_CONFIRM; ?>" />
	</fieldset>
</form>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
        <legend><?php echo PARAMETER_DEL_HEADER; ?></legend>
        <select name="parameter_del">
		<option value="0"></option>
  	      <?php for($i=0;$i<$parameter_list['0']['count'];$i++) { ?>
  	 		<?php if($parameter_list[$i]['del']==1) { ?>
  		    <option value="<?php echo $parameter_list[$i]['id']; ?>"><?php echo $parameter_list[$i]['parameter']; ?></option>
  		    <?php } ?>
  	      <?php } ?>
	    </select>
        <input type="submit" name="parameter_del_confirm" value="<?php echo NEWSCAT_DEL_CONFIRM; ?>" />
	</fieldset>
</form>
<?php } ?>