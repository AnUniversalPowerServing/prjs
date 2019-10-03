<?php
session_start();
// print_r($_POST);
// print_r($_FILES);
$target_dir = "../../../uploads/";
$user_Id=$_POST["FOLDER_NAME"];
if(!is_dir($target_dir.$user_Id)){ mkdir($target_dir.$user_Id); }
$target_file = $target_dir .$user_Id.'/'. basename($_FILES["uploadpic"]["name"]);
if (move_uploaded_file($_FILES["uploadpic"]["tmp_name"], $target_file)) {
 echo basename( $_FILES["uploadpic"]["name"]);
} else { echo "";  }

?>