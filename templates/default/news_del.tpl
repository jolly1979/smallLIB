<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo NEWSDEL_HEADER; ?>
<?php global $news; ?>
<?php global $del_confirmed; ?>

<?php if($del_confirmed) { ?>

	<?php echo DELCONFIRMED; ?>	

	<?php } ?>
<?php if(!$del_confirmed) { ?>
	<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	    <fieldset>
   	    <legend><?php echo NEWSDEL_SUBHEADER; ?></legend>	
		<h1 class="start_news_header"><?php echo $news['title'] ?></h1>
		<div class="news_contentbox"><?php echo $news['text'] ?></div>
		<input type="hidden" name="newsdel" value="<?php echo $news['id']; ?>" />
  	    <input type="submit" name="newsdel_confirm" value="<?php echo NEWSDEL_CONFIRM; ?>" />
   	 	</fieldset>
	</form>
	<?php } ?>
<?php } ?>