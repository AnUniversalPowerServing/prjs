<?php
session_start();
print_r($_POST);
// print_r($_FILES);
$target_dir = "../../../uploads/";
$jsonData = json_decode($_POST["JSON_DATA"]);
$folderName = $jsonData->{'folderName'};
$renameFile = $jsonData->{'renameFile'};

if(!is_dir($target_dir.$folderName)){ mkdir($target_dir.$folderName); }
if(strlen($renameFile)>0){
 $target_file = $target_dir .$folderName.'/'. $renameFile;
} else {
 $target_file = $target_dir .$folderName.'/'. basename($_FILES["uploadpic"]["name"]);
}
if (move_uploaded_file($_FILES["uploadpic"]["tmp_name"], $target_file)) {
 echo $target_file;
} else { echo "";  }


?>