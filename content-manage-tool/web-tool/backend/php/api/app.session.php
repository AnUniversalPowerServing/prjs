<?php
session_start();
if(isset($_POST["action"])){
 if($_POST["action"]=='SET_SESSION'){
  foreach($_POST["sessionJson"] as $x => $x_value) {
	$_SESSION[$x]=$x_value;
  }
 } else if($_POST["action"]=='GET_SESSION'){
  $sessionList = array();
  $json = $_POST["sessionJson"];
  for($x = 0;$x < count($json);$x++) {
    $sessionList[$json[$x]] = $_SESSION[$json[$x]];
  }
  echo json_encode($sessionList);
 } else if($_POST["action"]=='DestroySession') {
   session_destroy();
 }
}
?>