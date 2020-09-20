<?php
    error_reporting(E_ALL | E_STRICT); 
    ini_set("display_errors", "On"); 
    include_once '../config/database.php';
    include_once '../objects/file.php';
    include_once '../config/jwt.php';    

    if(isset($_COOKIE["auth"])){
        $data = JWT::verify($_COOKIE["auth"]);
        if (($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/bmp"))
        {
            if($data["loggedInAs"] == "admin"){
                $database = new Database();
                $db = $database->getConnection();
                $file = new File($db);
                $file->destination = isset($_FILES['file']['name']) ? "../../uploads/".$_FILES['file']['name'] : die();
                $file->filename = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : die();
                $file->file = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name'] : die();
                $file->upload();
                print_r("upload successful");
            }
            else{
                // 普通用户可以做的事...
                print_r("i am cool");
                // }
            }
        }
        else{
            print_r("ohh wrong file");
        }
    }
    

?>
