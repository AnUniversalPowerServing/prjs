<?php
 class AdminAccounts {
   function query_add_adminRole($role_Id,$roleName){
	$sql="INSERT INTO admin_role(role_Id,roleName) VALUES ('".$role_Id."','".$roleName."')";
	return $sql;
   }
   function query_update_adminRole($role_Id,$roleName){
    $sql="UPDATE admin_role SET ";
	if(strlen($roleName)>0){ $sql.="roleName='".$roleName."' "; }
	$sql.="WHERE role_Id='".$role_Id."'";
	return $sql;
   }
   function query_add_adminAccounts($account_Id, $username, $acc_pwd, $role_Id, $acc_active){
    $sql="INSERT INTO admin_accounts(account_Id, username, acc_pwd, role_Id, acc_active) ";
	$sql.="VALUES ('".$account_Id."','".$username."','".$acc_pwd."','".$role_Id."','".$acc_active."');";
	return $sql;
   }
   function query_update_adminAccounts($account_Id, $username, $acc_pwd, $role_Id, $acc_active){
    $sql="UPDATE admin_accounts SET ";
	if(strlen($username)>0){ $sql.="username='".$username."',"; }
	if(strlen($acc_pwd)>0){ $sql.="acc_pwd='".$acc_pwd."',"; }
	if(strlen($role_Id)>0){ $sql.="role_Id='".$role_Id."',"; }
	if(strlen($acc_active)>0){ $sql.="acc_active='".$acc_active."',"; }
	$sql=chop($sql,",");
	$sql.=" WHERE account_Id='".$account_Id."';";
	return $sql;
   }  
   function query_validate_adminLoginAuth($username, $acc_pwd){
    $sql="SELECT admin_accounts.account_Id, admin_accounts.username, admin_accounts.acc_active, ";
	$sql.="admin_role.role_Id, admin_role.roleName FROM admin_accounts, admin_role ";
	$sql.="WHERE admin_accounts.role_Id = admin_role.role_Id AND ";
	$sql.="admin_accounts.username='".$username."' AND admin_accounts.acc_pwd='".$acc_pwd."';";
	return $sql;
   }
 }
?>
