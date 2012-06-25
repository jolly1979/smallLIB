<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo NEWSEDIT_HEADER; ?>
<?php global $newscat_list; ?>
<?php global $news; ?>
<?php global $done; ?>
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
<?php echo $done; ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo NEWSEDIT_SUBHEADER; ?></legend>
		<table border="1" width="100%">		
		<tr><td><?php echo NEWSEDIT_NAME; ?></td><td><input type="text" size="30" value="<?php echo getRealname($db, $news['user_id']); ?>" readonly /><input type="hidden" name="newsedit_name" value="<?php echo $news['user_id']; ?>" /></td></tr>
		<tr><td><?php echo NEWSEDIT_CAT; ?></td><td><select name="newsedit_cat">
		<?php for($i=0;$i<$newscat_list['0']['count'];$i++) { ?>
		<option value="<?php echo $newscat_list[$i]['id']; ?>" <?php if($newscat_list[$i]['id']==$news['cat_id']) { echo "selected='selected'"; } ?> ><?php echo $newscat_list[$i]['name']; ?> (<?php echo $newscat_list[$i]['rolename']; ?>)</option>
		<?php } ?>
		</select></td></tr>
		<tr><td><?php echo NEWSEDIT_TITLE; ?></td><td><input type="text" size="30" name="newsedit_title" maxlength="255" value="<?php echo $news['title']; ?>" /></td></tr>
		</table>
		<textarea name="newsedit_text" rows="15" cols="80" style="width: 100%"><?php echo $news['text']; ?>
		</textarea>
        <input type="submit" name="newsedit_confirm" value="<?php echo NEWSEDIT_CONFIRM; ?>" />
    </fieldset>
</form>

<?php } ?>