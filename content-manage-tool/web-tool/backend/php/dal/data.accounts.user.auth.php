<?php
class UserAccountAuth {

  private $TABLE_USERACCOUNT_SECURITYQ='user_accounts_sq';
  private $TABLE_USERACCOUNT_AUTHINFO='user_accounts_auth';
  
  function query_view_userSecurityQ(){
	return "SELECT * FROM user_accounts_sq;";
  }

  function query_view_userInfoByMobile($mob_code,$mobile){
   $sql="SELECT account_Id, mob_code, mobile, surName, name, gender, q1, ";
   $sql.="(SELECT sQ FROM user_accounts_sq WHERE ";
   $sql.="user_accounts_auth.q1=user_accounts_sq.sQ_Id) As qq1, a1, q2,";
   $sql.="(SELECT sQ FROM user_accounts_sq WHERE ";
   $sql.="user_accounts_auth.q2=user_accounts_sq.sQ_Id) As qq2, a2, q3, ";
   $sql.="(SELECT sQ FROM user_accounts_sq WHERE ";
   $sql.="user_accounts_auth.q3=user_accounts_sq.sQ_Id) As qq3, a3 FROM ";
   $sql.="user_accounts_auth WHERE mob_code='".$mob_code."' AND mobile='".$mobile."';";
   return $sql;
  }
  
  function query_view_userMobileIsExists($mobile){
    return "SELECT * FROM user_accounts_auth WHERE mobile='".$mobile."';";
  }
  
  function query_view_listOfSurNames(){
    return "SELECT DISTINCT surName FROM user_accounts_auth;";
  }
  
  function query_add_userAccounts($mob_code, $mobile, $mob_val, $surName, $name, $gender, $acc_pwd, $q1, $a1, $q2, $a2, $q3, $a3, $acc_active){
   $sql="INSERT INTO user_accounts_auth(mob_code, mobile, mob_val, surName, name, gender, acc_pwd, q1, a1, q2, a2, q3, a3, acc_active) ";
   $sql.="VALUES ('".$mob_code."','".$mobile."','".$mob_val."','".$surName;
   $sql.="','".$name."','".$gender."','".$acc_pwd."','".$q1."','".$a1."','".$q2."','".$a2."','".$q3."','".$a3."','".$acc_active."');";
   return $sql;
  }
  
  function query_update_userAccounts($account_Id, $mob_code, $mobile, $surName, $name, $gender, 
	$acc_pwd, $q1, $a1, $q2, $a2, $q3, $a3, $acc_active){
	$sql="UPDATE user_accounts_auth SET ";
	if(strlen($mob_code)>0){ $sql.="mob_code='".$mob_code."',"; }
	if(strlen($mobile)>0){ $sql.="mobile='".$mobile."',"; }
	if(strlen($surName)>0){ $sql.="surName='".$surName."',"; }
	if(strlen($name)>0){ $sql.="name='".$name."',"; }
	if(strlen($gender)>0){ $sql.="gender='".$gender."',"; }
	if(strlen($acc_pwd)>0){ $sql.="acc_pwd='".$acc_pwd."',"; }
	if(strlen($q1)>0){ $sql.="q1=".$q1.","; }
	if(strlen($a1)>0){ $sql.="a1='".$a1."',"; }
	if(strlen($q2)>0){ $sql.="q2=".$q2.","; }
	if(strlen($a2)>0){ $sql.="a2='".$a2."',"; }
	if(strlen($q3)>0){ $sql.="q3=".$q3.","; }
	if(strlen($a3)>0){ $sql.="a3='".$a3."',"; }
	if(strlen($acc_active)>0){ $sql.="acc_active='".$acc_active."',"; }
	$sql=chop($sql,',');
	$sql.=" WHERE account_Id='".$account_Id."';";
	return $sql;
  }
  
  function query_view_userAccountLogin($mob_code,$mobile,$acc_pwd){
    $sql="SELECT account_Id, mob_code, mobile, surName, name, gender, q1, ";
    $sql.="(SELECT sQ FROM user_accounts_sq WHERE ";
    $sql.="user_accounts_auth.q1=user_accounts_sq.sQ_Id) As qq1, a1, q2,";
    $sql.="(SELECT sQ FROM user_accounts_sq WHERE ";
    $sql.="user_accounts_auth.q2=user_accounts_sq.sQ_Id) As qq2, a2, q3, ";
    $sql.="(SELECT sQ FROM user_accounts_sq WHERE ";
    $sql.="user_accounts_auth.q3=user_accounts_sq.sQ_Id) As qq3, a3 FROM ";
    $sql.="user_accounts_auth WHERE mob_code='".$mob_code."' AND mobile='".$mobile."' AND acc_pwd='".$acc_pwd."';";
	return $sql;
  }
}
?>