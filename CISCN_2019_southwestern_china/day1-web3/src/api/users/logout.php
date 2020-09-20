<?php
	// make cookie null
        setcookie("auth","",time()-3600,'/');
	header("location: ../../index.html");
	die();
?>
