<?php 
	session_start(); 
	if(!isset($_SESSION['login'])){
	   header("Location: login.php");
    	exit();
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CTF Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business_Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<!--start-main-->
          

<!-- banner -->
<div class="banner">
	<div class="container">
		<h2>Welcome to my blog</h2>
		<p>Here, I've got a bunch of practical tips that you might be able to use, but I'm not going to give them to you so easily. You need to find the "keys" named flag</p>
		<a href="#">GET start!</a>
	</div>
</div>
<!-- technology -->
<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
		<div class="tech-no">
			<!-- technology-top -->
			<div class="soci">
				<ul>
					<li><a href="#" class="facebook-1"> </a></li>
					<li><a href="#" class="facebook-1 twitter"> </a></li>
					<li><a href="#" class="facebook-1 chrome"> </a></li>
					<li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
				</ul>
			</div>
			 <div class="tc-ch">
				
					<div class="tch-img">
						<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/1.png" class="img-responsive" alt=""/></a>
					</div>
					<a class="blog blue" href=" javascript:alert('你没有查看详情的权限')">Technology</a>
					<h3><a href=" javascript:alert('你没有查看详情的权限')">Is RSA still safe?？</a></h3>
						<p>Google's latest research: quantum computer cracking 2048-bit RSA encryption in 8 hours, the industry expects higher</p>
						<p>At present, Google’s latest research result is to crack 2048-bit RSA encryption in 8 hours, but from the industry’s response, people’s expectations are significantly higher. From an objective point of view, most organizations that currently require data encryption have already applied 4096-bit RSA encryption. Therefore, there are still obvious time issues in practical applications. However, it is certain that the rapid development speed of quantum computers has made some organizations with high data security requirements feel uneasy. This development of quantum computers will directly promote the upgrading of encryption technology, and more advanced and strict coding methods are constantly being developed. Of trying.</p>
					
						<div class="blog-poast-info">
							<ul>
								<li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
								<li><i class="glyphicon glyphicon-calendar"> </i>15-01-2020</li>
								<li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">2 Comments </a></li>
								<li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">3 favourites </a></li>
								<li><i class="glyphicon glyphicon-eye-open"> </i>9 views</li>
							</ul>
						</div>
			</div>
			<div class="clearfix"></div>
			<!-- technology-top -->
			<!-- technology-top -->
			<div class="soci">
				<ul>
					<li><a href="#" class="facebook-1"> </a></li>
					<li><a href="#" class="facebook-1 twitter"> </a></li>
					<li><a href="#" class="facebook-1 chrome"> </a></li>
					<li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
				</ul>
			</div>
			 <div class="tc-ch">
				
					<div class="tch-img">
						<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/2.jpg" class="img-responsive" alt=""/></a>
					</div>
					<a class="blog pink" href=" javascript:alert('你没有查看详情的权限')">Science</a>
					<h3><a href=" javascript:alert('你没有查看详情的权限')">PHP deserialization vulnerability</a></h3>
						<p>Serialization is the process of converting data that cannot be stored directly into data that can be stored without losing its format</p>
						<p>What does deserialization mean? It literally translates the serialized data into the format that we need.</p>
						<p>When you deserialize a string, which is exactly what PHP does (object instantiation), it converts an array of strings into objects. Deserialization objects allow control of all attributes: public, protected, and private. However, the deserialized object is awakened by __wakeup() and then destroyed by __destruct(), so the code that already exists in these (wakeup, destruct) magic functions will be executed.</p>
					
						<div class="blog-poast-info">
							<ul>
								<li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
								<li><i class="glyphicon glyphicon-calendar"> </i>10-12-2019</li>
								<li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">3 Comments </a></li>
								<li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">3 favourites </a></li>
								<li><i class="glyphicon glyphicon-eye-open"> </i>15 views</li>
							</ul>
						</div>
			</div>
			<!-- technology-top -->
			<!-- technology-top -->
			<div class="soci">
				<ul>
					<li><a href="#" class="facebook-1"> </a></li>
					<li><a href="#" class="facebook-1 twitter"> </a></li>
					<li><a href="#" class="facebook-1 chrome"> </a></li>
					<li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
				</ul>
			</div>
			 <div class="tc-ch">
				
					<div class="tch-img">
						<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/3.jpg" class="img-responsive" alt=""/></a>
					</div>
					<a class="blog gren" href=" javascript:alert('你没有查看详情的权限')">Culture</a>
					<h3><a href=" javascript:alert('你没有查看详情的权限')">Lambda expression</a></h3>
						<p>Lambda expressions are also called anonymous functions.Lambda expressions, also known as closures, are the most important new features that promote the release of Java 8.Lambda allows functions to be used as method parameters (functions are passed into methods as parameters).Using Lambda expressions can make the code more concise and compact.</p>
						<p>A Lambda expression can be understood as a way to concisely express a passable anonymous function: it has no name, but it has a parameter list, function body, return type, and possibly a list of exceptions that can be thrown. Lambda expressions encourage us to adopt the behavioral parameterization style mentioned in the previous chapter, and the end result is that the code becomes clearer and more flexible. For example, using Lambda expressions, you can customize a Comparator object more concisely.</p>
					
						<div class="blog-poast-info">
							<ul>
								<li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
								<li><i class="glyphicon glyphicon-calendar"> </i>30-04-2018</li>
								<li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">4 Comments </a></li>
								<li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">6 favourites </a></li>
								<li><i class="glyphicon glyphicon-eye-open"> </i>7 views</li>
							</ul>
						</div>
			</div>
			<!-- technology-top -->
			<!-- technology-top -->
			<div class="soci">
				<ul>
					<li><a href="#" class="facebook-1"> </a></li>
					<li><a href="#" class="facebook-1 twitter"> </a></li>
					<li><a href="#" class="facebook-1 chrome"> </a></li>
					<li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
				</ul>
			</div>
			 <div class="tc-ch">
					<div class="tch-img">
						<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/4.png" class="img-responsive" alt=""/></a>
					</div>
					<a class="blog orn" href=" javascript:alert('你没有查看详情的权限')">Business</a>
					<h3><a href=" javascript:alert('你没有查看详情的权限')">Dynamic proxy and reflection</a></h3>
						<p>Object oriented senior language should be provided the reflection mechanism, can dynamically obtain information on the class, language or is lack of flexibility, can't do a lot of demand, a reflection of PHP is equivalent to the inside of the iOS runtime method iOS operating system provides a series of methods of C language dynamic class information, process the message forwarding, PHP provides a similar implementation, use and simpler than iOS.</p>
						<p>Using dynamic proxies allows programs to gain arbitrary access to superpowers.</p>
					
						<div class="blog-poast-info">
							<ul>
								<li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
								<li><i class="glyphicon glyphicon-calendar"> </i>30-12-2015</li>
								<li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">1235 Comments </a></li>
								<li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">6542 favourites </a></li>
								<li><i class="glyphicon glyphicon-eye-open"> </i>9865 views</li>
							</ul>
						</div>
			</div>
			<!-- technology-top -->
			<!-- technology-top -->
			<div class="soci">
				<ul>
					<li><a href="#" class="facebook-1"> </a></li>
					<li><a href="#" class="facebook-1 twitter"> </a></li>
					<li><a href="#" class="facebook-1 chrome"> </a></li>
					<li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
					<li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
				</ul>
			</div>
			 <div class="tc-ch">
				
					<div class="tch-img">
						<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/5.jpg" class="img-responsive" alt=""/></a>
					</div>
					<a class="blog blue" href=" javascript:alert('你没有查看详情的权限')">Technology</a>
					<h3><a href=" javascript:alert('你没有查看详情的权限')">Apache- Directory traversal vulnerability</a></h3>
						<p>The principle of directory traversal vulnerability is relatively simple, that is, the program does not fully filter the user input on the implementation..A directory jump character such as /, which allows a malicious user to traverse any file on the server by submitting a directory jump.Here the directory jump can be../, but also../ is an ASCII encoding or Unicode encoding etc..</p>
						
					
						<div class="blog-poast-info">
							<ul>
								<li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
								<li><i class="glyphicon glyphicon-calendar"> </i>30-12-2015</li>
								<li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">2365 Comments </a></li>
								<li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">4562 favourites </a></li>
								<li><i class="glyphicon glyphicon-eye-open"> </i>5632 views</li>
							</ul>
						</div>
			</div>
			<!-- technology-top -->
			</div>
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right">
				<div class="blo-top">
					<div class="tech-btm">
					<img src="images/banner1.jpg" class="img-responsive" alt=""/>
					</div>
				</div>
				<div class="blo-top">
					<div class="tech-btm">
					<h4>Sign up to our newsletter</h4>
					<p>Pellentesque dui, non felis. Maecenas male</p>
						<div class="name">
							<form>
								<input type="text" placeholder="Email" required="">
							</form>
						</div>	
						<div class="button">
							<form>
								<input type="submit" value="Subscribe">
							</form>
						</div>
							<div class="clearfix"> </div>
					</div>
				</div>
				<div class="blo-top1">
					<div class="tech-btm">
					<h4>some more information </h4>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/6.jpg" class="img-responsive" alt=""/></a>
							</div>
							<div class="blog-grid-right">
								
								<h5><a href=" javascript:alert('你没有查看详情的权限')">Use the referer field to forge the source</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/7.jpg" class="img-responsive" alt=""/></a>
							</div>
							<div class="blog-grid-right">
								
								<h5><a href=" javascript:alert('你没有查看详情的权限')">File inclusion and reading</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/11.jpg" class="img-responsive" alt=""/></a>
							</div>
							<div class="blog-grid-right">
								
								<h5><a href=" javascript:alert('你没有查看详情的权限')">Excuting an order</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/9.jpg" class="img-responsive" alt=""/></a>
							</div>
							<div class="blog-grid-right">
								
								<h5><a href=" javascript:alert('你没有查看详情的权限')">Error control operator</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href=" javascript:alert('你没有查看详情的权限')"><img src="images/10.jpg" class="img-responsive" alt=""/></a>
							</div>
							<div class="blog-grid-right">
								
								<h5><a href=" javascript:alert('你没有查看详情的权限')">Looseness of built-in functions</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>
<!-- technology -->
<!-- footer --><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-left">
				<h6>THIS LOOKS GREAT</h6>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt consectetur adipisicing elit,</p>
			</div>
			<div class="col-md-4 footer-middle">
			<h4>Twitter Feed</h4>
			<div class="mid-btm">
				<p>Consectetur adipisicing</p>
				<p>Sed do eiusmod tempor</p>
				
			</div>
			
				<p>Consectetur adipisicing</p>
				<p>Sed do eiusmod tempor</p>
			
		
			</div>
			<div class="col-md-4 footer-right">
				<h4>Quick Links</h4>
				<li><a href="#">Eiusmod tempor</a></li>
				<li><a href="#">Consectetur </a></li>
				<li><a href="#">Adipisicing elit</a></li>
				<li><a href="#">Eiusmod tempor</a></li>
				<li><a href="#">Consectetur </a></li>
				<li><a href="#">Adipisicing elit</a></li>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!-- footer -->


	

</body>
</html>