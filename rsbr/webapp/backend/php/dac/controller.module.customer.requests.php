<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.requests.customer.php';

if(isset($_GET["action"])){
 if($_GET["action"]=='ADD_CUSTOMER_REQUESTS'){
    $account_Id = $_GET["account_Id"];
    $application = $_GET["application"];
    $recordTitle = $_GET["recordTitle"];
    $recordDesc = $_GET["recordDesc"];
    $picture1 = $_GET["picture1"];
    $picture2 = $_GET["picture2"];
    $picture3 = $_GET["picture3"];
    $isCertify = $_GET["isCertify"];
    $certifyTitle = $_GET["certifyTitle"];
    $certifyDesc = $_GET["certifyDesc"];
    $displayRecords = $_GET["displayRecords"];
    $status = $_GET["status"];
    $customerRequests = new CustomerRequests();
    $query = $customerRequests->query_add_customerRequests($account_Id, $application, $recordTitle, $recordDesc, $picture1,
	$picture2, $picture3, $isCertify, $certifyTitle, $certifyDesc, $displayRecords, $status);
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    echo $database->addupdateData($query);
 } else if($_GET["action"]=='UPDATE_CUSTOMER_REQUESTS'){
    $request_Id = ''; if(isset($request_Id)){ $request_Id = $_GET["request_Id"]; }
	$account_Id = ''; if(isset($account_Id)){ $account_Id = $_GET["account_Id"]; }
	$application = ''; if(isset($application)){ $application = $_GET["application"]; }
	$recordTitle = ''; if(isset($recordTitle)){ $recordTitle = $_GET["recordTitle"]; }
	$recordDesc = ''; if(isset($recordDesc)){ $recordDesc = $_GET["recordDesc"]; }
	$picture1 = ''; if(isset($picture1)){ $picture1 = $_GET["picture1"]; }
	$picture2 = ''; if(isset($picture2)){ $picture2 = $_GET["picture2"]; }
	$picture3 = ''; if(isset($picture3)){ $picture3 = $_GET["picture3"]; }
	$isCertify = ''; if(isset($isCertify)){ $isCertify = $_GET["isCertify"]; }
	$certifyTitle = ''; if(isset($certifyTitle)){ $certifyTitle = $_GET["certifyTitle"]; }
	$certifyDesc = ''; if(isset($certifyDesc)){ $certifyDesc = $_GET["certifyDesc"]; }
	$displayRecords = ''; if(isset($displayRecords)){ $displayRecords = $_GET["displayRecords"]; }
	$status = ''; if(isset($status)){ $status = $_GET["status"]; }
    $customerRequests = new CustomerRequests();
	$query = $customerRequests->query_update_customerRequests($request_Id, $account_Id, $application, 
	$recordTitle, $recordDesc, $picture1, $picture2, $picture3, $isCertify, $certifyTitle, $certifyDesc, 
	$displayRecords,$status);
	$database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    echo $database->addupdateData($query);
 } else if($_GET["action"]=='VIEW_CUSTOMER_DISPLAY_RECORDS'){
   $customerRequests = new CustomerRequests();
   $query = $customerRequests->query_view_displayRecords();
   $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
   echo $database->getJSONData($query);
 }
} else {
 echo 'MISSING_ACTION';
}

?>