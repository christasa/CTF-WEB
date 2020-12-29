<!DOCTYPE html>
<html>
	<head>
		<title>
			SimpleCalculator
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
			text: ["来算算数学题呀~", "支持三角函数", "支持四则运算", "支持对数运算", "支持模运算", "支持圆周率","支持各种数学函数","丰富的PHP运算函数供您选择"]
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
			$content="1+1";
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
							<label><h2>计算结果 : ";
		
		if (strlen($content) >= 80) {
			die("你的输入也太长了吧= =");
		}
		$specialchars = [' ', '\t', '\r', '\n','\'', '"', '`'];
		foreach ($specialchars as $cc) {
			if (preg_match('/' . $cc . '/m', $content)) {
				die("想啥呢= =输这种奇奇怪怪的字符");
			}
		}
		
		$whitelist = [ 'is_finite','deg2rad', 'mt_getrandmax','is_infinite','log10'  ];  
		$whitelist1=['pi', 'pow', 'rad2deg', 'rand', 'round', 'sin', 'sinh', 'sqrt', 'srand', 'cos', 'cosh', 'decbin' , 'tan', 'tanh'];
		$whitelist = array_merge($whitelist, $whitelist1);
		$whitelist1 =['expm1', 'floor', 'fmod',  'acosh', 'getrandmax', 'asin', 'asinh', 'decoct',  'atan2', 'atan', 'atanh'];
		$whitelist = array_merge($whitelist, $whitelist1);
		$whitelist1 =['lcg_value', 'min', 'acos','log1p', 'log', 'max', 'is_nan', 'mt_srand', 'octdec'];
		$whitelist = array_merge($whitelist, $whitelist1);
		$whitelist1= ['bindec', 'ceil',  'hexdec', 'hypot','mt_rand','exp'];
		$whitelist = array_merge($whitelist, $whitelist1);
		preg_match_all('/[a-zA-Z_][a-zA-Z_0-9]*/', $content, $extractfunc);
		
		foreach ($extractfunc[0] as $ee) {
			if (!in_array($ee, $whitelist)) {
				
				die("想啥呢= = $ee 这个数学函数不支持");
			}
		}

		$output=eval('echo '.$content.';');;
		$smarty->display("string:".($output));
		echo "				</h2></label>
						</div>		
					</div>
					</div>
					<div class=\"col-md-4\">	
					</div>
					</div>
				</div>";
	?>

	</body>
</html>

