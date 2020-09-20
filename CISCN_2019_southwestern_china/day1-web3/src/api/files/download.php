<?php
include_once '../config/database.php';
include_once '../objects/file.php';

$database = new Database();
$db = $database->getConnection();
$file = new File($db);
$result = $file->download($_GET['id']);
return $result;
?>
