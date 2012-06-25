<?php
$useraccesslevel = getUserAccessLevel($db, getUserID($db));
$access_list = getAccessLevelListbyAccess($db, $useraccesslevel);
$cat_list = getNewscatListbyAccess($db, $useraccesslevel);


if(isset($_POST['newsfilter_confirm'])) {
	$filter_cat = $_POST['selectbycat'];
	$news_list = getFilteredbyCatNewsList($db, $filter_cat);
}
else {
	$news_list = getFilteredbyCatNewsList($db, -1);
}

function CheckForButtons ($db, $news_id) {
	$accesslevel = getNewsAccessLevel($db, $news_id);
	if((($accesslevel['accesslevel'] >= getUserAccessLevel($db, getUserID($db))) 
		and (getUserAccessLevel($db, getUserID($db)) < 998) 
		and ($accesslevel['userid']==getUserID($db))) 
		or (getUserAccessLevel($db, getUserID($db)) == 0)) {
		$button_add = " <a class='newsedit_button' href='index.php?com=news_edit&nav=".$_GET['nav']."&news_id=".$news_id."'>".NEWSEDITLINK."</a> <a class='newsdel_button' href='index.php?com=news_del&nav=".$_GET['nav']."&news_id=".$news_id."'>".NEWSDELLINK."</a>";
		return $button_add;
	}
	else {
		return "";
	}
}

$template=get_template($db);
$include_templatefile = './templates/'.$template['dir'].'/news.tpl';
?>