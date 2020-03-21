<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/api/bootstrap-advanced.css">
<link rel="stylesheet" href="styles/api/core-skeleton.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
<script src="js/common/endpoints.auth.js"></script>
<script src="js/common/messages.stat.js"></script>
<script src="js/auth/user-accounts-retrieve-withSQ.js"></script>
<script type="text/javascript">
var PROJECT_URL='';
var USR_LANG='english';
</script>
<script src="js/api/bootstrap-advanced.js"></script>
<script src="js/api/core-skeleton.js"></script>
<script src="js/common/validations.js"></script>
<script src="js/auth/user-accounts-reg.js"></script>
<style>
body { background-color:purple;color:#fff; }
.mtop15p { margin-top:15px; }
.mtop65p { margin-top:65px; }
.mbot35p { margin-bottom:35px; }
/* Page Related CSS ::: Start */
.step-badges { height:40px;cursor:pointer;margin-top:15px; }
.step-badges>div>span.badge { font-size:30px;background-color:#fff;color:purple; }
.step-badges>div>span.badge.active { font-size:30px;background-color:#fff5c4;color:purple; }
.hide-block { display:none; }
/* Page Related CSS ::: End */
</style>

<script type="text/javascript">
var auth_loginForm_htmlElements = {
  userAccountForm:'auth-login-userAccountForm',
  userAccountBtn:'auth-login-access-userAccountForm',
  retrievePwdWithMobileForm:'auth-login-retrievePwdWithMobileForm',
  retrievePwdWithMobileBtn:'auth-login-access-retrievePwdWithMobileForm',
  retrieveAccountWithoutInfoForm:'auth-login-retrieveAccountWithoutInfoForm',
  retrieveAccountWithoutInfoBtn:'auth-login-access-retrieveAccountWithoutInfoForm'
};
function showHide_auth_accountAccessForm(id){
 var arry_Id=[auth_loginForm_htmlElements.userAccountForm,auth_loginForm_htmlElements.retrievePwdWithMobileForm,
			  auth_loginForm_htmlElements.retrieveAccountWithoutInfoForm];
 var arry_btn_Id=[auth_loginForm_htmlElements.userAccountBtn,auth_loginForm_htmlElements.retrievePwdWithMobileBtn,
				  auth_loginForm_htmlElements.retrieveAccountWithoutInfoBtn];
 for(var index=0;index<arry_btn_Id.length;index++){
  console.log(arry_btn_Id[index]+"  "+id+" "+arry_Id[index]);
  if(arry_btn_Id[index]===id){
    if($('#'+arry_Id[index]).hasClass('hide-block')){ $('#'+arry_Id[index]).removeClass('hide-block'); }
	if(!$('#'+arry_btn_Id[index]).hasClass('hide-block')){ $('#'+arry_btn_Id[index]).addClass('hide-block'); }
  } else {
    if(!$('#'+arry_Id[index]).hasClass('hide-block')){ $('#'+arry_Id[index]).addClass('hide-block'); }
	if($('#'+arry_btn_Id[index]).hasClass('hide-block')){ $('#'+arry_btn_Id[index]).removeClass('hide-block'); }
  }
 }
 if(id===auth_loginForm_htmlElements.retrievePwdWithMobileBtn){
   showHide_auth_login_retrieveAccountWithoutInfoForm_mobileVerifyChangeBtn('verifyBtn');
 } else if(id===auth_loginForm_htmlElements.retrievePwdWithMobileBtn){
    reset_auth_login_retrieveAccountWithMobileForm();
 }
}

function reset_auth_accountAccessForm_userAccountForm(){ 

}
function reset_auth_accountAccessForm_retrievePwdWithMobileForm(){ 

}


$(document).ready(function(){
 trigger_userAccounts_auth();
 trigger_userAccounts_auth_login_rAWoIForm();
 // showHide_auth_retrieveAccountWithoutInfoForm('auth-login-retrieveAccountWithoutInfoForm-securityQ');
});
</script>
</head>
<body>

<div class="container-fluid mtop65p">
<div class="row">
<div class="col-xs-12 col-md-2 col-sm-12"></div>
<div class="col-xs-12 col-md-4 col-sm-6">
 <?php include_once 'templates/auth/user-account-reg.php'; ?>
</div><!--/.col-xs-12 col-md-4 col-sm-4 -->
<div class="col-xs-12 col-md-4 col-sm-6">
 <!-- -->
 <div align="center"><h4 class="mbot35p"><b>Login to your Account</b></h4></div>
 <button onclick="javascript:reset_auth_accountAccessForm_retrieveAccountWithoutInfoForm();">Test</button>
 <?php include_once 'templates/auth/user-account-login.php'; ?>
 <?php include_once 'templates/auth/user-account-retreive-withOtp.php'; ?>
 <?php include_once 'templates/auth/user-account-retreive-withSQ.php'; ?>

 <div id="auth-login-access-userAccountForm" align="right" class="form-group hide-block curpoint"
   onclick="javascript:showHide_auth_accountAccessForm(this.id);">
	<b><u>Login to your Account</u></b>
 </div><!--/.form-group -->
 <div id="auth-login-access-retrievePwdWithMobileForm" align="right" class="form-group hide-block curpoint"
   onclick="javascript:showHide_auth_accountAccessForm(this.id);">
    <b><u>Remember Mobile Number, but Forgot Password?</u></b>
 </div><!--/.form-group -->
 <div id="auth-login-access-retrieveAccountWithoutInfoForm" align="right" class="form-group hide-block curpoint"
   onclick="javascript:showHide_auth_accountAccessForm(this.id);">
    <b><u>Forgot Password and Mobile Number changed?</u></b>
 </div><!--/.form-group -->
 <!-- -->
</div><!--/.col-xs-12 col-md-4 col-sm-4 -->
<div class="col-xs-12 col-md-2 col-sm-12"></div>
</div><!--/.row -->
</div><!--/.container-fluid -->

</body>
</html>
