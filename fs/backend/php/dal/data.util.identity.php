<?php
class IdentityCheck {
 function query_checkUniquePK_adminAccounts($account_Id){
  return "SELECT count(*) FROM admin_accounts WHERE account_Id='".$account_Id."';";
 }
 function query_checkUniquePK_adminRole($role_Id){
  return "SELECT count(*) FROM admin_role WHERE role_Id='".$role_Id."';";
 }
 function query_checkUniquePK_customerAccounts($account_Id){
  return "SELECT count(*) FROM customer_accounts WHERE account_Id='".$account_Id."';";
 }
 function query_checkUniquePK_customerCart($cart_Id){
  return "SELECT count(*) FROM customer_cart WHERE cart_Id='".$cart_Id."';";
 }
 function query_checkUniquePK_productCatMain($category_Id){
  return "SELECT count(*) FROM prod_cat_main WHERE category_Id='".$category_Id."';";
 }
 function query_checkUniquePK_prodCatSub($subCategory_Id){
  return "SELECT count(*) FROM prod_cat_sub WHERE subCategory_Id='".$subCategory_Id."';";
 }
 function query_checkUniquePK_prodInfo($prod_Id){
  return "SELECT count(*) FROM prod_info WHERE prod_Id='".$prod_Id."';";
 }
 function query_checkUniquePK_prodPrice($price_Id){
  return "SELECT count(*) FROM prod_price WHERE price_Id='".$price_Id."';";
 }
 function query_checkUniquePK_prodSpec($spec_Id){
  return "SELECT count(*) FROM prod_spec WHERE spec_Id='".$spec_Id."';";
 }
}

?>