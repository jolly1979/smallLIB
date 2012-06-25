<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo ITEMEDIT_LOCHEADER; ?>
<?php global $locedit_enable; ?>
<?php global $iteminfo; ?>
<?php global $liblist; ?>
<?php global $floorlist; ?>
<?php global $roomlist; ?>
<?php global $racklist; ?>

<?php if($locedit_enable) { ?>
    <fieldset>
        <legend><?php echo ITEMEDIT_LOCSUBHEADER1; ?></legend>
        <?php echo showLocationChain($db, $iteminfo['rack_id']); ?>
	</fieldset>

    <fieldset>
    <legend><?php echo ITEMEDIT_LOCSUBHEADER2; ?></legend>
		<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
		<select name="lib_id">
		<?php for($i=0;$i<$liblist[0]['count'];$i++) { ?>
		<option value="<?php echo $liblist[$i]['id']; ?>" <?php if($liblist[$i]['id'] == $iteminfo['lib_id']) { echo "selected='selected'"; } ?>><?php echo $liblist[$i]['name']; ?></option>
		<?php } ?>
		</select>(<?php echo $liblist[0]['count']; ?>)</td>
		<input type="submit" name="lib_refresh" value="<?php echo REFRESH_CONFIRM; ?>" />
		<select name="floor_id">
		<?php for($i=0;$i<$floorlist[0]['count'];$i++) { ?>
		<option value="<?php echo $floorlist[$i]['id']; ?>" <?php if($floorlist[$i]['id'] == $iteminfo['floor_id']) { echo "selected='selected'"; } ?>><?php echo $floorlist[$i]['name']; ?></option>
		<?php } ?>
		</select>(<?php echo $floorlist[0]['count']; ?>)</td>
		<input type="submit" name="floor_refresh" value="<?php echo REFRESH_CONFIRM; ?>" />
		<select name="room_id">
		<?php for($i=0;$i<$roomlist[0]['count'];$i++) { ?>
		<option value="<?php echo $roomlist[$i]['id']; ?>" <?php if($roomlist[$i]['id'] == $iteminfo['room_id']) { echo "selected='selected'"; } ?>><?php echo $roomlist[$i]['name']; ?></option>
		<?php } ?>
		</select>(<?php echo $roomlist[0]['count']; ?>)</td>
		<input type="submit" name="room_refresh" value="<?php echo REFRESH_CONFIRM; ?>" />
		<select name="rack_id">
		<?php for($i=0;$i<$racklist[0]['count'];$i++) { ?>
		<option value="<?php echo $racklist[$i]['id']; ?>" <?php if($racklist[$i]['id'] == $iteminfo['sug_rack_id']) { echo "selected='selected'"; } ?>><?php echo $racklist[$i]['name']; ?></option>
		<?php } ?>
		</select>(<?php echo $racklist[0]['count']; ?>)</td>
		<input type="submit" name="rack_refresh" value="<?php echo REFRESH_CONFIRM; ?>" />
		<br /><?php echo ITEMEDIT_LOCCHOSEN; ?><?php echo showLocationChain($db, $iteminfo['sug_rack_id']); ?><br />
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
		<input type="hidden" name="final_rack_id" value="<?php echo $iteminfo['sug_rack_id']; ?>" />
		<center><input type="submit" name="locedit_confirm" value="<?php echo ITEMEDIT_LOCCONFIRM; ?>" /></center>
		</form>
	</fieldset>



<?php } else { ?>
	<?php echo ITEMEDIT_EDITNO; ?>
<?php } ?>
<?php } ?>