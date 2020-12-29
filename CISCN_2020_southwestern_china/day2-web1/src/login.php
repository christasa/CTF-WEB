<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Hacker</title>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
  </head>
  <body>
    <form action="" method="post">
      Username：
      <input type="text" name="username" /> <br />
      Password ：  
      <input type="password" name="password" />
      <input type="submit" name="submit" value="Login" />
    </form>
  </body>
</html>
<?php
error_reporting(0);
if($_POST['username'] === "admin" && $_POST['password'] === "0w0_good_j0b_smart_hacker") {
  echo file_get_contents("/flag.txt");
}
?>
