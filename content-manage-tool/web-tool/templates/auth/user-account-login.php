<script type="text/javascript">
var auth_login_userAccountForm_htmlElements = {
  auth_login_userAccountForm_warnErrorMsg:'auth-login-useraccount-warnErrorMsg',
  auth_login_userAccountForm_mobile:'auth-login-useraccount-mobile',
  auth_login_userAccountForm_password:'auth-login-useraccount-password'
};
function submit_auth_login_userAccountForm_authenticate(){
 VALIDATION_MESSAGE_ERROR='Missing ';
 var mobile = document.getElementById(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile).value;
 var password = document.getElementById(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password).value;
 var valid_mobile=validate_mobile(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile);
 var valid_password=validate_password(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password);
 if(valid_mobile && valid_password){
   document.getElementById(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg).innerHTML='';
   // login to User Account
   authEndpoints.userAccounts_viewInfo_accountLogin({ mobile:mobile,acc_pwd:password },function(response){
    console.log(response);
	if(response.length>0){
		// Add them to a Session and Redirect Page
		console.log(JSON.stringify(response[0]));
		session.set(JSON.stringify(response[0]));
		session.get(JSON.stringify(["account_Id", "mob_code", "mobile", "surName", "name", "gender", "q1"]));
	} else {
		VALIDATION_MESSAGE_ERROR='Your Account with Mobile Number "'+mobile+'" is not registered. ';
		show_validate_msg('error',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg);
		bootstrap_formField_trigger('error',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile);
		bootstrap_formField_trigger('error',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password);
	}
   });
 } else {
    show_validate_msg('error',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg);
 }
}
function reset_auth_login_userAccountForm_authenticate(){
 $('#'+auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile).val('');
 $('#'+auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password).val('');
}
</script>
<div id="auth-login-userAccountForm" class="hide-block">
<!-- -->
<div align="center" class="form-group" style="color:#fff5c4;">
  <h5><b>Access your Account with your Credentials</b></h5>
</div><!--/.form-group -->
<!-- -->
<div style="padding-left:20px;padding-right:20px;margin-top:15px;">
 <div align="center" class="form-group" style="color:#fff5c4;">
  <!--<h5><b>Provide Basic Information to create Account</b></h5> -->
 </div><!--/.form-group -->  
 <div id="auth-login-useraccount-warnErrorMsg" class="form-group"></div>
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
   <input id="auth-login-useraccount-mobile" class="form-control" placeholder="Enter Mobile Number"/>
  </div><!--/.input-group -->
  <!-- -->
 </div><!--/.form-group -->
 <div class="form-group">
  <input id="auth-login-useraccount-password" class="form-control" type="password" placeholder="Enter Password"/>
 </div><!--/.form-group -->
 <div class="form-group">
  <button class="btn btn-default form-control" 
	onclick="javascript:submit_auth_login_userAccountForm_authenticate();"><b>Sign-In</b></button>
 </div><!--/.form-group -->
 </div>
 </div>

