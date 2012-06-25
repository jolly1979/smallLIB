<?php global $cat_list; ?>
<?php global $news_list; ?>
<?php global $filter_cat; ?>
<?php global $filter_role; ?>
<?php global $useraccesslevel; ?>
<?php global $db; ?>


<div id="start_filter">
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
	<p class="filterbox"><?php echo NEWS_FILTER_CAT; ?><select name="selectbycat">
	<option value="-1"><?php echo NEWS_FILTER_ALL; ?></option>
	<?php for($i=0;$i<$cat_list['0']['count'];$i++) { ?>
	<option value="<?php echo $cat_list[$i]['id']; ?>" <?php if($cat_list[$i]['id']==$filter_cat) { echo "selected='selected'"; } ?>><?php echo $cat_list[$i]['name'] ?></option>
	<?php } ?>
	</select>
	<input type="submit" name="newsfilter_confirm" value="<?php echo FILTER_CONFIRM; ?>" /></p>
</form>
</div>
<div class="start_news">
<?php for($i=0;$i<$news_list['0']['count'];$i++) { ?>
	<h1 class="start_news_header"><?php echo $news_list[$i]['title'] ?></h1>
	<p class="start_news_infobox"><?php echo WRITTEN_BY.$news_list[$i]['user'].WRITTEN_TIME.$news_list[$i]['date']." (".$news_list[$i]['cat_name'].")"; ?><?php echo CheckForButtons($db, $news_list[$i]['id']); ?></p>
	<div class="news_contentbox"><?php echo $news_list[$i]['text'] ?></div>
<?php } ?>
</div>