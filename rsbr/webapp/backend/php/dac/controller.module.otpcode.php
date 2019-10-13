<?php
if($_GET["action"]){
 if($_GET["action"]=='SEND_OTPCODE'){
  $msg= $_GET["msg"];
  $mobile=$_GET["mobile"];
  $apiKey="ec4BZP39%2bI295oLjphqBLr0TN8LvFctJoQ25vqDlAac%3d";
  $user="santosh.ampani@gmail.com";
  $pwd="santhu$5";
  $senderId="919491034468";
  $url="http://apps.smslane.com/vendorsms/pushsms.aspx?";
  $url.="apikey=".$apiKey."&user=".$user."&password=".$pwd."&msisdn=".$mobile."&sid=".$senderId."&msg=".$msg."&fl=0";
  echo $url;
  echo file_get_contents($url); 
 } else if($_GET["action"]=='SMS_CREDITS'){
    $credits=file_get_contents("http://apps.smslane.com/vendorsms/CheckBalance.aspx?user=santosh.ampani@gmail.com&password=santhu$5");
	echo str_replace("Success#","",$credits);
 }
} else { echo 'MISSING_ACTION'; }

?>