<?php
if($_GET["action"]){
 if($_GET["action"]=='SEND_OTPCODE'){
  $otpCode = $_GET["otpcode"];
 }
} else { echo 'MISSING_ACTION'; }

?>