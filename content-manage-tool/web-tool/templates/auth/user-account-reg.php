<!-- -->
<div align="center"><h4 class="mbot35p"><b>Create an Account</b></h4></div>
<!-- -->
<!-- -->
<div class="step-badges">
 <div align="center" class="col-xs-4">
   <span id="badge-auth-reg-genInfo" class="badge active"onclick="javascript:sel_auth_badges(this.id);">1</span>
 </div><!--/.col-xs-4 -->
 <div align="center" class="col-xs-4">
   <span id="badge-auth-reg-setPassword" class="badge" onclick="javascript:sel_auth_badges(this.id);">2</span>
 </div><!--/.col-xs-4 -->
 <div align="center" class="col-xs-4">
   <span id="badge-auth-reg-securityQ" class="badge" onclick="javascript:sel_auth_badges(this.id);">3</span>
 </div><!--/.col-xs-4 -->
</div><!--/.step-badges -->
<!-- -->
<div style="padding-left:20px;padding-right:20px;margin-top:15px;">
 <div id="auth-reg-genInfo" class="hide-block">
 <!-- -->
   <div align="center" class="form-group" style="color:#fff5c4;">
	 <h5><b>Provide Basic Information to create Account</b></h5>
   </div><!--/.form-group -->
   <div id="auth-reg-genInfo-warnErrorMsg" class="form-group"></div><!--/.form-group -->
   <div class="form-group">
	 <input id="auth-reg-genInfo-surName" class="form-control" placeholder="Enter Surname" 
	  onkeypress="javascript:return core_validate_allowOnlyAlphabets(event);"/>
   </div><!--/.form-group -->
   <div class="form-group">
	 <input id="auth-reg-genInfo-name" class="form-control" placeholder="Enter Name" 
	  onkeypress="javascript:return core_validate_allowOnlyAlphabets(event);"/>
   </div><!--/.form-group -->
   <div class="form-group">
	 <select id="auth-reg-genInfo-gender" class="form-control">
		<option value="">Select your Gender</option>
		<option value="MALE">Male</option>
		<option value="FEMALE">Female</option>
	 </select>
   </div><!--/.form-group -->
   <div class="form-group">
	 <div class="input-group">
	   <div class="input-group-btn">
		  <!-- -->
		  <div class="dropdown">
			<button id="auth-reg-genInfo-mobilecode" class="btn btn-default dropdown-toggle"  style="border-radius:0px;"type="button" data-toggle="dropdown">+91
			  <span class="caret"></span></button>
			  <ul class="dropdown-menu">
				<li><a href="#">+91</a></li>
			  </ul>
		   </div>
		  <!-- -->
	   </div><!--/.input-btn-group -->
	   <input id="auth-reg-genInfo-mobile" class="form-control" placeholder="Enter Mobile Number" 
	    onkeypress="javascript:return core_validate_allowOnlyNumeric(event);"/>
	   <div class="input-group-btn">
		  <button id="auth-reg-genInfo-mobile-verifyBtn" class="btn btn-default hide-block" onclick="javascript:submit_auth_reg_verifyMobile();"><b>Verify</b></button>
		  <button id="auth-reg-genInfo-mobile-changeBtn" class="btn btn-default hide-block" onclick="javascript:submit_auth_reg_changeMobile();"><b>Change</b></button>
	   </div><!--/.input-btn-group -->
     </div><!--/.input-group -->
   </div><!--/.form-group -->
   
   <div id="auth-reg-genInfo-verifyMobileForm" class="form-group hide-block">
	 <div class="input-group">
	   <input id="auth-reg-genInfo-otpcode" class="form-control" placeholder="Enter OTP Code" 
	    onkeypress="javascript:return core_validate_allowOnlyNumeric(event);"/>
	   <div class="input-group-btn">
		 <button id="auth-reg-genInfo-mobile-validateOTPBtn" class="btn btn-default" onclick="javascript:submit_auth_reg_validateOTPCode();"><b>Validate</b></button>
	   </div><!--/.input-btn-group -->
     </div><!--/.input-group -->
   </div><!--/.form-group -->
	 
   <div id="auth-reg-genInfo-moveNextForm" class="form-group hide-block">
	 <button class="btn btn-default form-control" onclick="javascript:submit_auth_reg_genInfo();"><b>Next</b></button>
   </div><!--/.form-group -->
  
   <!-- -->
 </div><!--/#auth-reg-genInfo -->
 <div id="auth-reg-setPassword" class="hide-block">
 <!-- -->
   <div align="center" class="form-group" style="color:#fff5c4;">
     <h5><b>Set Password to access your Account</b></h5>
   </div><!--/.form-group -->
   <div id="auth-reg-lock-warnErrorMsg" class="form-group"></div><!--/.form-group -->
   <div class="form-group">
     <input id="auth-reg-lock-password" type="password" class="form-control" placeholder="Enter Password"/>
   </div><!--/.form-group -->
   <div class="form-group">
     <input id="auth-reg-lock-confirmPassword" type="password" class="form-control" placeholder="Enter Confirm Password"/>
   </div><!--/.form-group -->
   <div class="form-group">
     <button id="auth-reg-lock-moveNextForm" class="btn btn-default form-control" onclick="javascript:submit_auth_reg_setPassword();"><b>Next</b></button>
   </div><!--/.form-group -->
 <!-- -->
 </div><!--/.col-xs-12 -->
 <div id="auth-reg-securityQ" class="hide-block">
 <!-- -->
   <div align="center" class="form-group" style="color:#fff5c4;">
	 <h5><b>Choose 3 Security Questions to secure Account</b></h5>
   </div><!--/.form-group -->
   <div id="auth-reg-sQ-warnErrorMsg" class="form-group"></div><!--/.form-group -->
   <div class="form-group">
     <select id="auth-reg-securityQ-sQ1" class="form-control">
       <option value="">Security Question # 1</option>
     </select>
   </div><!--/.form-group -->
   <div class="form-group">
     <input id="auth-reg-securityQ-a1" class="form-control" placeholder="Enter Answer"/>
   </div><!--/.form-group -->
   <div class="form-group">
     <select id="auth-reg-securityQ-sQ2" class="form-control">
       <option value="">Security Question # 2</option>
     </select>
   </div><!--/.form-group -->
   <div class="form-group">
	 <input id="auth-reg-securityQ-a2" class="form-control" placeholder="Enter Answer"/>
   </div><!--/.form-group -->
   <div class="form-group">
	 <select id="auth-reg-securityQ-sQ3" class="form-control">
	   <option value="">Security Question # 3</option>
	 </select>
   </div><!--/.form-group -->
   <div class="form-group">
     <input id="auth-reg-securityQ-a3" class="form-control" placeholder="Enter Answer"/>
   </div><!--/.form-group -->
   <div class="form-group">
     <button id="auth-reg-securityQ-createAccount" class="btn btn-default form-control" onclick="javascript:submit_auth_reg_securityQ();"><b>Create Account</b></button>
   </div><!--/.form-group -->
   <!-- -->
 </div><!--/.col-xs-12 -->
</div>
<!-- -->