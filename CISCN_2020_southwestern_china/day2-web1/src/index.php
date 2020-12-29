<?php
error_reporting(0);
highlight_file(__FILE__);
header("Content-Type: text/html;charset=utf-8");
$id = $_GET['id'];
include "conn.php";
if(preg_match('/union|select|where|from|and|\.|benchmark|sleep|rlike|binary|like|exists|position|!|left|right|set|strcmp|instr|oct|char|&|substr|chr|ord|hex|ascii|=|`|>|\^|\||#/i',$id))
{
	exit('>_<');
}
else
{
	$id = $id == NULL ? 1 : $id;
	$str = "select * from ar where id=$id";
	$result = mysqli_query($conn,$str);
	$res = mysqli_fetch_row($result);
	echo $res[1];
}
//login.php
?>
