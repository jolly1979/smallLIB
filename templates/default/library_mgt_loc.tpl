<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo LIBLOCEDIT_HEADER; ?>
<?php global $lib_list_only; ?>
<?php global $lib_list; ?>
<?php global $floorlist; ?>
<?php global $roomlist; ?>
<?php global $racklist; ?>
<?php global $lib_id; ?>
<?php global $floor_id; ?>
<?php global $room_id; ?>
<?php global $rack_id; ?>



<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo LIBLOCEDIT_SUBHEADER1; ?></legend>
        <select name="lib_id">
		<?php for($i=0;$i<$lib_list[0]['count'];$i++) { ?>
		<option value="<?php echo $lib_list[$i]['id']; ?>" <?php if($lib_list[$i]['id']==$lib_id) { echo "selected='selected'"; } ?>><?php echo $lib_list[$i]['name']; ?></option>
		<?php } ?>
		</select>
        <input type="submit" name="liblocchose_confirm" value="<?php echo LIBLOCCHOSE_CONFIRM; ?>" />
	</fieldset>
</form>



<?php if(!$lib_list_only) { ?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo LIBLOCEDIT_SUBHEADER2; ?></legend>
        <table border="0" width="100%">
		<colgroup><col width="29%"><col width="5%"><col width="28%"><col width="5%"><col width="28%"><col width="5%"></colgroup>  
        <tr>
	        <td align="center"><select name="floor_id">
			<?php for($i=0;$i<$floorlist[0]['count'];$i++) { ?>
			<option value="<?php echo $floorlist[$i]['id']; ?>" <?php if($floorlist[$i]['id'] == $floor_id) { echo "selected='selected'"; } ?>><?php echo $floorlist[$i]['name']; ?></option>
			<?php } ?>
			</select>(<?php echo $floorlist[0]['count']; ?>)</td>
			<td><input type="submit" name="floor_refresh" value="<?php echo REFRESH_CONFIRM; ?>" /></td>
	   	    <td align="center"><select name="room_id">
			<?php for($i=0;$i<$roomlist[0]['count'];$i++) { ?>
			<option value="<?php echo $roomlist[$i]['id']; ?>" <?php if($roomlist[$i]['id'] == $room_id) { echo "selected='selected'"; } ?>><?php echo $roomlist[$i]['name']; ?></option>
			<?php } ?>
			</select>(<?php echo $roomlist[0]['count']; ?>)</td>
			<td><input type="submit" name="room_refresh" value="<?php echo REFRESH_CONFIRM; ?>" /></td>
			<td align="center"><select name="rack_id">
			<?php for($i=0;$i<$racklist[0]['count'];$i++) { ?>
			<option value="<?php echo $racklist[$i]['id']; ?>" <?php if($racklist[$i]['id'] == $rack_id) { echo "selected='selected'"; } ?>><?php echo $racklist[$i]['name']; ?></option>
			<?php } ?>
			</select>(<?php echo $racklist[0]['count']; ?>)
			<td><input type="submit" name="rack_refresh" value="<?php echo REFRESH_CONFIRM; ?>" /></td>
			<input type="hidden" name="lib_id" value="<?php echo $lib_id; ?>">
        </tr>
        </table>
	</fieldset>        
    <fieldset>
        <legend><?php echo LIBLOCEDIT_SUBHEADER3; ?></legend>
        <table border="0" width="100%">
		<colgroup><col width="29%"><col width="5%"><col width="28%"><col width="5%"><col width="28%"><col width="5%"></colgroup>        
        <tr>
 	        <td align="center"><input type="text" maxsize="255" name="floor_name" value="<?php $floor = getFloorInfo($db, $floor_id); echo $floor['name']; ?>"></td>
			<td></td>
 	        <td align="center"><input type="text" maxsize="255" name="room_name" value="<?php $room = getRoomInfo($db, $room_id); echo $room['name']; ?>"></td>
			<td></td>
 	        <td align="center"><input type="text" maxsize="255" name="rack_name" value="<?php $rack = getRackInfo($db, $rack_id); echo $rack['name']; ?>"></td>
        	<td></td>
        </tr>
        <tr>
 	        <td align="center"><textarea name="floor_text"><?php $floor = getFloorInfo($db, $floor_id); echo $floor['info']; ?></textarea></td>
			<td></td>
 	        <td align="center"><textarea name="room_text"><?php $room = getRoomInfo($db, $room_id); echo $room['info']; ?></textarea></td>
			<td></td>
 	        <td align="center"><textarea name="rack_text"><?php $rack = getRackInfo($db, $rack_id); echo $rack['info']; ?></textarea></td>
        	<td></td>
        </tr>
        <tr>
 	        <td align="center"><input type="submit" name="floor_confirm" value="<?php echo LIBLOCEDIT_CONFIRM; ?>"></td>
			<td></td>
 	        <td align="center"><input type="submit" name="room_confirm" value="<?php echo LIBLOCEDIT_CONFIRM; ?>"></td>
			<td></td>
 	        <td align="center"><input type="submit" name="rack_confirm" value="<?php echo LIBLOCEDIT_CONFIRM; ?>"></td>
        	<td></td>
        </tr>
        </table>
	</fieldset>        
    <fieldset>
        <legend><?php echo LIBLOCEDIT_SUBHEADER4; ?></legend>
        <table border="0" width="100%">
		<colgroup><col width="29%"><col width="5%"><col width="28%"><col width="5%"><col width="28%"><col width="5%"></colgroup>        
        <tr>
 	        <td align="center"><input type="text" maxsize="255" name="floor_insert" value="<?php echo LIBLOCNEW_FLOOR; ?>"></td>
			<td></td>
 	        <td align="center"><input type="text" maxsize="255" name="room_insert" value="<?php echo LIBLOCNEW_ROOM; ?>"></td>
			<td></td>
 	        <td align="center"><input type="text" maxsize="255" name="rack_insert" value="<?php echo LIBLOCNEW_RACK; ?>"></td>
        	<td></td>
        </tr>
        <tr>
 	        <td align="center"><input type="submit" name="newfloor_confirm" value="<?php echo LIBLOCNEW_CONFIRM; ?>"></td>
			<td></td>
 	        <td align="center"><input type="submit" name="newroom_confirm" value="<?php echo LIBLOCNEW_CONFIRM; ?>"></td>
			<td></td>
 	        <td align="center"><input type="submit" name="newrack_confirm" value="<?php echo LIBLOCNEW_CONFIRM; ?>"></td>
        	<td></td>
        </tr>
        </table>
	</fieldset> 
</form>

<fieldset>
	<legend><?php echo LIBLOCEDIT_SUBHEADER5; ?></legend>
	<table width="100%">
	<colgroup><col width="33%"><col width="33%"><col width="34%"></colgroup>
	<?php for($i=0;$i<$floorlist[0]['count'];$i++) { ?>
	<tr><td><?php echo $floorlist[$i]['name']; ?></td><td>&not;</td><td></td></tr>
		<?php $roomlist = getRoomList($db, $floorlist[$i]['id']); ?>
		<?php for($ii=0;$ii<$roomlist[0]['count'];$ii++) { ?>
			<tr><td></td><td><?php echo $roomlist[$ii]['name']; ?></td><td>&not;</td></tr>
			<?php $racklist = getRackList($db, $roomlist[$ii]['id']); ?>
			<?php for($iii=0;$iii<$racklist[0]['count'];$iii++) { ?>
				<tr><td></td><td>&zwnj;</td><td><?php echo $racklist[$iii]['name']; ?></td></tr>
			<?php } ?>			
		<?php } ?>
	<?php } ?>
	
	</table>
</fieldset>


<?php } ?>
<?php } ?>