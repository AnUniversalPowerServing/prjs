<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.panel.board.members.php';

if(isset($_GET["action"])){
 if($_GET["action"]=='ADD_PANEL_MEMBERS'){
   $profile_pic = $_GET["profile_pic"]; 
   $name = $_GET["name"];
   $role = $_GET["role"];
   $description = $_GET["description"];
   $bgcss = $_GET["bgcss"];
   $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
   $panelBoardMembers = new PanelBoardMembers();
   $query = $panelBoardMembers->query_add_panelBoardMembers($profile_pic, $name, $role, $description, $bgcss);
   echo $database->addupdateData($query);
 } else if($_GET["action"]=='DELETE_PANEL_MEMBERS'){
    $member_Id = $_GET["member_Id"];
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
	$panelBoardMembers = new PanelBoardMembers();
	$query = $panelBoardMembers->query_delete_panelBoardMembers($member_Id);
    echo $database->deleteData($query);
 } else if($_GET["action"]=='VIEW_PANEL_MEMBERS'){
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
	$panelBoardMembers = new PanelBoardMembers();
	$query = $panelBoardMembers->query_view_panelBoardMembers();
	echo $database->getJSONData($query);
 }
} else {
 echo 'MISSING_ACTION';
}
?>