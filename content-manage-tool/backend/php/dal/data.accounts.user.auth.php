<?php
class UserAccountAuth {

  private $TABLE_USERACCOUNT_SECURITYQ='user_accounts_sq';
  private $TABLE_USERACCOUNT_AUTHINFO='user_accounts_auth';
  
  function query_view_userSecurityQ(){
	return "SELECT * FROM ".$this->TABLE_USERACCOUNT_SECURITYQ.";";
  }

  function query_view_userMobileIsExists($mobile){
    return "SELECT * FROM ".$this->TABLE_USERACCOUNT_AUTHINFO." WHERE mobile='".$mobile."';";
  }
  
  function query_view_listOfSurNames(){
    return "SELECT DISTINCT surName FROM ".$this->TABLE_USERACCOUNT_AUTHINFO.";";
  }
  
  function query_add_userAccounts($mob_code, $mobile, $mob_val, $surName, $name, $gender, $acc_pwd, $q1, $a1, $q2, $a2, $q3, $a3, $acc_active){
   $sql="INSERT INTO ".$this->TABLE_USERACCOUNT_AUTHINFO."(mob_code, mobile, mob_val, surName, name, gender, acc_pwd, q1, a1, q2, a2, q3, a3, acc_active) ";
   $sql.="VALUES ('".$mob_code."','".$mobile."','".$mob_val."','".$surName;
   $sql.="','".$name."','".$gender."','".$acc_pwd."','".$q1."','".$a1."','".$q2."','".$a2."','".$q3."','".$a3."','".$acc_active."');";
   return $sql;
  }
}
?>