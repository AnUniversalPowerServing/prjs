<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.requests.customer.php';

if(isset($_POST["action"])){
 if($_POST["action"]=='ADD_CUSTOMER_REQUESTS'){
    $account_Id = $_POST["account_Id"];
    $application = ''; if(isset($_POST["application"])){ $application = $_POST["application"]; }
	$recordTitle = ''; if(isset($_POST["recordTitle"])){ $recordTitle = $_POST["recordTitle"]; }
	$recordDesc = ''; if(isset($_POST["recordDesc"])){ $recordDesc = $_POST["recordDesc"]; }
	$picture1 = ''; if(isset($_POST["picture1"])){ $picture1 = $_POST["picture1"]; }
	$picture2 = ''; if(isset($_POST["picture2"])){ $picture2 = $_POST["picture2"]; }
	$picture3 = ''; if(isset($_POST["picture3"])){ $picture3 = $_POST["picture3"]; }
	$isCertify = ''; if(isset($_POST["isCertify"])){ $isCertify = $_POST["isCertify"]; }
	$certifyTitle = ''; if(isset($_POST["certifyTitle"])){ $certifyTitle = $_POST["certifyTitle"]; }
	$certifyDesc = ''; if(isset($_POST["certifyDesc"])){ $certifyDesc = $_POST["certifyDesc"]; }
	$displayRecords = ''; if(isset($_POST["displayRecords"])){ $displayRecords = $_POST["displayRecords"]; }
	$status = 'UPLOADED';
	$comment = ''; if(isset($_POST["comment"])){ $comment = $_POST["comment"]; }
    $customerRequests = new CustomerRequests();
    $query = $customerRequests->query_add_customerRequests($account_Id, $application, $recordTitle, $recordDesc, $picture1,
	$picture2, $picture3, $isCertify, $certifyTitle, $certifyDesc, $displayRecords, $status, $comment);
	echo $query;
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    echo $database->addupdateData($query);
 } else if($_POST["action"]=='UPDATE_CUSTOMER_REQUESTS'){
    $request_Id = ''; if(isset($_POST["request_Id"])){ $request_Id = $_POST["request_Id"]; }
	$account_Id = ''; if(isset($_POST["account_Id"])){ $account_Id = $_POST["account_Id"]; }
	$application = ''; if(isset($_POST["application"])){ $application = $_POST["application"]; }
	$recordTitle = ''; if(isset($_POST["recordTitle"])){ $recordTitle = $_POST["recordTitle"]; }
	$recordDesc = ''; if(isset($_POST["recordDesc"])){ $recordDesc = $_POST["recordDesc"]; }
	$picture1 = ''; if(isset($_POST["picture1"])){ $picture1 = $_POST["picture1"]; }
	$picture2 = ''; if(isset($_POST["picture2"])){ $picture2 = $_POST["picture2"]; }
	$picture3 = ''; if(isset($_POST["picture3"])){ $picture3 = $_POST["picture3"]; }
	$isCertify = ''; if(isset($_POST["isCertify"])){ $isCertify = $_POST["isCertify"]; }
	$certifyTitle = ''; if(isset($_POST["certifyTitle"])){ $certifyTitle = $_POST["certifyTitle"]; }
	$certifyDesc = ''; if(isset($_POST["certifyDesc"])){ $certifyDesc = $_POST["certifyDesc"]; }
	$displayRecords = ''; if(isset($_POST["displayRecords"])){ $displayRecords = $_POST["displayRecords"]; }
	$status = ''; if(isset($_POST["status"])){ $status = $_POST["status"]; }
	$comment = ''; if(isset($_POST["comment"])){ $comment = $_POST["comment"]; }
    $customerRequests = new CustomerRequests();
	$query = $customerRequests->query_update_customerRequests($request_Id, $account_Id, $application, 
	$recordTitle, $recordDesc, $picture1, $picture2, $picture3, $isCertify, $certifyTitle, $certifyDesc, 
	$displayRecords, $status, $comment);
	$database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    echo $database->addupdateData($query);
 } else if($_POST["action"]=='VIEW_CUSTOMER_APPLICATIONS'){
    $account_Id = ''; if(isset($_POST["account_Id"])){ $account_Id = $_POST["account_Id"]; }
	$customerRequests = new CustomerRequests();
	$query = $customerRequests->query_view_customerRequests($account_Id);
	$database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    echo $database->getJSONData($query);
 } else if($_POST["action"]=='VIEWALL_CUSTOMER_APPLICATIONS'){
	$customerRequests = new CustomerRequests();
	$query = $customerRequests->query_viewAll_customerRequests();
	$database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    echo $database->getJSONData($query);
 } else if($_POST["action"]=='VIEW_CUSTOMER_DISPLAY_RECORDS'){
   $customerRequests = new CustomerRequests();
   $query = $customerRequests->query_view_displayRecords();
   $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
   echo $database->getJSONData($query);
 } else if($_POST["action"]=='DELETE_CUSTOMER_APPLICATION'){
   $request_Id = $_POST["request_Id"];
   $account_Id = $_POST["account_Id"];
   $application = $_POST["application"];
   $fileArray=explode("/",$application);
   $fileName="../../../uploads/customers/".$account_Id."/".$fileArray[count($fileArray)-1];
   $customerRequests = new CustomerRequests();
   $query = $customerRequests->query_delete_customerRequests($request_Id);
   $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
   echo $database->addupdateData($query);
   if(unlink($fileName)){ echo "SUCCESS"; }
   else { echo "ERROR"; }
 } 
} else {
 echo 'MISSING_ACTION';
}

?>