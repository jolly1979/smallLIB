<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo NAVI_HEADER; ?>
<?php global $nav_list; ?>
<?php global $full_nav_list; ?>
<?php global $access_list; ?>
<?php global $component_list; ?>
<?php global $parents; ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo NAVIEDIT_HEADER; ?></legend>
		<table border="1" width="100%">		
		<tr><td align="center"><?php echo NAVI_NAME; ?></td>
		<td align="center"><?php echo NAVI_MODULE; ?></td>
		<td align="center"><?php echo NAVI_PARENT; ?></td>
		<td align="center"><?php echo NAVI_ORDER; ?></td></tr>
		<?php for($i=0;$i<$nav_list['0']['links'];$i++) { ?>
			<?php $checked = checkActiveNavigation($nav_list[$i]['active']); ?>
			<!--Name-->
			<tr><td><input name="name___<?php echo $nav_list[$i]['id']; ?>" type="text" value="<?php echo $nav_list[$i]['name']; ?>" maxlength="100" /></td>
			<!--Module-->
			<td align="center"><select name="module___<?php echo $nav_list[$i]['id']; ?>">
			<option value="0"></option>
			<?php for($iii=0;$iii<$component_list[0]['count'];$iii++) { ?>
				<option value="<?php echo $component_list[$iii]['name']; ?>"<?php if($nav_list[$i]['com'] == $component_list[$iii]['name']) { echo " selected='selected'"; } ?>><?php echo $component_list[$iii]['name']; ?></option>
			<?php } ?>
			</select></td>
			<!--Parent-->
			<td align="center"><select name="parent___<?php echo $nav_list[$i]['id']; ?>" width="20px">
			<option value="0" checked="checked">-------</option>
			<?php for($iii=0;$iii<$parents[0]['links'];$iii++) { ?>
				<option value="<?php echo $parents[$iii]['id']; ?>"><?php echo $parents[$iii]['name']; ?></option>
			<?php } ?>
			</select></td>
			<!--Order/Priority-->
			<td align="center"><input name="prio___<?php echo $nav_list[$i]['id']; ?>" type="text" value="<?php echo $nav_list[$i]['prio']; ?>" size="2" maxlength="3" /></td>
			<?php $subnavigation = get_navigation($db, $nav_list[$i]['id']); ?>
			<?php if($nav_list[0]['links']>0) { ?>
				<?php for($ii=0;$ii<$subnavigation[0]['links'];$ii++) { ?>
				<?php $subchecked = checkActiveNavigation($subnavigation[$ii]['active']); ?>
				<!--Name-->
				<tr><td>&mdash;<input name="name___<?php echo $subnavigation[$ii]['id']; ?>" type="text" value="<?php echo $subnavigation[$ii]['name']; ?>" maxlength="100" /></td>
				<!--Module-->
				<td align="center"><select name="module___<?php echo $subnavigation[$ii]['id']; ?>">
				<option value="0"></option>
				<?php for($iii=0;$iii<$component_list[0]['count'];$iii++) { ?>
					<option value="<?php echo $component_list[$iii]['name']; ?>"<?php if($subnavigation[$ii]['com'] == $component_list[$iii]['name']) { echo " selected='selected'"; } ?>><?php echo $component_list[$iii]['name']; ?></option>
				<?php } ?>
				</select></td>
				<!--Parent-->
				<td align="center"><select name="parent___<?php echo $subnavigation[$ii]['id']; ?>" width="20px">
				<option value="0">-------</option>
				<?php for($iii=0;$iii<$parents[0]['links'];$iii++) { ?>
					<option value="<?php echo $parents[$iii]['id']; ?>"<?php if($parents[$iii]['id']==$subnavigation[$ii]['parent']) { echo ' selected="selected"';} ?>><?php echo $parents[$iii]['name']; ?></option>
				<?php } ?>
				</select></td>
				<!--Order/Priority-->
				<td align="center"><input name="prio___<?php echo $subnavigation[$ii]['id']; ?>" type="text" value="<?php echo $subnavigation[$ii]['prio']; ?>" size="2" maxlength="3" /></td>
				<?php } ?>
			<?php } ?>
		<?php } ?>
		</table>
        <input type="submit" name="navi_edit_confirm" value="<?php echo ACCESSROLE_CONFIRM; ?>" />
    </fieldset>
</form>    

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo NAVIROLEEDIT_HEADER; ?></legend>
		<table border="1" width="100%">		
		<tr><td align="center"><?php echo NAVI_NAME; ?></td>
		<td align="center"><?php echo NAVI_ROLE; ?></td>
		<td align="center"><?php echo NAVI_ACTIVE; ?></td></tr>
		<?php for($i=0;$i<$nav_list['0']['links'];$i++) { ?>
		<?php $checked = checkActiveNavigation($nav_list[$i]['active']); ?>
		<tr><td><?php echo $nav_list[$i]['name']; ?></td>
		<!--Access-->
		<td align="center"><select name="access___<?php echo $nav_list[$i]['id']; ?>">
		<option value="0"></option>
		<?php for($ii=0;$ii<$access_list[0]['count'];$ii++) { ?>
		<option value="<?php echo $access_list[$ii]['id']; ?>"<?php if($nav_list[$i]['access_id']==$access_list[$ii]['id'] && isset($access_list[$ii]['id'])) { echo ' selected="selected"';} ?>><?php echo $access_list[$ii]['name']; ?></option>	
		<?php } ?>
		</select></td>
		<!--Active-->
		<td align="center"><input name="active___<?php echo $nav_list[$i]['id']; ?>" type="checkbox" value="check_active" <?php echo $checked; ?>/></td></tr>
		<?php $subnavigation = get_navigation($db, $nav_list[$i]['id']); ?>
		<?php if($nav_list[0]['links']>0) { ?>
			<?php for($ii=0;$ii<$subnavigation[0]['links'];$ii++) { ?>
			<?php $subchecked = checkActiveNavigation($subnavigation[$ii]['active']); ?>
			<tr><td>&mdash;<?php echo $subnavigation[$ii]['name']; ?></td>
			<!--Access-->
			<td align="center"><select name="access___<?php echo $subnavigation[$ii]['id']; ?>">
			<option value="0"></option>
			<?php for($iii=0;$iii<$access_list[0]['count'];$iii++) { ?>
			<option value="<?php echo $access_list[$iii]['id']; ?>"<?php if($subnavigation[$ii]['access_id']==$access_list[$iii]['id'] && isset($access_list[$iii]['id'])) { echo ' selected="selected"';} ?>><?php echo $access_list[$iii]['name']; ?></option>	
			<?php } ?>
			</select></td>
			<!--Active-->
			<td align="center"><input name="active___<?php echo $subnavigation[$ii]['id']; ?>" type="checkbox" value="check_active" <?php echo $subchecked; ?>/></td></tr>
			<?php } ?>
		<?php } ?>
		<?php } ?>
		</table>
        <input type="submit" name="navi_access_confirm" value="<?php echo ACCESSROLE_CONFIRM; ?>" />
    </fieldset>
</form>    

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
        <legend><?php echo NAVIADD_HEADER; ?></legend>
        <table border="1" width="100%">
        <tr><td><?php echo NAVIADD_NAME; ?></td><td><input type="text" name="naviadd_name" size="60" maxlength="100" /></td></tr>
        <tr><td><?php echo NAVIADD_MODULE; ?></td><td><select name="naviadd_module">
		<?php for($i=0;$i<$component_list[0]['count'];$i++) { ?>
			<option value="<?php echo $component_list[$i]['name']; ?>"><?php echo $component_list[$i]['name']; ?></option>
		<?php } ?>
		</select></td></tr>
        <tr><td><?php echo NAVIADD_PARENT; ?></td><td><select name="naviadd_parent">
		<option value="0" checked="checked">-------</option>
		<?php for($i=0;$i<$nav_list[0]['links'];$i++) { ?>
			<option value="<?php echo $nav_list[$i]['id']; ?>"><?php echo $nav_list[$i]['name']; ?></option>			<?php } ?>
		</select></td></tr>
        <tr><td><?php echo NAVIADD_PRIO; ?></td><td><input type="text" name="naviadd_prio" maxlength="3"></td></tr>
        <tr><td><?php echo NAVIADD_ROLE; ?></td><td><select name="naviadd_role">
		<?php for($i=0;$i<$access_list[0]['count'];$i++) { ?>
		<option value="<?php echo $access_list[$i]['id']; ?>"><?php echo $access_list[$i]['name']; ?></option>	
		<?php } ?>
		</select></td></tr>
        <tr><td><?php echo NAVIADD_ACTIVE; ?></td><td><input name="naviadd_active" type="checkbox" value="check_active" /></td></tr>
        </table>
        <input type="submit" name="navi_add_confirm" value="<?php echo NAVIADD_CONFIRM; ?>" />
	</fieldset>
</form>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<fieldset>
        <legend><?php echo NAVIDEL_HEADER; ?></legend>
        <select name="navi_del">
        <?php for($i=0;$i<$full_nav_list['0']['links'];$i++) { ?>
        <option value="<?php echo $full_nav_list[$i]['id'] ?>">
        <?php 
        if($full_nav_list[$i]['parent']>0) {
        	$parent = getParent($db, $full_nav_list[$i]['parent']);
        	echo $parent['name']." ------ ".$full_nav_list[$i]['name'];
        }
        else {
        	echo $full_nav_list[$i]['name'];
        }?></option>
        <?php } ?>
        </select>
        <input type="submit" name="navi_del_confirm" value="<?php echo NAVI_DEL_CONFIRM; ?>" />
	</fieldset>
</form> 
<?php } ?>