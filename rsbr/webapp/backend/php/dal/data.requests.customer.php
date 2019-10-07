<?php
class CustomerRequests {
 function query_add_customerRequests($account_Id, $application, $recordTitle, $recordDesc, $picture1,
	$picture2, $picture3, $isCertify, $certifyTitle, $certifyDesc, $displayRecords, $status, $comment){
  $sql="INSERT INTO cust_requests(account_Id, application, recordTitle, recordDesc, picture1, ";
  $sql.="picture2, picture3, isCertify, certifyTitle, certifyDesc, displayRecords, ts, status, comment) ";
  $sql.="VALUES (".$account_Id.",'".$application."','".$recordTitle."','".$recordDesc."','";
  $sql.=$picture1."','".$picture2."','".$picture3."','".$isCertify."','".$certifyTitle."','".$certifyDesc;
  $sql.="','".$displayRecords."','".date('Y-m-d H:i:s')."','".$status."','".$comment."');";
  return $sql;
 }
 function query_update_customerRequests($request_Id, $account_Id, $application, $recordTitle, $recordDesc, $picture1,
	$picture2, $picture3, $isCertify, $certifyTitle, $certifyDesc, $displayRecords, $status, $comment){
  $sql="UPDATE cust_requests SET";
  if(strlen($application)>0){ $sql.=" application='".$application."',"; }
  if(strlen($recordTitle)>0){ $sql.=" recordTitle='".$recordTitle."',"; }
  if(strlen($recordDesc)>0){ $sql.=" recordDesc='".$recordDesc."',"; }
  if(strlen($picture1)>0){ $sql.=" picture1='".$picture1."',"; }
  if(strlen($picture2)>0){ $sql.=" picture2='".$picture2."',"; }
  if(strlen($picture3)>0){ $sql.=" picture3='".$picture3."',"; }
  if(strlen($isCertify)>0){ $sql.=" isCertify='".$isCertify."',"; }
  if(strlen($certifyTitle)>0){ $sql.=" certifyTitle='".$certifyTitle."',"; }
  if(strlen($certifyDesc)>0){ $sql.=" certifyDesc='".$certifyDesc."',"; }
  if(strlen($displayRecords)>0){ $sql.=" displayRecords='".$displayRecords."',"; }
  if(strlen($status)>0){ $sql.=" status='".$status."',"; }
  if(strlen($comment)>0){ $sql.=" comment='".$comment."',"; }
  $sql=chop($sql,',');
  $sql.=" WHERE request_Id=".$request_Id;
  return $sql;
 }
 function query_view_displayRecords(){
  $sql="SELECT * FROM cust_requests ORDER BY ts ASC";
  return $sql;
 } 
 function query_view_customerRequests($account_Id){
  $sql="SELECT * FROM cust_requests WHERE account_Id='".$account_Id."' ORDER BY ts ASC";
  return $sql;
 }
 function query_viewAll_customerRequests(){
  $sql="SELECT * FROM cust_requests ORDER BY ts ASC";
  return $sql;
 }
 function query_delete_customerRequests($request_Id){
  $sql="DELETE FROM cust_requests WHERE request_Id=".$request_Id;
  return $sql;
 }
}

?>