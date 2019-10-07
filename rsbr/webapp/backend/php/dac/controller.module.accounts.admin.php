<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.accounts.admin.php';

if(isset($_GET["action"])){
 if($_GET["action"]=='GET_ACCOUNT_INFO'){
    $username = $_GET["username"];
    $acc_pwd = md5($_GET["acc_pwd"]);
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    $adminAccounts = new AdminAccounts();
    $query = $adminAccounts->query_view_adminAccountById($username,$acc_pwd);
	$dejsonData = $database->getJSONData($query);
	echo $dejsonData;
    $jsonData = json_decode($dejsonData);
	if(count($jsonData)>0){
	  $_SESSION["USER_ACCOUNT_ID"] = $jsonData[0]->{'admin_Id'};
	  $_SESSION["USER_ACCOUNT_NAME"] = $jsonData[0]->{'name'};
	  $_SESSION["USER_ACCOUNT_USERNAME"] = $jsonData[0]->{'username'};
	  $_SESSION["USER_MOBILE_NUMBER"] = $jsonData[0]->{'mobilenumber'};
	  $_SESSION["USER_ACCOUNT_TYPE"]='ADMINISTRATOR';
	}
 } else if($_GET["action"]=='UPDATE_ACCOUNT_INFO'){
    $admin_Id = ''; if(isset($_GET["admin_Id"])){ $admin_Id = $_GET["admin_Id"]; }
	$name = '';  if(isset($_GET["name"])){ $name = $_GET["name"]; }
	$username = '';  if(isset($_GET["username"])){ $username = $_GET["username"]; }
	$mobileNumber = '';  if(isset($_GET["mobileNumber"])){ $mobileNumber = $_GET["mobileNumber"]; }
	$acc_pwd = '';  if(isset($_GET["acc_pwd"])){ $acc_pwd = md5($_GET["acc_pwd"]); }
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    $adminAccounts = new AdminAccounts();
    $query = $adminAccounts->query_update_adminAccounts($admin_Id,$name,$username,$acc_pwd,$mobileNumber);
	echo $database->addupdateData($query); 
	if(isset($_GET["admin_Id"])){ $_SESSION["USER_ACCOUNT_ID"]=$admin_Id; }
	if(isset($_GET["name"])){ $_SESSION["USER_ACCOUNT_NAME"]=$name; }
	$_SESSION["USER_ACCOUNT_TYPE"]='ADMINISTRATOR';
	if(isset($_GET["username"])){ $_SESSION["USER_ACCOUNT_USERNAME"]=$username; }
	if(isset($_GET["mobileNumber"])){ $_SESSION["USER_MOBILE_NUMBER"]=$mobileNumber; }
 } else if($_GET["action"]=='GET_ACCOUNT_INFO_MOBILE'){
    $mobileNumber = $_GET["mobileNumber"];
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    $adminAccounts = new AdminAccounts();
    $query = $adminAccounts->query_view_adminAccountByMobileNumber($mobileNumber);
    echo $database->getJSONData($query);
 }
} else { echo 'MISSING_ACTION'; }
?>