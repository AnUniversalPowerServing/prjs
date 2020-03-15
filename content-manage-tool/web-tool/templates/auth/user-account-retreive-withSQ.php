<script type="text/javascript">

</script>
<div id="auth-login-retrieveAccountWithoutInfoForm" class="hide-block">
<!-- -->
<div class="form-group" style="color:#fff5c4;">
  <h5 align="left" style="line-height:22px;"><b><u>Set your Account :</u></h5> 
  <h5 align="center" style="line-height:22px;">When you Forgot Password and Mobile Number Changed</b></h5>
</div><!--/.form-group -->
<!-- -->
<div style="padding-left:20px;padding-right:20px;margin-top:15px;">
 <div align="center" class="form-group" style="color:#fff5c4;">
  <!--<h5><b>Provide Basic Information to create Account</b></h5> -->
 </div><!--/.form-group -->  
 <div id="auth-login-retrieveAccountWithoutInfoForm-warnErrorMsg" class="form-group"></div>
 <div class="form-group">
   <label>Please Enter your Registered Mobile Number</label>
 </div><!--/.form-group -->
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
   <input id="auth-login-retrieveAccountWithoutInfoForm-mobile" class="form-control" placeholder="Enter Mobile Number" 
    onkeypress="javascript:return core_validate_allowOnlyNumeric(event);"/>
   <div class="input-group-btn">
	  <button id="auth-login-retrieveAccountWithoutInfoForm-mobile-verifyBtn" class="btn btn-default" 
		 onclick="javascript:submit_auth_login_retrieveAccountWithoutInfoForm_verifyMobile();"><b>Verify</b></button>
	  <button id="auth-login-retrieveAccountWithoutInfoForm-mobile-changeBtn" class="btn btn-default hide-block" 
		 onclick="javascript:submit_auth_login_retrieveAccountWithoutInfoForm_changeMobile();"><b>Change</b></button>
   </div><!--/.input-btn-group -->
   
  </div><!--/.input-group -->
  <!-- -->
 </div><!--/.form-group -->
 <div id="auth-login-retrieveAccountWithoutInfoForm-init" class="hide-block">
 <div id="auth-login-retrieveAccountWithoutInfoForm-securityQForm" class="hide-block">
 <!-- -->
   <div align="center" class="form-group" style="color:#fff5c4;">
	 <h5><b>Validate your Security Questions to secure Account</b></h5>
   </div><!--/.form-group -->
   <div id="auth-login-retrieveAccountWithoutInfoForm-sQ-warnErrorMsg" class="form-group"></div><!--/.form-group -->
   <div id="auth-login-retrieveAccountWithoutInfoForm-securityQ-q1" class="form-group"></div><!--/.form-group -->
   <div class="form-group">
     <input id="auth-login-retrieveAccountWithoutInfoForm-securityQ-a1" class="form-control" placeholder="Enter Answer"/>
   </div><!--/.form-group -->
   <div id="auth-login-retrieveAccountWithoutInfoForm-securityQ-q2" class="form-group"></div><!--/.form-group -->
   <div class="form-group">
	 <input id="auth-login-retrieveAccountWithoutInfoForm-securityQ-a2" class="form-control" placeholder="Enter Answer"/>
   </div><!--/.form-group -->
   <div id="auth-login-retrieveAccountWithoutInfoForm-securityQ-q3" class="form-group"></div><!--/.form-group -->
   <div class="form-group">
     <input id="auth-login-retrieveAccountWithoutInfoForm-securityQ-a3" class="form-control" placeholder="Enter Answer"/>
   </div><!--/.form-group -->
   <div class="form-group">
	  <button class="btn btn-default form-control" 
	  onclick="javascript:submit_auth_login_retrieveAccountWithoutInfoForm_validateSQ();"><b>Retrieve your Account</b></button>
   </div><!--/.form-group -->
   <!-- -->
 </div><!--/#auth-login-retrieveAccountWithoutInfoForm-securityQ -->
 <!-- -->
 <div id="auth-login-retrieveAccountWithoutInfoForm-changePasswordForm" class="hide-block">
 <!-- -->
   <div align="center" class="form-group" style="color:#fff5c4;">
	 <h5><b>Change Mobile Number and Password to secure your Account</b></h5>
   </div><!--/.form-group -->
   <div id="auth-login-retrieveAccountWithoutInfoForm-changePassword-warnErrorMsg" class="form-group"></div><!--/.form-group -->
   <div class="form-group">
   <!-- -->
     <div class="input-group">
       <div class="input-group-btn">
	   <!-- -->
	     <div class="dropdown">
	        <button class="btn btn-default dropdown-toggle"  style="border-radius:0px;"type="button" 
			data-toggle="dropdown">+91 <span class="caret"></span></button>
			   <ul class="dropdown-menu">
				  <li><a href="#">+91</a></li>
			   </ul>
		 </div>
	   <!-- -->
      </div><!--/.input-btn-group -->
      <input id="auth-login-retrieveAccountWithoutInfoForm-changePassword-newMobile" class="form-control" placeholder="Enter Mobile Number"/>
      <div class="input-group-btn">
	     <button id="auth-login-retrieveAccountWithoutInfoForm-changePassword-verifyBtn" class="btn btn-default" 
		    onclick="javascript:submit_auth_login_retrieveAccountWithoutInfoForm_changePwdForm_verifyMobile();"><b>Verify</b></button>
		 <button id="auth-login-retrieveAccountWithoutInfoForm-changePassword-changeBtn" class="btn btn-default hide-block" 
		    onclick="javascript:submit_auth_login_retrieveAccountWithoutInfoForm_changePwdForm_changeMobile();"><b>Change</b></button>
      </div><!--/.input-btn-group -->
     </div><!--/.input-group --> 
   <!-- -->
   </div><!--/.form-group -->
   <div id="auth-login-retrieveAccountWithoutInfoForm-changePassword-verifyMobileForm" class="form-group hide-block">
     <div class="input-group">
	    <input id="auth-login-retrieveAccountWithoutInfoForm-changePassword-otpcode" class="form-control" placeholder="Enter OTP Code"/>
	   <div class="input-group-btn">
	     <button id="auth-login-retrieveAccountWithoutInfoForm-changePassword-validateOTPBtn" class="btn btn-default" 
		    onclick="javascript:submit_auth_login_retrieveAccountWithoutInfoForm_changePwdForm_validateOTPCode();"><b>Validate</b></button>
	   </div><!--/.input-group-btn -->
	 </div><!--/.input-group -->
   </div><!--/.form-group -->
   <div class="form-group">
	 <input id="auth-login-retrieveAccountWithoutInfoForm-changePassword-newPassword" 
	 type="password" class="form-control" placeholder="Enter your Password"/>
   </div><!--/.form-group -->
   <div class="form-group">
	 <input id="auth-login-retrieveAccountWithoutInfoForm-changePassword-confirmpassword" 
	 type="password" class="form-control" placeholder="Enter your Confirm Password"/>
   </div><!--/.form-group -->
   <div class="form-group">
	  <button class="btn btn-default form-control" onclick="javascript:submit_auth_login_retrieveAccountWithoutInfoForm_changePwdForm_validateOTPCode_savePwdAndMobile();"><b>Update the Information</b></button>
   </div><!--/.form-group -->
   <!-- -->
 </div><!--/.col-xs-12 -->
 <!-- -->
 </div><!--/#auth-login-retrieveAccountWithoutInfoForm -->
 </div>
 </div><!--/#auth-login-retrieveAccountWithoutInfoForm -->
 