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
?>