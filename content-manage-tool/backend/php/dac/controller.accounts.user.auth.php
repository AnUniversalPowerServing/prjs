<?php session_start();

require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.accounts.user.auth.php';

header('Content-Type: application/json');

if(isset($_GET["action"])){
 if($_GET["action"]=='USER_AUTH_SECURITYQ') {
    $userAccountAuth = new UserAccountAuth();
    $query = $userAccountAuth->query_view_userSecurityQ();
    $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
    echo $database->getJSONData($query);
 } 
}
if(isset($_POST["action"])){
  if($_POST["action"]=='USER_AUTH_ADDNEWACCOUNT') { 
	$wsStatus = array();
    if(isset($_POST["mob_code"]) && isset($_POST["mobile"]) && 
	   isset($_POST["surName"]) && isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["acc_pwd"])&&  
	   isset($_POST["q1"]) && isset($_POST["a1"]) && isset($_POST["q2"]) && isset($_POST["a2"]) &&
	   isset($_POST["q3"]) && isset($_POST["a3"])){
		$mob_code=$_POST["mob_code"];
		$mobile=$_POST["mobile"];
		$mob_val='Y';
		$surName=$_POST["surName"];
		$name=$_POST["name"];
		$gender=$_POST["gender"]; 
		$acc_pwd=md5($_POST["acc_pwd"]);
		$q1=$_POST["q1"]; 
		$a1=$_POST["a1"]; 
		$q2=$_POST["q2"];
		$a2=$_POST["a2"];
		$q3=$_POST["q3"]; 
		$a3=$_POST["a3"];
		$acc_active='Y';
		$userAccountAuth = new UserAccountAuth();
		$query = $userAccountAuth->query_add_userAccounts($mob_code, $mobile, $mob_val, $surName, 
					$name, $gender, $acc_pwd, $q1, $a1, $q2, $a2, $q3, $a3, $acc_active);
		$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		$wsStatus["status"]=$database->addupdateData($query);
	} else {
		$wsStatus["status"]="FAILED";
		$content='Missing ';
		if(!isset($_POST["mob_code"])){ $content.='Mobile Country code,'; }
		if(!isset($_POST["mobile"])){ $content.='Mobile Number,'; }
	    if(!isset($_POST["surName"])){ $content.='Surname,'; }
		if(!isset($_POST["name"])){ $content.='Name,'; }
		if(!isset($_POST["gender"])){ $content.='Gender,'; }
		if(!isset($_POST["acc_pwd"])){ $content.='Account Password,'; } 
	    if(!isset($_POST["q1"])){ $content.='Security Question #1,'; } 
		if(!isset($_POST["a1"])){ $content.='Security Answer #1,';} 
		if(!isset($_POST["q2"])){ $content.='Security Question #2,'; } 
		if(!isset($_POST["a2"])){ $content.='Security Answer #2,'; } 
	    if(!isset($_POST["q3"])){ $content.='Security Question #3,'; } 
		if(!isset($_POST["a3"])){ $content.='Security Answer #3,'; } 
		$content=chop($content,',');
		$wsStatus["description"]=$content;
	}
	echo json_encode($wsStatus);
 }
}
?>