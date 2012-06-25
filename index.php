<?php
header('Content-Type: text/html; charset=UTF-8');  
include('./config/config.inc.php');
include('./functions/debug.php');
include('./functions/'.$config['db']['type'].'.php');
include('./functions/core.php');

//Load language
$language=get_para($db, 'language');
if($language=="") { $language="germani"; }
include('./language/'.$language);

//LOAD PLUGINS
if ($dh = opendir('./plugins/')) {
	$i = 0;
   	while (($file = readdir($dh)) !== false) {
   		if(filetype('./plugins/' . $file) == "file") {
   			include('./plugins/' . $file);
   		} 
   	}
   closedir($dh);
}

//Load component
if(check_component($db, $_GET['com'])) {
	$file="./components/".$_GET['com'].".php";
	if(file_exists($file)) {
		include('./components/'.$_GET['com'].'.php');
	}
	else {
		$template=get_template($db);
		include('./templates/'.$template['dir'].'/error.tpl');
	}
}
else {
	include('./components/news.php');
}

//Load template
$template=get_template($db);
$template_dir="./templates/".$template['dir'];
include($template_dir.'/'.$template['startfile']);

?>