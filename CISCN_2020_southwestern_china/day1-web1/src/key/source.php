<?php
	class XJNU{
		private function flag(){
			echo $flag;
		}
	}


	if(preg_match("/system|exec|eval|shell_exec|passthru|phpinfo/i" , $_GET['f'])){
		die("do not attack me");
	}
	if(preg_match("/system|exec|eval|shell_exec|passthru|phpinfo/i" , $_GET['c'])){
		die("do not attack me");
	}
	if(preg_match("/XJNU|flag/i" , $_GET['f']) || preg_match("/XJNU|flag/i" , $_GET['c'])){
		die("no way!<br>");
	}
	$new = call_user_func_array($_GET['f'],["", $_GET['b']]);
	eval($_GET['c']);
?>