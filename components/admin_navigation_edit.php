<?php 

function checkLockedAccess($access) {
	if($access == 0 || $access == 999 || $access == 1000) {
		return "readonly";
	}
	else { return null; }
	
}

if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else {
	
function checkActiveNavigation($nav_active) {
	if($nav_active == 1) {
		return "checked='checked'";
	}
	else {
		return null;
	}

	
}
	//NAVIUPDATE - Navigation
	if(isset($_POST['navi_edit_confirm'])) {
		$nav_list = get_navigation($db, -1);
		for($i=0;$i<$nav_list['0']['links'];$i++) {
			$new_name = strip_tags(trim($_POST['name___'.$nav_list[$i]['id']]));
			$new_module = $_POST['module___'.$nav_list[$i]['id']];
			$new_parent = $_POST['parent___'.$nav_list[$i]['id']];
			$new_prio = $_POST['prio___'.$nav_list[$i]['id']];
			if(!preg_match('~^[0-9]{1,3}$~', $new_prio)) {
				echo NAVIEDITUPDATEERROR.$new_name;
			}
			else {
				$sql = "UPDATE navigation SET name = '".$new_name."', link = '?com=".$new_module."', parent = '".$new_parent."', prio = '".$new_prio."' WHERE id =".$nav_list[$i]['id'];
				$result = $db->query($sql);
				if (!$result) {
					die ('Etwas stimmte mit dem Query nicht: '.$db->error);
				}
			}	
		}
		echo NAVIEDITCHANGESAVED;	
	}	

	//NAVIUPDATE - Access
	if(isset($_POST['navi_access_confirm'])) {
		$nav_list = get_navigation($db, -1);
		for($i=0;$i<$nav_list['0']['links'];$i++) {
			$new_role = $_POST['access___'.$nav_list[$i]['id']];
			$new_active = $_POST['active___'.$nav_list[$i]['id']];
			if($new_active == "check_active") {
				$new_active = 1;
			}
			else {
				$new_active = 0;
			}
			$sql = "UPDATE navigation SET access_id = '".$new_role."', active = '".$new_active."' WHERE id =".$nav_list[$i]['id'];
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
		}
		echo NAVIEDITCHANGESAVED;	
	}


	
	//NAVIADD
	if(isset($_POST['navi_add_confirm'])) {
		$new_name =  strip_tags(trim($_POST['naviadd_name']));
		$new_module = $_POST['naviadd_module'];
		$new_parent = $_POST['naviadd_parent'];
		$new_prio = $_POST['naviadd_prio'];
		$new_role = $_POST['naviadd_role'];
		$new_active = $_POST['naviadd_active'];
		if($new_active == "check_active") {
			$new_active = 1;
		}
		else {
			$new_active = 0;
		}
		if(!preg_match('~^[0-9]{1,3}$~', $new_prio)) {
			echo NAVIEDITUPDATEERROR.$new_name;
		}
		else {
			$sql = "INSERT INTO navigation(name, link, parent, prio, access_id, active) VALUES" .
					"('".$new_name."','?com=".$new_module."'," .
					"'".$new_parent."','".$new_prio."'," .
					"'".$new_role."','".$new_active."')";
			$result = $db->query($sql);
			if (!$result) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			echo NAVIADD_SAVED.$new_name;
		}
	}	
	//NAVIDEL
	if(isset($_POST['navi_del_confirm'])) {
		$sql = "DELETE FROM navigation WHERE id = '".$_POST['navi_del']."'";
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		echo NAVIDEL_SAVED;
	}			
	
$template = get_template($db);	
$component_list = getComList($db);
$nav_list = get_navigation($db, 0);
$parents = $nav_list;
$full_nav_list  = get_navigation($db, -1);
$access_list = getAccessLevelList($db);
$include_templatefile = './templates/'.$template['dir'].'/admin_navigation_edit.tpl';
}
?>
