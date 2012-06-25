<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	$template=get_template($db);
	if(isset($_GET['com']) and $_GET['com']!="admin") {
		$include_templatefile = './components/'.$_GET['com'].'.php';
	}
	else {
		$include_templatefile = './templates/'.$template['dir'].'/admin.tpl';
	}
	
}
?>