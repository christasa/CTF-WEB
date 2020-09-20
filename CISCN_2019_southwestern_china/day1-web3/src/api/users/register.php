<?php 
   // get database connection
   include_once '../config/database.php';
 
   // instantiate user object
   include_once '../objects/user.php';

   include_once '../config/jwt.php';


   $database = new Database();
   $db = $database->getConnection();
 
   $user = new User($db);

 
   // set user property values
   $user->username = $_POST['username'];
   $user->password = $_POST['password'];
   $user->password_again = $_POST['password_again'];

   if ($user->password !== $user->password_again)
   {
	echo "Inconsistent passwords entered two times";
   } 
   $user->created = date('Y-m-d H:i:s');
   
   // create the user
   if($user->signup()){
       $user_arr=array(
           "iss" => "samatha",
           "id" => $user->id,
           "loggedInAs" => $user->username,
           "iat" => time()
       );
       setcookie("auth",jwt::sign($user_arr),time() + 3600,'/');
       echo "0";
   }
   else{
       echo "1";
   }
    
?>
