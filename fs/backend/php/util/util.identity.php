<?php
 require_once '../api/app.initiator.php';
 require_once '../api/app.database.php';
 require_once '../dal/data.util.identity.php';
 
 class IdentityUtil {
  function pk_unique_gen($alphaKey,$size){
    $num=$alphaKey;
	for($index=0;$index<$size;$index++){ $num.=rand(0,9); }
	return $num;
  }
  function pk_checkAndConfirm_id($alphaKey,$size,$func){
    start:
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_unique_gen($alphaKey,$size);
	$identityCheck = new IdentityCheck();
	$query = $identityCheck->$func($pkId);
	$database = new Database($GLOBALS['DB_ECOM_SERVERNAME'],$GLOBALS['DB_ECOM_NAME'],$GLOBALS['DB_ECOM_USER'],$GLOBALS['DB_ECOM_PASSWORD']);
	if(intval(json_decode($database->getJSONData($query))[0]->{"count(*)"})>0){
	  goto start;
	} 
	return $pkId;
  }
 }
 
 class Identity {
   function pk_adminAccounts(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('AA',8,'query_checkUniquePK_adminAccounts');
	return $pkId;
   }
   function pk_adminRole(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('AR',8,'query_checkUniquePK_adminRole');
	return $pkId;
   }
   function pk_customerAccounts(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('CA',8,'query_checkUniquePK_customerAccounts');
	return $pkId;
   }
   function pk_customerCart(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('CC',8,'query_checkUniquePK_customerCart');
	return $pkId;
   }
   function pk_prodCatMain(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('CAT',7,'query_checkUniquePK_productCatMain');
	return $pkId;
   }
   function pk_prodCatSub(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('SCAT',6,'query_checkUniquePK_prodCatSub');
	return $pkId;
   }
   function pk_prodInfo(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('PROD',6,'query_checkUniquePK_prodInfo');
	return $pkId;
   }
   function pk_prodPrice(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('PRODP',5,'query_checkUniquePK_prodPrice');
	return $pkId;
   }
   function pk_prodSpec(){
    $identityUtil = new IdentityUtil();
	$pkId = $identityUtil->pk_checkAndConfirm_id('PRODS',5,'query_checkUniquePK_prodSpec');
	return $pkId;
   }
 }
/*
 $identity = new Identity();
 echo $identity->pk_adminAccounts().'<br/>';
 echo $identity->pk_adminRole().'<br/>';
 echo $identity->pk_customerAccounts().'<br/>';
 echo $identity->pk_customerCart().'<br/>';
 echo $identity->pk_prodCatMain().'<br/>';
 echo $identity->pk_prodCatSub().'<br/>';
 echo $identity->pk_prodInfo().'<br/>';
 echo $identity->pk_prodPrice().'<br/>';
 echo $identity->pk_prodSpec().'<br/>'; */
?>