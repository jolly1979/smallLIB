<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {

	$template=get_template($db);
	if(isset($_GET['com']) and $_GET['com']!="item_mgt") {
		$include_templatefile = './components/'.$_GET['com'].'.php';
	}
	else {
		$include_templatefile = './templates/'.$template['dir'].'/item_mgt.tpl';
	}
}
?>