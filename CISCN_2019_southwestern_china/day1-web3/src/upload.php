<?php 
include_once 'api/config/jwt.php';
if(!isset($_COOKIE["auth"]) or empty($_COOKIE["auth"]))
	header("Location: ../");
else 
	JWT::verify($_COOKIE["auth"]);
?>

<html>
<head>
	<title>Samantha</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" media="screen" href="css/bs.css" />
	<script src="js/lib/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/showIndex.js"></script>


	<!-- <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
	<link href="bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

	<script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
	<link href="bootstrap-fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script>
	<script src="bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
	<script src="bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
	<script src="bootstrap-fileinput/js/locales/fr.js" type="text/javascript"></script>
	<script src="bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
	<script src="bootstrap-fileinput/themes/fas/theme.js" type="text/javascript"></script>
	<script src="bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>



</head>
<body>
	<nav class="navbar navbar-expand-sm bg-light navbar-light">
		<ul class="navbar-nav">
			<li id="login" style="display: none;" class="nav-item">
				<a class="nav-link" href="login.html">Login</a>
			</li>
			<li id="register" style="display: none;" class="nav-item">
				<a class="nav-link" href="register.html">Register</a>
			</li>
			<li id="logout" style="display: none;" class="nav-item">
				<a class="nav-link" href="api/users/logout.php">Logout</a>
			</li>
			<li id="upload" style="display: none;" class="nav-item">
				<a class="nav-link" href="upload.php">Upload</a>
			</li>
			<li id="download" style="display: none;" class="nav-item">
				<a class="nav-link" href="download.php">Download</a>
			</li>
		</ul>
	</nav>

	 <form name="file_form" action="api/files/upload.php" method="post" enctype="multipart/form-data">
		<!-- <input type="file" name="file" id="file"><br> -->
		<input id="file" name="file" type="file"><br>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

	<!-- <form enctype="multipart/form-data">
        <div class="file-loading">
            <input id="file-0a" class="file" type="file" multiple data-min-file-count="1" data-theme="fas">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </form>
 -->


</body>
<script>
	$("#file").fileinput({
		theme: 'fas',
		uploadUrl: '#'
	});
	$(document).ready(function () {
		$("#kv-explorer").fileinput({
			'theme': 'explorer-fas',
			'uploadUrl': '#',
			overwriteInitial: false,
			initialPreviewAsData: true,
		});
		var test=document.getElementsByClassName('btn btn-default btn-secondary fileinput-upload fileinput-upload-button');
		test[0].parentNode.removeChild(test[0]);
	});
</script>
</html>


