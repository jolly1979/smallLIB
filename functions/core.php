<?php

/* ******************************************************************** */
/*	Author:			Danny Graupner										*/
/*	Date:			2012-05-05											*/
/*	Description:	Core functions 	- Accessmanagement					*/
/*									- Usermanagement					*/
/*									- Newssystem						*/
/*									- Navigation						*/
/*									- Configuration						*/
/*									- Includes							*/
/* ******************************************************************** */
include('./functions/library_mgt_core.php');
include('./functions/item_mgt_core.php');

function umlaute($string) {
	$inlist		= array('ä','Ä','ü','Ü','ö','Ö', 'ß', '&');
	$outlist	= array('&auml;','&Auml;','&uuml;','&Uuml;','&ouml;','&Ouml;', '&szlig;', '&amp;');
	$string 	= str_replace($inlist,$outlist,$string);
	return $string;
}

function get_template($db) {
	$sql = "SELECT value FROM config WHERE parameter = 'active_template' LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$template = $result->fetch_assoc();
	$sql = "SELECT * FROM templates WHERE id = ".$template['value']." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}		
	return $result->fetch_assoc();
}

function get_para($db, $para) {
	$sql = "SELECT parameter, value FROM config WHERE parameter LIKE '".$para."'";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	while ($row = $result->fetch_assoc()) {
		$head[$row['parameter']]=$row['value'];
	}
	if($result->num_rows==0) { $head[$para]=""; }
	return $head[$para];
}
	
function check_module($db, $module) {
	$i=0;
	$sql="SELECT name FROM modules";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	while ($row = $result->fetch_assoc()) {
		$erg[$i]=$row['name'];
		$i++;
	}
	if(in_array($module,$erg)) {
		return true;
	}
	else {
		return false;
	}
}
	
function load_module ($db, $module) {
	if(check_module($db, $module)) {
		$file="./modules/".$module.".php";
		if(file_exists($file)) {
			include('./modules/'.$module.'.php');
		}
		else {
			$template=get_template($db);
			include('./templates/'.$template['dir'].'/error.tpl');
		}
	}
	else {
		include('./modules/news.php');
	}
	return true;
}

function check_component($db, $com) {
	$i=0;
	$sql="SELECT name FROM components";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	while ($row = $result->fetch_assoc()) {
		$erg[$i]=$row['name'];
		$i++;
	}
	if(in_array($com,$erg)) {
		return true;
	}
	else {
		return false;
	}
}

function load_component ($db, $include_templatefile) {
	include($include_templatefile);
	return true;
}

function getModuleID ($db, $module) {
	$sql = "SELECT id FROM modules WHERE name = '".$module."' LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$id = $result->fetch_assoc();
	return $id['id'];
}

function getComID ($db, $com) {
	$sql = "SELECT id FROM components WHERE name = '".$com."' LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$id = $result->fetch_assoc();
	return $id['id'];
}

function get_navigation ($db, $parent) {
	if($parent < 0) {
		$sql="SELECT * FROM navigation ORDER BY id ASC";
	}
	else {
		$sql="SELECT * FROM navigation WHERE parent = ".$parent." ORDER BY prio ASC";
	}
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$i=0;
	while ($row = $result->fetch_assoc()) {
		$navigation[$i]['id']=$row['id'];
		$navigation[$i]['name']=$row['name'];
		$navigation[$i]['link']=$row['link'];
		$navigation[$i]['prio']=$row['prio'];
		$navigation[$i]['parent']=$row['parent'];
		$navigation[$i]['active']=$row['active'];
		$navigation[$i]['access_id']=$row['access_id'];
		$sql = "SELECT accesslevel FROM access_list WHERE id = '".$row['access_id']."'";
		$subresult = $db->query($sql);
		if (!$subresult) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$access_id = $subresult->fetch_assoc();
		$navigation[$i]['access']=$access_id['accesslevel'];
		$navigation[$i]['com']=ltrim($navigation[$i]['link'], "?com=");
		$i++;
	}
	$navigation['0']['links']=$result->num_rows;
	return $navigation;
}

function getParent($db, $parent) {
	$sql="SELECT * FROM navigation WHERE id = ".$parent;
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$parent=$result->fetch_assoc();
	return $parent; 
	
}

function getUserID($db) {
    if (!is_object($db)) {
        return false;
	}
    if (!($db instanceof MySQLi)) {
        return false;
	}
    if (!isset($_COOKIE['UserID'], $_COOKIE['Password'])) {
        return false;
	}
    $sql = 'SELECT id FROM user WHERE id = ? AND password = ?';
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        return $db->error;
	}
    $stmt->bind_param('is', $_COOKIE['UserID'], $_COOKIE['Password']);
    if (!$stmt->execute()) {
        $str = $stmt->error;
        $stmt->close();
        return $str;
	}
    $stmt->bind_result($UserID);
    if (!$stmt->fetch()) {
        $stmt->close();
        return false;
	}
    $stmt->close();
    return $UserID;
}	

function getRealname($db, $UserID) {
	$sql="SELECT realname FROM user WHERE id = ".$UserID." LIMIT 1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}		
	$realname=$result->fetch_assoc();
	return $realname['realname'];  
}

function getUserInfo($db, $UserID) {
	$sql="SELECT * FROM user WHERE id = ".$UserID." LIMIT 1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}		
	$userinfo=$result->fetch_assoc();
	return $userinfo;  
}

function getUserAccessLevel($db, $UserID) {
	$sql="SELECT
                access_list.accesslevel
            FROM
                access_list
            JOIN
                access_user
            ON
                access_list.id = access_user.access_id
            WHERE
                access_user.user_id = ".$UserID." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		return 1000;
	}
	else {
		$accesslevel=$result->fetch_assoc();
		if($accesslevel['accesslevel'] == null) { $accesslevel['accesslevel']=1000; }
		return $accesslevel['accesslevel'];
	}
}

function getModuleAccessLevel($db, $module) {
	$module = getModuleID($db, $module);
	$sql="SELECT
                access_list.accesslevel
            FROM
                access_list
            JOIN
                access_modules
            ON
                access_list.id = access_modules.access_id
            WHERE
                access_modules.modules_id = ".$module." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		return 1000;
	}
	else {
		$accesslevel=$result->fetch_assoc();
		return $accesslevel['accesslevel'];
	}
}

function getComAccessLevel($db, $com) {
	$com = getComID($db, $com);
	$sql="SELECT
                access_list.accesslevel
            FROM
                access_list
            JOIN
                access_components
            ON
                access_list.id = access_components.access_id
            WHERE
                access_components.com_id = ".$com." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		return 1000;
	}
	else {
		$accesslevel=$result->fetch_assoc();
		return $accesslevel['accesslevel'];
	}
}

function checkAccess($db) {
	if(getUserAccessLevel($db, getUserID($db)) <= getComAccessLevel($db, $_GET['com'])) {
		return true;
	}
	else {
		return false;
	}
}

function getRole($db, $accesslevel) {
	$sql = "SELECT name FROM access_list WHERE accesslevel = ".$accesslevel." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$name = $result->fetch_assoc();
	return $name['name'];
}

function getRoleID($db, $accesslevel) {
	$sql = "SELECT id FROM access_list WHERE accesslevel = ".$accesslevel." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$name = $result->fetch_assoc();
	return $name['id'];
}

function getUserList($db) {
	$sql = "SELECT id, username, realname, email FROM user ORDER BY id ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($user = $result->fetch_assoc()) {
		$userlist[$i]['id']=$user['id'];
		$userlist[$i]['username']=$user['username'];
		$userlist[$i]['realname']=$user['realname'];
		$userlist[$i]['email']=$user['email'];
		$sql = "SELECT access_id FROM access_user WHERE user_id = ".$userlist[$i]['id'];
		$subresult = $db->query($sql);
		if (!$subresult) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$access_id = $subresult->fetch_assoc();
		$userlist[$i]['access_id']=$access_id['access_id'];		
		$i++;
	}
	$userlist[0]['count']=$i;	
	return $userlist;
}

function getAccessLevelList($db) {
	$sql = "SELECT id, name, accesslevel FROM access_list ORDER BY accesslevel ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($access = $result->fetch_assoc()) {
		$access_list[$i]['id']=$access['id'];
		$access_list[$i]['name']=$access['name'];
		$access_list[$i]['accesslevel']=$access['accesslevel'];
		$i++;		
	}
	$access_list[0]['count']=$i;
	return $access_list;
}

function getAccessLevelListbyAccess($db, $access) {
	$sql = "SELECT id, name, accesslevel FROM access_list WHERE accesslevel >= ".$access." ORDER BY accesslevel ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($access = $result->fetch_assoc()) {
		$access_list[$i]['id']=$access['id'];
		$access_list[$i]['name']=$access['name'];
		$access_list[$i]['accesslevel']=$access['accesslevel'];
		$i++;		
	}
	$access_list[0]['count']=$i;
	return $access_list;
}


function getAccessNameList($db) {
	$sql = "SELECT name FROM access_list";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($name = $result->fetch_assoc()) {
		$name_list[$i]=$name['name'];
		$i++;		
	}
	$name_list['count']=$i;
	return $name_list;
}

function getRegisteredLevel($db) {
	$sql = "SELECT id, name, accesslevel FROM access_list ORDER BY accesslevel DESC LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$registered = $result->fetch_assoc();
	return $registered;
}

function getModuleList($db) {
	$sql = "SELECT id, name, info FROM modules ORDER BY name ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($modules = $result->fetch_assoc()) {
		$modules_list[$i]['id']=$modules['id'];
		$modules_list[$i]['name']=$modules['name'];
		$modules_list[$i]['info']=$modules['info'];
		$sql = "SELECT access_id FROM access_modules WHERE modules_id = ".$modules_list[$i]['id'];
		$subresult = $db->query($sql);
		if (!$subresult) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$access_id = $subresult->fetch_assoc();
		$modules_list[$i]['access_id']=$access_id['access_id'];	
		$i++;		
	}
	$modules_list[0]['count']=$i;
	return $modules_list;
}

function getComList($db) {
	$sql = "SELECT id, name, info FROM components ORDER BY name ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($coms = $result->fetch_assoc()) {
		$coms_list[$i]['id']=$coms['id'];
		$coms_list[$i]['name']=$coms['name'];
		$coms_list[$i]['info']=$coms['info'];
		$sql = "SELECT access_id FROM access_components WHERE com_id = ".$coms_list[$i]['id'];
		$subresult = $db->query($sql);
		if (!$subresult) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$access_id = $subresult->fetch_assoc();
		$coms_list[$i]['access_id']=$access_id['access_id'];	
		$i++;		
	}
	$coms_list[0]['count']=$i;
	return $coms_list;
}

function getModuleNameList($db) {
	$sql = "SELECT name FROM modules";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($name = $result->fetch_assoc()) {
		$name_list[$i]=$name['name'];
		$i++;		
	}
	return $name_list;
}

function getComNameList($db) {
	$sql = "SELECT name FROM components";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($name = $result->fetch_assoc()) {
		$name_list[$i]=$name['name'];
		$i++;		
	}
	return $name_list;
}

function getNewscatList($db) {
	$sql = "SELECT id, name, info FROM news_cat ORDER BY name ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($newscat = $result->fetch_assoc()) {
		$newscat_list[$i]['id']=$newscat['id'];
		$newscat_list[$i]['name']=$newscat['name'];
		$newscat_list[$i]['info']=$newscat['info'];
		$sql = "SELECT access_id FROM access_newscat WHERE newscat_id = ".$newscat_list[$i]['id'];
		$subresult = $db->query($sql);
		if (!$subresult) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$access_id = $subresult->fetch_assoc();
		$newscat_list[$i]['access_id']=$access_id['access_id'];	
		$i++;		
	}
	$newscat_list[0]['count']=$i;
	return $newscat_list;
}

function getNewscatListbyAccess($db, $access) {
	$accesslevellist = getAccessLevelListbyAccess($db, $access);
	$ii = 0;
	for($i = 0;$i<$accesslevellist[0]['count'];$i++) {
		$sql = "SELECT newscat_id FROM access_newscat WHERE access_id = ".$accesslevellist[$i]['id'];	
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		while ($newscat = $result->fetch_assoc()) {
			$subsql = "SELECT * FROM news_cat WHERE id = ".$newscat['newscat_id']." LIMIT 0,1";			
			$subresult = $db->query($subsql);
			if (!$subresult) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			while ($newscats = $subresult->fetch_assoc()) {
				$newscat_list[$ii]['id']=$newscats['id'];
				$newscat_list[$ii]['name']=$newscats['name'];
				$newscat_list[$ii]['info']=$newscats['info'];
				$newscat_list[$ii]['access_id']=$accesslevellist[$i]['id'];
				$ii++;
			}
			
		}
	}
	$newscat_list[0]['count']=$ii;
	return $newscat_list;
}

function getParameterList($db) {
	$sql = "SELECT id, parameter, value, info, del FROM config ORDER BY parameter ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($parameter = $result->fetch_assoc()) {
		$parameter_list[$i]['id']=$parameter['id'];
		$parameter_list[$i]['parameter']=$parameter['parameter'];
		$parameter_list[$i]['value']=$parameter['value'];		
		$parameter_list[$i]['info']=$parameter['info'];
		$parameter_list[$i]['del']=$parameter['del'];
		$i++;		
	}
	$parameter_list[0]['count']=$i;
	return $parameter_list;
}

function getNewsList($db) {
	$sql = "SELECT * FROM news LIMIT 0, ".get_para($db, 'news_count');
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($news = $result->fetch_assoc()) {
		$news_list[$i]['id']=$news['id'];
		$news_list[$i]['title']=$news['title'];
		$news_list[$i]['text']=$news['text'];	
		$news_list[$i]['date']=$news['date'];
		$news_list[$i]['user']=getRealname($db, $news['user_id']);			
		$subsql = "SELECT news_cat.* FROM news_cat" .
				" JOIN news_2_cat" .
				" ON news_cat.id = news_2_cat.cat_id" .
				" WHERE news_2_cat.news_id = ".$news_list[$i]['id'];		
		$subresult = $db->query($subsql);
		if (!$subresult) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}
		$cats = $subresult->fetch_assoc();
		$news_list[$i]['cat_name']=$cats['name'];
		$news_list[$i]['cat_id']=$cats['id'];					
		$i++;
	}
	$news_list[0]['count'] = $i;
	return $news_list;
}

function getNewsbyID($db, $id) {
	$sql = "SELECT * FROM news WHERE id = ".$id." LIMIT 0,1";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$news = $result->fetch_assoc();
	$sql = "SELECT * FROM news_2_cat WHERE news_id = ".$id;
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$newscat = $result->fetch_assoc();
	$news['cat_id'] = $newscat['cat_id'];
	return $news;
}

function getNewsAccessLevel ($db, $id) {
	$sql = "SELECT access_newscat.access_id FROM access_newscat" .
				" JOIN news_2_cat" .
				" ON access_newscat.newscat_id = news_2_cat.cat_id" .
				" WHERE news_2_cat.news_id = ".$id;
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$access_id = $result->fetch_assoc();
	$sql = "SELECT accesslevel FROM access_list WHERE id = ".$access_id['access_id'];
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$accesslevel = $result->fetch_assoc();
	$access['accesslevel'] = $accesslevel['accesslevel'];
	$sql = "SELECT user_id FROM news WHERE id = ".$id;
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}
	$userid = $result->fetch_assoc();	
	$access['userid'] = $userid['user_id'];
	return $access;
}

function getFilteredbyCatNewsList($db, $cat) {
	if($cat < 0 ) { 
		$cat_list = getNewscatListbyAccess($db, getUserAccessLevel($db, getUserID($db)));
		$ii = 0;
		$where = "news_2_cat.cat_id = ";
		if($cat_list[0]['count'] == 1) {
			$where = $where.$cat_list[0]['id'];
		}
		else {
			$where = $where.$cat_list[0]['id'];
			for($i=1;$i<$cat_list[0]['count'];$i++) {
				$where = $where." OR news_2_cat.cat_id = ".$cat_list[$i]['id'];		
			}			
		}			
		$sql = "SELECT news.* FROM news" .
			" JOIN news_2_cat" .
			" ON news.id = news_2_cat.news_id" .
			" WHERE ".$where." ORDER BY news.id DESC LIMIT 0, ".get_para($db, 'news_count');
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
		
		while ($news = $result->fetch_assoc()) {
			$news_list[$ii]['id']=$news['id'];
			$news_list[$ii]['title']=$news['title'];
			$news_list[$ii]['text']=$news['text'];	
			$news_list[$ii]['date']=$news['date'];
			$news_list[$ii]['user']=getRealname($db, $news['user_id']);			
			$subsql = "SELECT news_cat.* FROM news_cat" .
				" JOIN news_2_cat" .
				" ON news_cat.id = news_2_cat.cat_id" .
				" WHERE news_2_cat.news_id = ".$news_list[$ii]['id'];		
			$subresult = $db->query($subsql);
			if (!$subresult) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			$cats = $subresult->fetch_assoc();
			$news_list[$ii]['cat_name']=$cats['name'];
			$news_list[$ii]['cat_id']=$cats['id'];					
			$ii++;
		}
		$news_list[0]['count'] = $ii;
		return $news_list;
	}
	else {
		$sql = "SELECT news.* FROM news" .
			" JOIN news_2_cat" .
			" ON news.id = news_2_cat.news_id" .
			" WHERE news_2_cat.cat_id = ".$cat." ORDER BY news.id DESC LIMIT 0, ".get_para($db, 'news_count');
		$result = $db->query($sql);
		if (!$result) {
			die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}	
		$i = 0;
		while ($news = $result->fetch_assoc()) {
			$news_list[$i]['id']=$news['id'];
			$news_list[$i]['title']=$news['title'];
			$news_list[$i]['text']=$news['text'];	
			$news_list[$i]['date']=$news['date'];
			$news_list[$i]['user']=getRealname($db, $news['user_id']);			
			$subsql = "SELECT news_cat.* FROM news_cat" .
				" JOIN news_2_cat" .
				" ON news_cat.id = news_2_cat.cat_id" .
				" WHERE news_2_cat.news_id = ".$news_list[$i]['id'];		
			$subresult = $db->query($subsql);
			if (!$subresult) {
				die ('Etwas stimmte mit dem Query nicht: '.$db->error);
			}
			$cats = $subresult->fetch_assoc();
			$news_list[$i]['cat_name']=$cats['name'];
			$news_list[$i]['cat_id']=$cats['id'];					
			$i++;
		}
		$news_list[0]['count'] = $i;
		return $news_list;
	}		
}

function getCountryList($db) {
	$sql = "SELECT * FROM countries ORDER BY name ASC";
	$result = $db->query($sql);
	if (!$result) {
		die ('Etwas stimmte mit dem Query nicht: '.$db->error);
	}	
	$i=0;
	while ($country = $result->fetch_assoc()) {
		$country_list[$i]['id']=$country['id'];
		$country_list[$i]['name']=$country['name'];
		$country_list[$i]['area_code']=$country['area_code'];
		$country_list[$i]['country_code']=$country['country_code'];
		$i++;		
	}
	$country_list[0]['count'] = $i;
	return $country_list;
}
?>