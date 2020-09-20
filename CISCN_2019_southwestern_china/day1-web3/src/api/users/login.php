<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
include_once '../config/jwt.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

 
// prepare user object
$user = new User($db);

// set ID property of user to be edited
$user->username = isset($_POST['username']) ? $_POST['username'] : die();
$user->password = isset($_POST['password']) ? $_POST['password'] : die();

// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // create array
    $user_arr=array(
        "iss" => "samatha",
        "id" => $row['id'],
        "loggedInAs" => $row['username'],
	"iat" => time()
    );


    // jwt auth
    setcookie("auth",jwt::sign($user_arr),time() + 3600,'/');
    echo "0";
//    header("Location:/index.html");
}
else{
    echo "1";
}

?>
