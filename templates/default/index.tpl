<!DOCTYPE HTML PUBLIC "-//W3CDTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo get_para($db,'head_title'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo $template_dir; ?>/default.css">
</head>
<body>
<div id="Seite">
	<h1><?php echo htmlspecialchars(get_para($db,'head_title')); ?></h1>
	<div id="menu_left">
	<?php load_module($db, 'navigation'); ?>
	<hr />
	<?php load_module($db, 'login'); ?>
	</div>
	<div id="Inhalt">
	<?php load_component($db, $include_templatefile); ?>
	</div>
	<p id="Fusszeile"><?php echo get_para($db,'footer'); ?></p>

</div>
</body>
</html>