<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", "On");
include_once 'api/config/database.php';
include_once 'api/objects/file.php';
#echo 'hello from show.php';
$database = new Database();
$db = $database->getConnection();
$file = new File($db);
$result= $file->read();
?>
