<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo ITEMADD_HEADER; ?>
<?php global $SearchIndexList; ?>
<?php global $keywords; ?>
<?php global $lib_list_only; ?>
<?php global $lib_list; ?>
<?php global $floorlist; ?>
<?php global $roomlist; ?>
<?php global $racklist; ?>
<?php global $lib_id; ?>
<?php global $floor_id; ?>
<?php global $room_id; ?>
<?php global $rack_id; ?>
<?php global $db; ?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo ITEMADD_SUBHEADER4; ?></legend>
        <select name="lib_id">
		<?php for($i=0;$i<$lib_list[0]['count'];$i++) { ?>
		<option value="<?php echo $lib_list[$i]['id']; ?>" <?php if($lib_list[$i]['id']==$lib_id) { echo "selected='selected'"; } ?>><?php echo $lib_list[$i]['name']; ?></option>
		<?php } ?>
		</select>
        <input type="submit" name="libchose_confirm" value="<?php echo REFRESHLIB_CONFIRM; ?>" />
		<?php if(!$lib_list_only) { ?>
	        <select name="floor_id">
			<?php for($i=0;$i<$floorlist[0]['count'];$i++) { ?>
			<option value="<?php echo $floorlist[$i]['id']; ?>" <?php if($floorlist[$i]['id'] == $floor_id) { echo "selected='selected'"; } ?>><?php echo $floorlist[$i]['name']; ?></option>
			<?php } ?>
			</select>(<?php echo $floorlist[0]['count']; ?>)</td>
			<input type="submit" name="floor_refresh" value="<?php echo REFRESH_CONFIRM; ?>" />
	   	    <select name="room_id">
			<?php for($i=0;$i<$roomlist[0]['count'];$i++) { ?>
			<option value="<?php echo $roomlist[$i]['id']; ?>" <?php if($roomlist[$i]['id'] == $room_id) { echo "selected='selected'"; } ?>><?php echo $roomlist[$i]['name']; ?></option>
			<?php } ?>
			</select>(<?php echo $roomlist[0]['count']; ?>)</td>
			<input type="submit" name="room_refresh" value="<?php echo REFRESH_CONFIRM; ?>" />
			<select name="rack_id">
			<?php for($i=0;$i<$racklist[0]['count'];$i++) { ?>
			<option value="<?php echo $racklist[$i]['id']; ?>" <?php if($racklist[$i]['id'] == $rack_id) { echo "selected='selected'"; } ?>><?php echo $racklist[$i]['name']; ?></option>
			<?php } ?>
			</select>(<?php echo $racklist[0]['count']; ?>)
			<input type="submit" name="rack_refresh" value="<?php echo REFRESH_CONFIRM; ?>" />
			<br />(<?php echo showLocationChain($db, $rack_id); ?>)
		<?php } ?>
	</fieldset>   
</form>

<?php if(!$lib_list_only) { ?>
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

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?com=item_mgt_add_ean&nav=".$_GET['nav']) ?>" method="post">
    <fieldset>
        <legend><?php echo ITEMADD_SUBHEADER1; ?></legend>
        <select name="SearchIndex">
        <?php for($i=0;$i<$SearchIndexList[0]['count'];$i++) { ?>
        <option value="<?php echo $SearchIndexList[$i]['searchindex']; ?>"><?php echo $SearchIndexList[$i]['name']; ?></option>
        <?php } ?>
        </select>
        <input type="text" size="50" maxlength="255" name="keywords" value="<?php echo $keywords; ?>">
        <input type="submit" name="search_confirm" value="<?php echo ITEMADD_EAN_CONFIRM; ?>">
        <input type="hidden" name="lib_id_add" value="<?php echo $lib_id; ?>">
        <input type="hidden" name="floor_id_add" value="<?php echo $floor_id; ?>">
        <input type="hidden" name="room_id_add" value="<?php echo $room_id; ?>">
        <input type="hidden" name="rack_id_add" value="<?php echo $rack_id; ?>">
	</fieldset>
</form>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo ITEMADD_SUBHEADER3; ?></legend>
        <input type="submit" name="add_confirm" value="<?php echo ITEMADD_CONFIRM; ?>">
		<table border="1" width="100%">	
        <tr><td width="150px"><?php echo ITEMADD_CAT; ?></td><td><select name="index"><?php for($i=0;$i<$SearchIndexList[0]['count'];$i++) { ?>
        <option value="<?php echo $SearchIndexList[$i]['id']; ?>"><?php echo $SearchIndexList[$i]['name']; ?></option>
        <?php } ?></select></td></tr>
        <tr><td><?php echo ITEMADD_TITLE; ?></td><td><input type="text" size="50" maxlength="255" name="title"></td></tr>
        <tr><td><?php echo ITEMADD_AUTHOR0; ?></td><td><input type="text" size="50" maxlength="255" name="author"></td></tr>        
		<tr><td><?php echo ITEMADD_CREATOR; ?></td><td><input type="text" size="50" maxlength="255" name="creator"></td></tr> 
		<tr><td><?php echo ITEMADD_PUBLISHER; ?></td><td><input type="text" size="50" maxlength="255" name="publisher"></td></tr>
		<tr><td><?php echo ITEMADD_LABEL; ?></td><td><input type="text" size="50" maxlength="255" name="label"></td></tr>
		<tr><td><?php echo ITEMADD_EDITION; ?></td><td><input type="text" size="50" maxlength="255" name="edition"></td></tr>
		<tr><td><?php echo ITEMADD_BINDING; ?></td><td><input type="text" size="50" maxlength="255" name="binding"></td></tr>				
		<tr><td><?php echo ITEMADD_PUBDATE; ?></td><td><input type="text" size="50" maxlength="255" name="pubdate"></td></tr>
		<tr><td><?php echo ITEMADD_NUMPAGES; ?></td><td><input type="text" size="50" maxlength="100" name="numpages"></td></tr>
		<tr><td><?php echo ITEMADD_KEYWORDS; ?></td><td><input type="text" size="50" maxlength="255" name="keywords"></td></tr>
		<tr><td><?php echo ITEMADD_PRICE; ?></td><td><input type="text" size="50" maxlength="10" name="price"></td></tr>
		<tr><td><?php echo ITEMADD_CURR; ?></td><td><input type="text" size="50" maxlength="100" name="curr"></td></tr>
		<tr><td><?php echo ITEMADD_FEATURE; ?></td><td><textarea name="feature" rows="3" cols="80" style="width: 100%"></textarea></td></tr>		
		<tr><td><?php echo ITEMADD_DESCR; ?></td><td><textarea name="descr" rows="3" cols="80" style="width: 100%"></textarea></td></tr>
		<tr><td><?php echo ITEMADD_ISBN; ?></td><td><input type="text" size="50" maxlength="20" name="isbn"></td></tr>
		<tr><td><?php echo ITEMADD_OWNCODE; ?></td><td><input type="text" size="50" maxlength="100" name="owncode"></td></tr>
        </table>
        <input type="submit" name="add_confirm" value="<?php echo ITEMADD_CONFIRM; ?>">
        <input type="hidden" name="lib_id_add" value="<?php echo $lib_id; ?>">
        <input type="hidden" name="floor_id_add" value="<?php echo $floor_id; ?>">
        <input type="hidden" name="room_id_add" value="<?php echo $room_id; ?>">
        <input type="hidden" name="rack_id_add" value="<?php echo $rack_id; ?>">
	</fieldset>
</form>
<?php } ?>

<?php } ?>