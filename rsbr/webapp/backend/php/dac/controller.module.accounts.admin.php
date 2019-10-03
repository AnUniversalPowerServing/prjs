<?php
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
    echo $database->getJSONData($query);
 } else if($_GET["action"]=='UPDATE_ACCOUNT_INFO'){
    $account_Id = ''; if(isset($_GET["account_Id"])){ $account_Id = $_GET["account_Id"]; }
	$name = '';  if(isset($_GET["name"])){ $name = $_GET["name"]; }
	$mobileNumber = '';  if(isset($_GET["mobileNumber"])){ $mobileNumber = $_GET["mobileNumber"]; }
	$acc_pwd = '';  if(isset($_GET["acc_pwd"])){ $acc_pwd = md5($_GET["acc_pwd"]); }
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    $adminAccounts = new AdminAccounts();
    $query = $adminAccounts->query_update_customerAccounts($account_Id,$name,$mobileNumber,$acc_pwd);
	echo $database->addupdateData($query); 
 }
} else { echo 'MISSING_ACTION'; }
?>