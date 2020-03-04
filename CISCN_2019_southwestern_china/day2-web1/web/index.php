<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">

<link rel="stylesheet" type="text/css" href="static/H-ui.css">

<style type="text/css">
.ui-sortable .panel-header{ cursor:move}
</style>
<title>文件签名查询系统</title>
</head>
<body ontouchstart="">
<div class="text-c">
		<img src="static/img.png" style="width: 80%;padding-top: 50px">
	</div>

	<div class="text-c">
		<img src="static/logo.png" style="width: 50%;padding-top: 50px">
	</div>
		<div class="text-c" style="height: 200px">
			<form method="POST">
			<p><input type="text" class="input-text ac_input" style="width:50%;height: 50px" placeholder="请输入需要校验的文件名(例如:ios.rar)" name="path">
			<input type="submit" class="btn btn-success" style="width:100px;height: 50px" value="提交">
			<div class="text-c" style="font-size:35px;color:#5eb95e">
		  <?php
		error_reporting(0);  
      	$file_name = $_POST["path"];
       if(preg_match("/flag/",$file_name)){
           die("请不要输入奇奇怪怪的字符！");
       }
       
       	if(is_array($file_name)){
		$file_name=implode($file_name);
	}
     
      	
      	if(!preg_match("/^[a-zA-Z0-9-s_]+.rar$/m", trim($file_name))) {      	    
        	echo "请输入正确的文件名";
      	}
      	else {
       	echo( exec("/usr/bin/md5sum " . $file_name));
      	}
			?>
	</div>
	</form></div>
	


<footer class="footer mt-20" style="margin-top: 1%">
	<div class="container-fluid">
		<nav> <a href="#" target="_blank">关于我们</a> <span class="pipe">|</span> <a href="#" target="_blank">联系我们</a> <span class="pipe">|</span> <a href="#" target="_blank">法律声明</a> </nav>
		<p>Copyright ©2019 ciscn All Rights Reserved. <br>
			
		</p>
	</div>
</footer>

</body></html>


