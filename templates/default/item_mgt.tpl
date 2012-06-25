<fieldset>
	<legend><?php echo LIBMGTSTART_HEADER; ?></legend>
	<?php echo LIBMGTSTART_PANEL; ?>
	<ul id="Navigation">
	<?php
	$navigation = get_navigation($db, 20);
	for($i=0;$i<$navigation[0]['links'];$i++) {
		if($navigation[$i]['active']>0) {
			echo "<li><a href='./index.php".$navigation[$i]['link']."&nav=20'>".$navigation[$i]['name']."</a></li>";
		}	
	} ?>
	</ul>
</fieldset>