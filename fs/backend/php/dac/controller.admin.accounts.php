<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.admin.accounts.php';
require_once '../util/util.identity.php';

if(isset($_GET["action"])){
  if($_GET["action"]=='addRole'){
  
	 $identity = new Identity();
	 $role_Id = $identity->pk_adminRole();
	 $roleName = $_POST["roleName"];
	 $adminAccounts = new AdminAccounts();
	 $query = $adminAccounts->query_add_adminRole($role_Id,$roleName);
	 $database = new Database($GLOBALS['DB_ECOM_SERVERNAME'],$GLOBALS['DB_ECOM_NAME'],
							 $GLOBALS['DB_ECOM_USER'],$GLOBALS['DB_ECOM_PASSWORD']);
	 echo $database->addupdateData($query);	
	 
  }
  else if($_GET["action"]=='addUser'){
  
     $identity = new Identity();
	 $account_Id =  $identity->pk_adminAccounts();
	 $username = $_POST["username"];
	 $acc_pwd =  md5($_POST["acc_pwd"]);
	 $role_Id = $_POST["role_Id"];
	 $acc_active = $_POST["acc_active"];
	 $adminAccounts = new AdminAccounts();
	 $query = $adminAccounts->query_add_adminAccounts($account_Id, $username, $acc_pwd, $role_Id, $acc_active);
	 $database = new Database($GLOBALS['DB_ECOM_SERVERNAME'],$GLOBALS['DB_ECOM_NAME'],
							 $GLOBALS['DB_ECOM_USER'],$GLOBALS['DB_ECOM_PASSWORD']);
	 echo $database->addupdateData($query);	
	 
  } 
  else if($_GET["action"]=='loginAuth'){
  
     $username = $_POST["username"];
	 $acc_pwd =  md5($_POST["acc_pwd"]);
	 $adminAccounts = new AdminAccounts();
	 $query = $adminAccounts->query_validate_adminLoginAuth($username, $acc_pwd);
	 $database = new Database($GLOBALS['DB_ECOM_SERVERNAME'],$GLOBALS['DB_ECOM_NAME'],
							 $GLOBALS['DB_ECOM_USER'],$GLOBALS['DB_ECOM_PASSWORD']);
	 echo $database->getJSONData($query);
	
  } 
  else if($_GET["action"]=='updateRole'){
  
     $role_Id = ''; if(isset($_POST["role_Id"])){ $role_Id = $_POST["role_Id"]; }
     $roleName = ''; if(isset($_POST["roleName"])){ $roleName = $_POST["roleName"];  }
	 $adminAccounts = new AdminAccounts();
	 $query = $adminAccounts->query_update_adminRole($role_Id,$roleName);
	 $database = new Database($GLOBALS['DB_ECOM_SERVERNAME'],$GLOBALS['DB_ECOM_NAME'],
							 $GLOBALS['DB_ECOM_USER'],$GLOBALS['DB_ECOM_PASSWORD']);
	 echo $database->addupdateData($query);	
	 
  } 
  else if($_GET["action"]=='updateUser'){
     
	 $account_Id = ''; if(isset($_POST["account_Id"])){ $account_Id = $_POST["account_Id"]; }
	 $username = ''; if(isset($_POST["username"])){ $username = $_POST["username"]; }
	 $acc_pwd = ''; if(isset($_POST["acc_pwd"])){ $acc_pwd = md5($_POST["acc_pwd"]); }
	 $role_Id = ''; if(isset($_POST["role_Id"])){ $role_Id = $_POST["role_Id"]; }
	 $acc_active = ''; if(isset($_POST["acc_active"])){ $acc_active = $_POST["acc_active"]; }
	 $adminAccounts = new AdminAccounts();
	 $query = $adminAccounts->query_update_adminAccounts($account_Id, $username, $acc_pwd, $role_Id, $acc_active);
	 $database = new Database($GLOBALS['DB_ECOM_SERVERNAME'],$GLOBALS['DB_ECOM_NAME'],
							 $GLOBALS['DB_ECOM_USER'],$GLOBALS['DB_ECOM_PASSWORD']);
	 echo $database->addupdateData($query);	
	 
  } 
  else {
      echo 'MISSING_ACTION';
  }
} else { echo 'NO_ACTION'; }
?>