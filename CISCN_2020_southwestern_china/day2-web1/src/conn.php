<?php
$conn = mysqli_connect("localhost","root","root");
if(!$conn)
{
	echo "can't connect";
}
if(!mysqli_select_db($conn,"ctf"))
{
	echo "failed to select database";
}
?>
