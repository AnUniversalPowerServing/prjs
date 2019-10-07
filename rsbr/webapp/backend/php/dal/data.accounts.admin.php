<?php 
class AdminAccounts {
 function query_view_adminAccountById($username,$acc_pwd){
  $sql="SELECT * FROM admin_accounts WHERE username='".$username."' AND acc_pwd='".$acc_pwd."';";
  return $sql;
 }
 function query_update_adminAccounts($admin_Id,$name,$username,$acc_pwd,$mobilenumber){
  $sql="UPDATE admin_accounts SET ";
  if(strlen($name)>0) { $sql.="name='".$name."',"; }
  if(strlen($username)>0) { $sql.=" username='".$username."',"; }
  if(strlen($acc_pwd)>0) { $sql.="acc_pwd='".$acc_pwd."',"; }
  if(strlen($mobilenumber)>0) { $sql.="mobilenumber='".$mobilenumber."',"; }
  $sql=chop($sql,',');
  $sql.=" WHERE admin_Id=".$admin_Id;
  return $sql;
 }
 function query_view_adminAccountByMobileNumber($mobilenumber){
  $sql="SELECT * FROM admin_accounts WHERE mobilenumber='".$mobilenumber."';";
  return $sql;
 }
 
}



?>