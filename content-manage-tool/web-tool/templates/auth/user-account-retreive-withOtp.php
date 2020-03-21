<script type="text/javascript">
$(document).ready(function(){
 showHide_auth_login_retrieveAccountWithMobileForm_mobileVerifyChangeBtn('verifyBtn');
});
var auth_login_rWMForm_htmlElements = {
  auth_login_rAWMForm_warnErrorMsg:'auth-login-retrieveAccountWithMobileForm-warnErrorMsg',
  auth_login_rAWMForm_mobile:'auth-login-retrieveAccountWithMobileForm-mobile',
  auth_login_rAWMForm_mobile_verifyBtn:'auth-login-retrieveAccountWithMobileForm-mobile-verifyBtn', 
  auth_login_rAWMForm_mobile_changeBtn:'auth-login-retrieveAccountWithMobileForm-mobile-changeBtn',
  auth_login_rAWMForm_mobile_verifyMobileForm:'auth-login-retrieveAccountWithMobileForm-verifyMobileForm',
  auth_login_rAWMForm_otpcode:'auth-login-retrieveAccountWithMobileForm-otpcode',
  auth_login_rAWMForm_changePasswordForm:'auth-login-retrieveAccountWithMobileForm-changePasswordForm',
  auth_login_rAWMForm_changePasswordForm_warnErrorMsg:'auth-login-retrieveAccountWithMobileForm-changePasswordForm-warnErrorMsg',
  auth_login_rAWMForm_changePasswordForm_newPassword:'auth-login-retrieveAccountWithMobileForm-changePasswordForm-newPassword',
  auth_login_rAWMForm_changePasswordForm_confirmpassword:'auth-login-retrieveAccountWithMobileForm-changePasswordForm-confirmpassword'
};
function showHide_auth_login_retrieveAccountWithMobileForm_verifyMobileForm(mode){
 if(mode==='show'){
   if($('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_verifyMobileForm).hasClass('hide-block')){
     $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_verifyMobileForm).removeClass('hide-block');
   }
 } else if(mode==='hide'){
   if(!$('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_verifyMobileForm).hasClass('hide-block')){
     $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_verifyMobileForm).addClass('hide-block');
   }
 }
}
function showHide_auth_login_retrieveAccountWithMobileForm_mobileVerifyChangeBtn(view){
 if(view=='verifyBtn'){
  if($('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_verifyBtn).hasClass('hide-block')){
   $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_verifyBtn).removeClass('hide-block');
  }
  if(!$('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_changeBtn).hasClass('hide-block')){
   $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_changeBtn).addClass('hide-block');
  }
 } else if(view=='changeBtn'){
   if(!$('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_verifyBtn).hasClass('hide-block')){
     $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_verifyBtn).addClass('hide-block');
   }
   if($('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_changeBtn).hasClass('hide-block')){
   $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile_changeBtn).removeClass('hide-block');
  }
 }
}
var AUTH_LOGIN_RAWMFORM_USERACCOUNT_ID; 
function submit_auth_login_retrieveAccountWithMobileForm_verifyMobile(){
/* ==========================================
 * FUNCTION DESCRIPTION :
 * ==========================================
 * 1) Check Mobile Number exists in Database or not
 * 2) If Exists:
 *     a) Display change Button and Show OTP Form with Validation Button
 *     b) Send OTP Code to Customer Mobile
 *     c) Display Message to User to Enter OTP Code
 * 3) Else:
 * 	   a) Display a Message 
 */
  AUTH_LOGIN_RAWMFORM_USERACCOUNT_ID='';
  VALIDATION_MESSAGE_ERROR='Missing ';
  var mobCode = '+91';
  var mobile = $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile).val();
  var valid_mobile = validate_mobile(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile);
  if(valid_mobile){
    authEndpoints.userAccounts_verify_mobileNumber(mobile, function(response){
      if(response.user==='EXISTS'){
	    AUTH_LOGIN_RAWMFORM_USERACCOUNT_ID = response.account_Id;
	    document.getElementById(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_warnErrorMsg).innerHTML='';
		document.getElementById(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile).disabled=true;
		showHide_auth_login_retrieveAccountWithMobileForm_mobileVerifyChangeBtn('changeBtn');
		showHide_auth_login_retrieveAccountWithMobileForm_verifyMobileForm('show');
		VALIDATION_MESSAGE_ERROR='An OTP Code is sent to your Mobile Number <b>"'+mobCode+'-'+mobile+'"</b>. Please Enter to validate your Mobile. ';
		show_validate_msg('success',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_warnErrorMsg);
		bootstrap_formField_trigger('success',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile);
	  } else {
	    VALIDATION_MESSAGE_ERROR='Mobile Number <b>"'+mobCode+'-'+mobile+'"</b> is not registered. Please Create your New Account. ';
		show_validate_msg('error',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_warnErrorMsg);
		bootstrap_formField_trigger('error',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile);
	  }
    });
  } else {
     show_validate_msg('error',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_warnErrorMsg);
	 bootstrap_formField_trigger('error',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile);
  }
}
function submit_auth_login_retrieveAccountWithMobileForm_changeMobile(){
/* ==================================================
 * FUNCTION DESCRRIPTION:
 * ==================================================
 *
 */
  reset_auth_login_retrieveAccountWithMobileForm();
}
function submit_auth_login_retrieveAccountWithMobileForm_validateOTPCode(){
 VALIDATION_MESSAGE_ERROR='Missing ';
 var otpcode = $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_otpcode).val();
 var valid_otpcode = validate_otpcode(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_otpcode);
 if(valid_otpcode){
	document.getElementById(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_warnErrorMsg).innerHTML='';
	VALIDATION_MESSAGE_ERROR='Your Mobile Number is validated. Please change your Password to access your Account. ';
    show_validate_msg('success',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_warnErrorMsg);
    bootstrap_formField_trigger('success',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_otpcode);
	showHide_auth_login_retrieveAccountWithMobileForm_verifyMobileForm('hide');
	showHide_auth_login_retrieveAccountWithMobileForm_changePwdForm('show');
 } else {
    show_validate_msg('error',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_warnErrorMsg);
	bootstrap_formField_trigger('error',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_otpcode);
	showHide_auth_login_retrieveAccountWithMobileForm_changePwdForm('hide');
 }
}
function showHide_auth_login_retrieveAccountWithMobileForm_changePwdForm(mode){
 if(mode==='show'){
   if($('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm).hasClass('hide-block')){
     $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm).removeClass('hide-block');
   }
 } else if(mode==='hide'){
   if(!$('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm).hasClass('hide-block')){
     $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm).addClass('hide-block');
   }
 }
}
function submit_auth_login_retrieveAccountWithMobileForm_changePwdForm_savePwd(){
 AUTH_LOGIN_RAWMFORM_USERACCOUNT_ID;
 var newPassword = $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_newPassword).val();
 var confirmPassword = $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_confirmpassword).val();
 var valid_newPassword = validate_password(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_newPassword);
 var valid_confirmPassword = validate_confirmPassword(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_newPassword,
								auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_confirmpassword);
 if(valid_newPassword && valid_confirmPassword){
    // Update Password 
	authEndpoints.userAccounts_updateInfo_accountById({account_Id:AUTH_LOGIN_RAWMFORM_USERACCOUNT_ID,acc_pwd:newPassword},
	function(response){
	  showHide_auth_accountAccessForm(auth_loginForm_htmlElements.userAccountBtn);
	  VALIDATION_MESSAGE_ERROR='Your Account updated successfully. Please try to login into your Account with New Password. ';
	  show_validate_msg('success',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg);
	});
	// 
 } else {
    show_validate_msg('error',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_warnErrorMsg);
 }
}
function reset_auth_login_retrieveAccountWithMobileForm_changePwdForm(){
 document.getElementById(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_warnErrorMsg).innerHTML='';
 $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_newPassword).val('');
 $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_confirmpassword).val('');
 bootstrap_formField_trigger('remove',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_newPassword);
 bootstrap_formField_trigger('remove',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_changePasswordForm_confirmpassword);
 showHide_auth_login_retrieveAccountWithMobileForm_changePwdForm('hide');
}
function reset_auth_login_retrieveAccountWithMobileForm(){
  document.getElementById(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_warnErrorMsg).innerHTML='';
  $('#'+auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile).val('');
  document.getElementById(auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile).disabled=false;
  showHide_auth_login_retrieveAccountWithMobileForm_mobileVerifyChangeBtn('verifyBtn');
  showHide_auth_login_retrieveAccountWithMobileForm_verifyMobileForm('hide');
  showHide_auth_login_retrieveAccountWithMobileForm_changePwdForm('hide');
  bootstrap_formField_trigger('remove',auth_login_rWMForm_htmlElements.auth_login_rAWMForm_mobile);
  reset_auth_login_retrieveAccountWithMobileForm_changePwdForm();
}
</script>
<div id="auth-login-retrievePwdWithMobileForm" class="hide-block">
<!-- -->
<div align="center" class="form-group" style="color:#fff5c4;">
  <h5 style="line-height:22px;"><b>Remember Mobile Number, but Forgot Password.<br/>Then, please Enter your Mobile Number.</b></h5>
</div><!--/.form-group -->
<!-- -->
<div style="padding-left:20px;padding-right:20px;margin-top:15px;">
 <div align="center" class="form-group" style="color:#fff5c4;">
  <!--<h5><b>Provide Basic Information to create Account</b></h5> -->
 </div><!--/.form-group -->  
 <div id="auth-login-retrieveAccountWithMobileForm-warnErrorMsg" class="form-group"></div>
 <div class="form-group">
  <!-- -->
  <div class="input-group">
   <div class="input-group-btn">
	<!-- -->
	<div class="dropdown">
	  <button class="btn btn-default dropdown-toggle"  style="border-radius:0px;"type="button" data-toggle="dropdown">+91
	   <span class="caret"></span></button>
	   <ul class="dropdown-menu">
		  <li><a href="#">+91</a></li>
	   </ul>
	</div>
	<!-- -->
   </div><!--/.input-btn-group -->
   <input id="auth-login-retrieveAccountWithMobileForm-mobile" class="form-control" placeholder="Enter Mobile Number" 
   onkeypress="javascript:return core_validate_allowOnlyNumeric(event);"/>
   <div class="input-group-btn">
	  <button id="auth-login-retrieveAccountWithMobileForm-mobile-verifyBtn" class="btn btn-default hide-block" 
		 onclick="javascript:submit_auth_login_retrieveAccountWithMobileForm_verifyMobile();"><b>Verify</b></button>
	  <button id="auth-login-retrieveAccountWithMobileForm-mobile-changeBtn" class="btn btn-default hide-block" 
		 onclick="javascript:submit_auth_login_retrieveAccountWithMobileForm_changeMobile();"><b>Change</b></button>
   </div><!--/.input-btn-group -->
  </div><!--/.input-group -->
  <!-- -->
 </div><!--/.form-group -->
 <div id="auth-login-retrieveAccountWithMobileForm-verifyMobileForm" class="form-group hide-block">
  <div class="input-group">
    <input id="auth-login-retrieveAccountWithMobileForm-otpcode" class="form-control" placeholder="Enter OTP Code"/>
    <div class="input-group-btn">
     <button id="auth-reg-genInfo-mobile-validateOTPBtn" class="btn btn-default" 
		 onclick="javascript:submit_auth_login_retrieveAccountWithMobileForm_validateOTPCode();"><b>Validate</b></button>
    </div><!--/.input-group-btn -->
   </div><!--/.input-group -->
 </div><!--/.form-group -->
 </div>
 
<div id="auth-login-retrieveAccountWithMobileForm-changePasswordForm" class="hide-block">
 <div align="center" class="form-group" style="color:#fff5c4;">
  <h5 style="line-height:22px;"><b>Change Password to secure your Account</b></h5>
 </div><!--/.form-group -->
 <div id="auth-login-retrieveAccountWithMobileForm-changePasswordForm-warnErrorMsg" class="form-group"></div>
 <div class="form-group">
  <input id="auth-login-retrieveAccountWithMobileForm-changePasswordForm-newPassword" type="password" class="form-control" placeholder="Enter Password"/>
 </div>
 <div class="form-group">
  <input id="auth-login-retrieveAccountWithMobileForm-changePasswordForm-confirmpassword" type="password" class="form-control" placeholder="Enter Confirm Password"/>
 </div>
 <div class="form-group">
  <button class="btn btn-default form-control" 
  onclick="javascript:submit_auth_login_retrieveAccountWithMobileForm_changePwdForm_savePwd();">
  <b>Update the Information</b></button>
 </div>
</div><!--/. -->
</div>
