<?php 
include_once 'api/files/show.php';
include_once 'api/config/jwt.php';
if(!isset($_COOKIE["auth"]) or empty($_COOKIE["auth"]))
	header("Location: ../");
else 
	JWT::verify($_COOKIE["auth"]);
?>
<html>
<head>
	<title>CUCCS samantha</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" href="css/bs.css" />

	<script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="js/lib/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/showIndex.js"></script>
	
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

    <table>
    <thead>
        <th>Filename</th>
        <th>Action</th>
    </thead>
    <tbody>
      <?php foreach ($result as $file){ ?>
        <tr>
          <td><?php echo $file[0]; ?></td>
          <td><a href="uploads/<?php echo $file[0] ?>" download="<?php echo $file[0] ?>">Download</a></td>
        </tr>
      <?php }?>
    </tbody>
    </table>
	
</body>
</html>


