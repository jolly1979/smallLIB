<?php

//Verbindung zur DB herstellen
global $db; 

$db = @new mysqli($config['db']['host'],$config['db']['user'], $config['db']['pw'], $config['db']['database']);
$sql='SET NAMES "utf-8"';
$result = $db->query($sql);
if (mysqli_connect_errno()) {
    die ('Konnte keine Verbindung zur Datenbank aufbauen: '.mysqli_connect_error().'('.mysqli_connect_errno().')');
}

?>