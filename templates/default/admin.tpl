<fieldset>
	<legend><?php echo ADMINSTART_HEADER; ?></legend>
	<?php echo ADMINSTART_PANEL; ?>
	<ul id="Navigation">
	<?php
	$navigation = get_navigation($db, 4);
	for($i=0;$i<$navigation[0]['links'];$i++) {
		if($navigation[$i]['active']>0) {
			echo "<li><a href='./index.php".$navigation[$i]['link']."&nav=4'>".$navigation[$i]['name']."</a></li>";
		}	
	} ?>
	</ul>
</fieldset>