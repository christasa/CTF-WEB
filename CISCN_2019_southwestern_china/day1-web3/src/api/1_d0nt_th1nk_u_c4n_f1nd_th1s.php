<?php
if(isset($_GET['flag'])){
  if(strcmp(hash("sha256", trim(file_get_contents("/flag"))), $_GET['flag']) == 0 )
    echo "success";
  else
    echo "error";
}
else{
  echo "error";
}
 ?>
