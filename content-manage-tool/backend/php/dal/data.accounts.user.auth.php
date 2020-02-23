<?php
class UserAccountAuth {

  private $TABLE_USERACCOUNT_SECURITYQ='user_accounts_sq';
  private $TABLE_USERACCOUNT_AUTHINFO='user_accounts_auth';
  
  function query_view_userSecurityQ(){
	return "SELECT * FROM ".$this->TABLE_USERACCOUNT_SECURITYQ.";";
  }

  function query_view_userInfoByMobile($mob_code,$mobile){
   $authInfoTbl = $this->TABLE_USERACCOUNT_AUTHINFO;
   $authSecurityQTbl = $this->TABLE_USERACCOUNT_SECURITYQ;
   $sql="SELECT account_Id, mob_code, mobile, surName, name, gender, q1, ";
   $sql.="(SELECT sQ FROM ".$authSecurityQTbl." WHERE ";
   $sql.=$authInfoTbl.".q1=".$authSecurityQTbl.".sQ_Id) As qq1, a1, q2,";
   $sql.="(SELECT sQ FROM ".$authSecurityQTbl." WHERE ";
   $sql.=$authInfoTbl.".q2=".$authSecurityQTbl.".sQ_Id) As qq2, a2, q3, ";
   $sql.="(SELECT sQ FROM ".$authSecurityQTbl." WHERE ";
   $sql.=$authInfoTbl.".q3=".$authSecurityQTbl.".sQ_Id) As qq3, a3 FROM ";
   $sql.=$authInfoTbl." WHERE mob_code='".$mob_code."' AND mobile='".$mobile."';";
   return $sql;
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