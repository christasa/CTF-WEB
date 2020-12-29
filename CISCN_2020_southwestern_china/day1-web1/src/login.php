<?php 
	session_start(); 
	if(isset($_SESSION['login'])){
	   header("Location: index.php");
    	exit();
	}
	if(isset($_GET['username']) && isset($_GET['passwd'])){
		if($_GET['username']=="admin" && $_GET['passwd']=="123456"){
			$_SESSION['login'] = true;
			header("Location: index.php");
    		exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>CTF博客系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Blog Login Form Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link href="css/loginstyle.css" rel='stylesheet' type='text/css' />

</head>
<body>
<!--start-main-->
<h1>访客登录</h1>
<div class="login-box">
	<div class="camera"> </div>
	<h2>Blog</h2>
	<form method="get" action="login.php">
		<input type="text" name="username" class="text" value="admin" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
		<input type="password" name="passwd" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
		<div class="btn"><input type="submit" value="Continue"></div>
	</form>
		<div class="remember"><p>Not a Member?</p>
		<h4><a href="#">Sign up now<img src="images/arrow.png" /></a></h4>
	</div>
</div>
<script type="application/x-javascript"> 
	addEventListener("load", function() { 
		setTimeout(hideURLbar, 0); }, false); 
	function hideURLbar(){ window.scrollTo(0,1); 
	}
</script>	
</body>
</html>