<!DOCTYPE html>
<html>
	<head>
		<title>
			SimpleBrowser
		</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/shana_flag.css" rel="stylesheet" media="screen">
		<script src="jquery/jquery-3.3.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
        queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file://
        -->
        <!--[if lt IE 9]>
            <script src="http://labfile.oss.aliyuncs.com/html5shiv/3.7.0/html5shiv.js">
            </script>
            <script src="http://labfile.oss.aliyuncs.com/respond.js/1.3.0/respond.min.js">
            </script>
        <![endif]-->
    </head>
	<style type="text/css">
	body{
		
		color: #D5D6E2;
		font-weight: 500;
		font-family: "Microsoft YaHei","宋体","Segoe UI", "Lucida Grande", Helvetica, Arial,sans-serif, FreeSans, Arimo;
	}
	a{ color: rgba(255, 255, 255, 0.6);outline: none;text-decoration: none;-webkit-transition: 0.2s;transition: 0.2s;}
	a:hover,a:focus{color:#74777b;text-decoration: none;}
	.wrapper {
		  height: 60px;
		  width: 460px;
		  border-radius: 4px;
		  box-shadow: 0 2px 2px rgba(0, 0, 0, .15);
		  position: absolute;
		  top: 10%;
		  left: 50%;
		  margin-left: -230px;
		  margin-top: -30px;
		}

		.inputbox {
		  box-sizing: border-box;
		  width: 400px;
		  height: 100%;
		  font-size: 22px;
		  background-color: #FFFFFF;
		  border: 2px solid #E1E8ED;
		  border-right: 0;
		  border-radius: 4px 0 0 4px;
		  padding: 10px;
		  float: left;
		  display: block;
		}

		.submit {
		  height: 100%;
		  width: 60px;
		  float: left;
		  border: 2px solid #E1E8ED;
		  border-left: 0;
		  box-sizing: border-box;
		  background-color: #FFFFFF;

		  border-radius: 0 4px 4px 0;
		  text-indent: -200em;
		  overflow: hidden;
		  display: block;
		  cursor: pointer;

		  background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzNy43NSAzNy43NSI+PHBhdGggZD0iTTQyLjA4LDM3LjYxbC04LjItOC4yLS4xNC0uMTFhMTUuNTMsMTUuNTMsMCwxLDAtNC40NCw0LjQ0cy4wNy4xLjExLjE0bDguMiw4LjJhMy4xNSwzLjE1LDAsMSwwLDQuNDYtNC40NlptLTIxLjMxLTYuN0ExMC4xNCwxMC4xNCwwLDEsMSwzMC45MSwyMC43NywxMC4xNCwxMC4xNCwwLDAsMSwyMC43NywzMC45MVptMCwwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNS4yNSAtNS4yNSkiIHN0eWxlPSJmaWxsOiM1ODU4NTg7ZmlsbC1ydWxlOmV2ZW5vZGQiLz48L3N2Zz4=);
		  -webkit-background-size: 28px auto;
		  background-size: 28px auto;
		  background-repeat: no-repeat;
		  background-position: center center;

		}

		input:focus {
		  outline: none;
		}
</style>
	<body>
	<form class="wrapper">
		<input class="inputbox" type="text" name="search" id="search">
		<input class="submit" type="submit" value="Search">
	</form>

	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="js/placeholderTypewriter.js"></script>
	<script type="text/javascript">
		$('#search').placeholderTypewriter({
			text: ["来输入网址呀！"]
		});
	</script>


    <?php
	error_reporting(0);
    	require_once('header.php');
		require_once('./libs/Smarty.class.php');
		/*
		function filter($content)
		{
			if (strlen($content) >= 80) {
				$smarty->display("string:"."00000000000");
				return 1;
			}
			$blacklist = [' ', '\t', '\r', '\n', '"', '`'];
			foreach ($blacklist as $blackitem) {
				if (preg_match('/' . $blackitem . '/m', $content)) {
					$smarty->display("string:"."111111111111");
					return 1;
				}
			}
			return 0;
		}
		*/

		$smarty = new Smarty();
		if (!empty($_GET['search'])) 
		{
		    $content=$_GET['search'];
		}
		else
			$content="http://www.baidu.com";
		/*
		if(filter($ip))
		{
			$smarty->display("string:"."00000000000");
			die("0000000000000000");
		}
		*/
		
		//$your_ip = $smarty->display("string:".$ip);
		echo "<div class=\"container panel1\">
					<div class=\"row\">
					<div class=\"col-md-4\">	
					</div>
					<div class=\"col-md-4\">
					<div class=\"jumbotron pan\">
						<div class=\"form-group log\">
							<label><h2>访问结果 : ";
		
		$pos = strpos($content,"php");
		if($pos){
				exit("denied");
		}
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,"$content");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch);
		var_dump($result);
	?>

	</body>
</html>
<!-- 5oiR55qEZmxhZ+mDveaUvuWcqOaVsOaNruW6k2N0ZmNvbnRlc3Tph4zvvIzkvaDnlKhhZG1pbui0puaIt+WwseiDveiuv+mXruWIsO+8jOW/q+WOu+aJvuWQp++8gQ== -->

