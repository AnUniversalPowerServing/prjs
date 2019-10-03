<?php 
class AdminAccounts {
 function query_view_adminAccountById($username,$acc_pwd){
  $sql="SELECT * FROM admin_accounts WHERE username='' AND acc_pwd='';";
  return $sql;
 }
 function query_update_adminAccounts($admin_Id,$name,$username,$acc_pwd){
  $sql="UPDATE admin_accounts SET ";
  if(strlen($name)>0) { $sql.="name='',"; }
  if(strlen($username)>0) { $sql.=" username='',"; }
  if(strlen($acc_pwd)>0) { $sql.="acc_pwd='',"; }
  $sql=chop($sql,',');
  $sql.=" WHERE admin_Id=".$admin_Id;
  return $sql;
 }
}



?>