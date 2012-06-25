<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo NEWSINSERT_HEADER; ?>
<?php global $newscat_list; ?>
<?php global $insert_confirmed; ?>

<?php if($insert_confirmed) { ?>

	<?php echo NEWSINSERT_DONE; ?>	

	<?php } ?>
<?php if(!$insert_confirmed) { ?>

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

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo NEWSINSERT_SUBHEADER; ?></legend>
		<table border="1" width="100%">		
		<tr><td><?php echo NEWSINSERT_NAME; ?></td><td><input type="text" size="30" value="<?php echo getRealname($db, getUserID($db)); ?>" readonly /><input type="hidden" name="newsinsert_name" value="<?php echo getUserID($db); ?>" /></td></tr>
		<tr><td><?php echo NEWSINSERT_CAT; ?></td><td><select name="newsinsert_cat">
		<?php for($i=0;$i<$newscat_list['0']['count'];$i++) { ?>
		<option value="<?php echo $newscat_list[$i]['id']; ?>"><?php echo $newscat_list[$i]['name']; ?> (<?php echo $newscat_list[$i]['rolename']; ?>)</option>
		<?php } ?>
		</select></td></tr>
		<tr><td><?php echo NEWSINSERT_TITLE; ?></td><td><input type="text" size="30" name="newsinsert_title" maxlength="255" /></td></tr>
		</table>
		<textarea name="newsinsert_text" rows="15" cols="80" style="width: 100%">
		</textarea>
        <input type="submit" name="insertnews_confirm" value="<?php echo NEWSINSERT_CONFIRM; ?>" />
    </fieldset>
</form><?php } ?>

<?php } ?>