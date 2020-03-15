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
		session.set({"SESSION_CUSTOMER_ACCOUNTID":response[0].account_Id,
							"SESSION_CUSTOMER_MOBCODE":response[0].mob_code,
							"SESSION_CUSTOMER_MOBILE":response[0].mobile,
							"SESSION_CUSTOMER_SURNAME":response[0].surName,
							"SESSION_CUSTOMER_NAME":response[0].name,
							"SESSION_CUSTOMER_GENDER":response[0].gender,
							"SESSION_CUSTOMER_Q1ID":response[0].q1,
							"SESSION_CUSTOMER_Q1":response[0].qq1,
							"SESSION_CUSTOMER_Q2ID":response[0].q2,
							"SESSION_CUSTOMER_Q2":response[0].qq2,
							"SESSION_CUSTOMER_Q3ID":response[0].q3,
							"SESSION_CUSTOMER_Q3":response[0].qq3,
							"SESSION_CUSTOMER_A1":response[0].a1,
							"SESSION_CUSTOMER_A2":response[0].a2,
							"SESSION_CUSTOMER_A3":response[0].a3
						  });
		window.location.href='customer-dashboard.php';
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
 document.getElementById(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg).innerHTML='';
 $('#'+auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile).val('');
 $('#'+auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password).val('');
 bootstrap_formField_trigger('remove',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile);
 bootstrap_formField_trigger('remove',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password);
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

