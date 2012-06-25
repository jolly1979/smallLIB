<ul id="Navigation">

<?php
$navigation = get_navigation($db, 0);
$nav_id=$_GET['nav']; if(!isset($nav_id)) { $nav_id=1; }
$userlevel = getUserAccessLevel($db, getUserID($db));

for($i=0;$i<$navigation[0]['links'];$i++) {
	if($navigation[$i]['active']>0 and $userlevel<=$navigation[$i]['access']) {
		echo "<li><a href='./index.php".htmlspecialchars($navigation[$i]['link'])."&amp;nav=".$navigation[$i]['id']."'>".htmlspecialchars($navigation[$i]['name'])."</a></li>";
		$subnavigation = get_navigation($db, $navigation[$i]['id']);
		if($navigation[0]['links']>0 and $nav_id==$navigation[$i]['id']) {
			echo "<ul>";
			for($ii=0;$ii<$subnavigation[0]['links'];$ii++) {
				if($subnavigation[$ii]['active']>0 and $userlevel<=$subnavigation[$ii]['access']) {
					echo "<li><a href='./index.php".htmlspecialchars($subnavigation[$ii]['link'])."&amp;nav=".$navigation[$i]['id']."'>".htmlspecialchars($subnavigation[$ii]['name'])."</a></li>";					
				}
			}
		echo "</ul>";
		}		
	}
} ?>

</ul>