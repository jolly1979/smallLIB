<?php
if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	
	function checkLockedParameter($parameter) {
	if($parameter == 0) {
		return " readonly";
	}
	else { return null; }
	}
	//CHANGE PARAMETER
	if(isset($_POST['parameter_edit_confirm'])) {
		$parameter_list = getParameterList($db);
		for($i=0;$i<$parameter_list['0']['count'];$i++) {
			$parameter = strip_tags(trim($_POST['parameter___'.$parameter_list[$i]['id']]));
			$parameterinfo = strip_tags(trim($_POST['parameterinfo___'.$parameter_list[$i]['id']]));
			$parametervalue = strip_tags(trim($_POST['parametervalue___'.$parameter_list[$i]['id']]));
			$sql = "UPDATE config SET " .
					"parameter = '".$parameter."', " .
					"info = '".$parameterinfo."', " .
					"value = '".$parametervalue."' WHERE id = ".$parameter_list[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		}
		echo NEWSCATCHANGESAVED;		
		
	}
	//ADD PARAMETER
		if(isset($_POST['parameter_add_confirm'])) {
		$parameter = strip_tags(trim($_POST['parameteradd']));
		$parameterinfo = strip_tags(trim($_POST['parameteraddinfo']));
		$parametervalue = strip_tags(trim($_POST['parameteraddvalue']));
		$parameterdel = strip_tags(trim($_POST['parameteradddel']));
		$sql = "SELECT id FROM config WHERE parameter = '".$parameter."' LIMIT 0,1";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		if($result->num_rows == 0) {		
			$sql = "INSERT INTO config(`parameter`, `info`, `value`, `del`) VALUES ('".$parameter."', '".$parameterinfo."', '".$parametervalue."', '".$parameterdel."')";
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			echo PARAADD.$parameter;	
		}
		else {
			echo PARAADDERROR.$parameter;
		}
	}
	//DEL PARAMETER
	if(isset($_POST['parameter_del_confirm'])) {
		if($_POST['parameter_del']!=0) {
			$sql = "DELETE FROM config WHERE id = '".$_POST['parameter_del']."'";
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			echo PARADELETED;
		}
	}	
$template = get_template($db);
$parameter_list = getParameterList($db);
$include_templatefile = './templates/'.$template['dir'].'/admin_parameter_edit.tpl';
}
?>
