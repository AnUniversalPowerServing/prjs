<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.accounts.customer.php';

if(isset($_GET["action"])){
  if($_GET["action"]=='CHECK_MOBILENUMBER'){
    $mobileNumber = $_GET["mobileNumber"];
	$database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
	$customerAccounts = new CustomerAccounts();
	$query = $customerAccounts->query_check_mobileNumber($mobileNumber);
	echo $database->getJSONData($query); 
  } else if($_GET["action"]=='ADD_ACCOUNT_INFO'){
    $name = $_GET["name"];
	$mobileNumber = $_GET["mobileNumber"];
	$acc_pwd = md5($_GET["acc_pwd"]);
	$database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    $customerAccounts = new CustomerAccounts();
	$query1 = $customerAccounts->query_add_customerAccounts($name, $mobileNumber, $acc_pwd);
	echo $database->addupdateData($query1); 
	$query2 = $customerAccounts->query_view_customerAccountByMobileNumber($mobileNumber,$acc_pwd);
	$jsonData = $database->getJSONData($query2);
	$deJsonData = json_decode($jsonData);
	if(count($deJsonData)>0){
	   $_SESSION["USER_ACCOUNT_ID"]=$deJsonData[0]->{'account_Id'};
	   $_SESSION["USER_ACCOUNT_NAME"]=$deJsonData[0]->{'name'};
	   $_SESSION["USER_ACCOUNT_TYPE"]='CUSTOMER';
	   $_SESSION["USER_MOBILE_NUMBER"]=$deJsonData[0]->{'mobileNumber'};
	}
  } else if($_GET["action"]=='GET_ACCOUNT_INFO'){
     $mobileNumber = $_GET["mobileNumber"];
	 $acc_pwd = md5($_GET["acc_pwd"]);
	 $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
     $customerAccounts = new CustomerAccounts();
     $query = $customerAccounts->query_view_customerAccountByMobileNumber($mobileNumber,$acc_pwd);
	 $jsonData = $database->getJSONData($query);
	 echo $jsonData;
	 $deJsonData = json_decode($jsonData);
	 if(count($deJsonData)>0){
	   $_SESSION["USER_ACCOUNT_ID"]=$deJsonData[0]->{'account_Id'};
	   $_SESSION["USER_ACCOUNT_NAME"]=$deJsonData[0]->{'name'};
	   $_SESSION["USER_ACCOUNT_TYPE"]='CUSTOMER';
	   $_SESSION["USER_MOBILE_NUMBER"]=$deJsonData[0]->{'mobileNumber'};
	 }
  } else if($_GET["action"]=='UPDATE_ACCOUNT_INFO'){
     $account_Id = $_GET["account_Id"]; 
	 $name = ''; if(isset($_GET["name"])){ $name = $_GET["name"]; }
	 $mobileNumber = ''; if(isset($_GET["mobileNumber"])){ $mobileNumber = $_GET["mobileNumber"]; }
	 $acc_pwd = ''; if(isset($_GET["acc_pwd"])){ $acc_pwd = md5($_GET["acc_pwd"]); }
	 $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
     $customerAccounts = new CustomerAccounts();
     $query = $customerAccounts->query_update_customerAccounts($account_Id,$name,$mobileNumber,$acc_pwd);
	 echo $database->addupdateData($query); 
	 if(strlen($name)>0){ $_SESSION["USER_ACCOUNT_NAME"]=$name; }
	 if(strlen($mobileNumber)>0){ $_SESSION["USER_MOBILE_NUMBER"]=$mobileNumber; }
  } else if($_GET["action"]=='UPDATE_ACCOUNT_AND_LOGIN'){
	 $name = ''; if(isset($_GET["name"])){ $name = $_GET["name"]; }
	 $mobileNumber = ''; if(isset($_GET["mobileNumber"])){ $mobileNumber = $_GET["mobileNumber"]; }
	 $acc_pwd = ''; if(isset($_GET["acc_pwd"])){ $acc_pwd = md5($_GET["acc_pwd"]); }
	 $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
     $customerAccounts = new CustomerAccounts();
     $query1 = $customerAccounts->query_update_customerAccountsByMobile($name,$mobileNumber,$acc_pwd);
	 $database->addupdateData($query1); 
	 $query2 = $customerAccounts->query_view_customerAccountByMobileNumberInfo($mobileNumber);
	 $jsonData = $database->getJSONData($query2);
	 echo $jsonData;
	 $deJsonData = json_decode($jsonData);
	 if(count($deJsonData)>0){
	   $_SESSION["USER_ACCOUNT_ID"]=$deJsonData[0]->{'account_Id'};
	   $_SESSION["USER_ACCOUNT_NAME"]=$deJsonData[0]->{'name'};
	   $_SESSION["USER_ACCOUNT_TYPE"]='CUSTOMER';
	   $_SESSION["USER_MOBILE_NUMBER"]=$deJsonData[0]->{'mobileNumber'};
	 }
  }
} else { echo 'MISSING_ACTION'; }

?>