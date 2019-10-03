<?php

class PanelBoardMembers {
 function query_add_panelBoardMembers($profile_pic, $name, $role, $description, $bgcss){
  $sql="INSERT INTO panelboardmembers(profile_pic, name, role, description, bgcss) ";
  $sql.="VALUES ('".$profile_pic."','".$name."','".$role."','".$description."','".$bgcss."');";
  return $sql;
 }
 function query_view_panelBoardMembers(){
  return "SELECT * FROM panelboardmembers";
 }
 function query_delete_panelBoardMembers($member_Id){
   return "DELETE FROM panelboardmembers WHERE member_Id=".$member_Id;
 }
}

?>