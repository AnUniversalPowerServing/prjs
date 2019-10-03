<?php 
class CustomerAccounts {
 function query_add_customerAccounts($name, $mobileNumber, $acc_pwd){
  $sql="INSERT INTO cust_accounts(name, mobileNumber, acc_pwd) ";
  $sql.="VALUES ('".$name."','".$mobileNumber."','".$acc_pwd."')";
  return $sql;
 }
 function query_view_customerAccountByMobileNumber($mobileNumber,$acc_pwd){
  $sql="SELECT * FROM cust_accounts WHERE mobileNumber='".$mobileNumber."' AND acc_pwd='".$acc_pwd."';";
  return $sql;
 }
 function query_view_customerAccountByMobileNumberInfo($mobileNumber){
  $sql="SELECT * FROM cust_accounts WHERE mobileNumber='".$mobileNumber."';";
  return $sql;
 }
 function query_update_customerAccounts($account_Id,$name,$mobileNumber,$acc_pwd){
  $sql="UPDATE cust_accounts SET";
  if(strlen($name)>0) { $sql.=" name='".$name."',"; }
  if(strlen($mobileNumber)>0) { $sql.=" mobileNumber='".$mobileNumber."',"; }
  if(strlen($acc_pwd)>0) {  $sql.=" acc_pwd='".$acc_pwd."',"; }
  $sql=chop($sql,',');
  $sql.=" WHERE account_Id=".$account_Id;
  return $sql;
 }
 function query_update_customerAccountsByMobile($name,$mobileNumber,$acc_pwd){
  $sql="UPDATE cust_accounts SET";
  if(strlen($name)>0) { $sql.=" name='".$name."',"; }
  if(strlen($acc_pwd)>0) {  $sql.=" acc_pwd='".$acc_pwd."',"; }
  $sql=chop($sql,',');
  $sql.=" WHERE mobileNumber=".$mobileNumber;
  return $sql;
 }
 function query_check_mobileNumber($mobileNumber){
  $sql="SELECT * FROM cust_accounts WHERE mobileNumber='".$mobileNumber."';";
  return $sql;
 }
}


?>