<script type="text/javascript">
var auth_login_htmlElements = { auth_login_rAWoIForm_warnErrorMsg:'auth-login-retrieveAccountWithoutInfoForm-warnErrorMsg',
	 auth_login_rAWoIForm_mobile:'auth-login-retrieveAccountWithoutInfoForm-mobile',
	 auth_login_rAWoIForm_mobile_verifyBtn:'auth-login-retrieveAccountWithoutInfoForm-mobile-verifyBtn', 
	 auth_login_rAWoIForm_mobile_changeBtn:'auth-login-retrieveAccountWithoutInfoForm-mobile-changeBtn',
	 auth_login_rAWoIForm:'auth-login-retrieveAccountWithoutInfoForm-init',
	 auth_login_rAWoIForm_securityQForm:'auth-login-retrieveAccountWithoutInfoForm-securityQForm',
	 auth_login_rAWoIForm_changePasswordForm:'auth-login-retrieveAccountWithoutInfoForm-changePasswordForm',
	 auth_login_rAWoIForm_securityQForm_warnErrorMsg:'auth-login-retrieveAccountWithoutInfoForm-sQ-warnErrorMsg',
	 auth_login_rAWoIForm_securityQForm_securityQ1:'auth-login-retrieveAccountWithoutInfoForm-securityQ-q1',
	 auth_login_rAWoIForm_securityQForm_securityQ1Id:'auth-login-retrieveAccountWithoutInfoForm-securityQ-q1Id',
	 auth_login_rAWoIForm_securityQForm_securityQ2:'auth-login-retrieveAccountWithoutInfoForm-securityQ-q2',
	 auth_login_rAWoIForm_securityQForm_securityQ2Id:'auth-login-retrieveAccountWithoutInfoForm-securityQ-q2Id',
	 auth_login_rAWoIForm_securityQForm_securityQ3:'auth-login-retrieveAccountWithoutInfoForm-securityQ-q3',
	 auth_login_rAWoIForm_securityQForm_securityQ3Id:'auth-login-retrieveAccountWithoutInfoForm-securityQ-q3Id',
	 auth_login_rAWoIForm_securityQForm_securityA1:'auth-login-retrieveAccountWithoutInfoForm-securityQ-a1',
	 auth_login_rAWoIForm_securityQForm_securityA2:'auth-login-retrieveAccountWithoutInfoForm-securityQ-a2',
	 auth_login_rAWoIForm_securityQForm_securityA3:'auth-login-retrieveAccountWithoutInfoForm-securityQ-a3',
	 auth_login_rAWoIForm_changePassword_warnErrorMsg:'auth-login-retrieveAccountWithoutInfoForm-changePassword-warnErrorMsg',
	 auth_login_rAWoIForm_changePassword_newMobile:'auth-login-retrieveAccountWithoutInfoForm-changePassword-newMobile',
	 auth_login_rAWoIForm_changePassword_newPassword:'auth-login-retrieveAccountWithoutInfoForm-changePassword-newPassword',
	 auth_login_rAWoIForm_changePassword_confirmpassword:'auth-login-retrieveAccountWithoutInfoForm-changePassword-confirmpassword'
		}; 
function trigger_userAccounts_auth_login_rAWoIForm(){
 showHide_auth_accountAccessForm('auth-login-access-userAccountForm');
} 
function showHide_auth_login_retrieveAccountWithoutInfoForm_mobileVerifyChangeBtn(view){
 if(view=='verifyBtn'){
  if($('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile_verifyBtn).hasClass('hide-block')){
   $('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile_verifyBtn).removeClass('hide-block');
  }
  if(!$('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile_changeBtn).hasClass('hide-block')){
   $('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile_changeBtn).addClass('hide-block');
  }
 } else if(view=='changeBtn'){
   if(!$('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile_verifyBtn).hasClass('hide-block')){
     $('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile_verifyBtn).addClass('hide-block');
   }
   if($('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile_changeBtn).hasClass('hide-block')){
   $('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile_changeBtn).removeClass('hide-block');
  }
 }
}  
function showHide_auth_login_retrieveAccountWithoutInfoForm_sQcP(id){
 var arry_Id=[auth_login_htmlElements.auth_login_rAWoIForm_securityQForm,auth_login_htmlElements.auth_login_rAWoIForm_changePasswordForm];
 for(var index=0;index<arry_Id.length;index++){
   if(arry_Id[index]===id){
     if($('#'+arry_Id[index]).hasClass('hide-block')){ $('#'+arry_Id[index]).removeClass('hide-block'); }
   } else {
     if(!$('#'+arry_Id[index]).hasClass('hide-block')){ $('#'+arry_Id[index]).addClass('hide-block'); }
   }
 }
}
var AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ1;
var AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ2;
var AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ3;
function ui_auth_login_retrieveAccountWithoutInfoForm_userInfo(response){
 /*var content='<table>';
	 content+='<tr><td><label>Surname</label></td><td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td><td>'+response[0].surName+'</td></tr>';
     content+='<tr><td><label>Name</label></td><td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td><td>'+response[0].name+'</td></tr>';
	 content+='<tr><td><label>Gender</label></td><td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td><td>'+response[0].gender+'</td></tr>';
	 content+='</table>';
  document.getElementById(div_Id).innerHTML=content; */
  AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ1=response[0].qq1;
  AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ2=response[0].qq2;
  AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ3=response[0].qq3;
  var sQ1='<h5><b>Q1: '+AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ1+'</b></h5>';
	  sQ1+='<input type="hidden" id="'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ1Id+'" value="'+response[0].q1+'"/>';
  var sQ2='<h5><b>Q1: '+AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ2+'</b></h5>';
	  sQ2+='<input type="hidden" id="'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ2Id+'" value="'+response[0].q2+'"/>';
  var sQ3='<h5><b>Q1: '+AUTH_LOGIN_RAWOIFORM_SECURITYQFORM_SECURITYQ3+'</b></h5>';
	  sQ3+='<input type="hidden" id="'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ3Id+'" value="'+response[0].q3+'"/>';	  
  document.getElementById(auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ1).innerHTML=sQ1;
  document.getElementById(auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ2).innerHTML=sQ2;
  document.getElementById(auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ3).innerHTML=sQ3;
}
function submit_auth_login_retrieveAccountWithoutInfoForm_verifyMobile(){
/* -----------------------------------
 * Function Description:
 * -----------------------------------
 *
 */
 VALIDATION_MESSAGE_ERROR='Please provide';
 var mobCode = '+91';
 var mobile = $('#'+auth_login_htmlElements.auth_login_rAWoIForm_mobile).val();
 if(validate_mobile(auth_login_htmlElements.auth_login_rAWoIForm_mobile)){
   js_ajax('GET','backend/php/dac/controller.accounts.user.auth.php',{ action:'USER_AUTH_LOGIN', mobile:mobile }, 
   function(response){
     if(response.length>0){
	   showHide_auth_login_retrieveAccountWithoutInfoForm_mobileVerifyChangeBtn('changeBtn');
	   document.getElementById(auth_login_htmlElements.auth_login_rAWoIForm_mobile).disabled=true;
	   showHide_auth_login_retrieveAccountWithoutInfoForm_sQcP(auth_login_htmlElements.auth_login_rAWoIForm_securityQForm);
       ui_auth_login_retrieveAccountWithoutInfoForm_userInfo(response);
       js_show('show',auth_login_htmlElements.auth_login_rAWoIForm);
	   document.getElementById(auth_login_htmlElements.auth_login_rAWoIForm_warnErrorMsg).innerHTML='';
	   bootstrap_formField_trigger('success',auth_login_htmlElements.auth_login_rAWoIForm_mobile);
     } else {
	    showHide_auth_login_retrieveAccountWithoutInfoForm_mobileVerifyChangeBtn('verifyBtn');
	    VALIDATION_MESSAGE_ERROR='Mobile Number <b>"'+mobCode+'-'+mobile+'"</b> is not registered. Please Create your New Account,';
		show_validate_msg('error',auth_login_htmlElements.auth_login_rAWoIForm_warnErrorMsg);
		js_show('hide',auth_login_htmlElements.auth_login_rAWoIForm);
		bootstrap_formField_trigger('error',auth_login_htmlElements.auth_login_rAWoIForm_mobile);
	 }
   });
 } else { show_validate_msg('error',auth_login_htmlElements.auth_login_rAWoIForm_warnErrorMsg); }
}
function submit_auth_login_retrieveAccountWithoutInfoForm_changeMobile(){
 showHide_auth_login_retrieveAccountWithoutInfoForm_mobileVerifyChangeBtn('verifyBtn');
 document.getElementById(auth_login_htmlElements.auth_login_rAWoIForm_mobile).disabled=false;
 bootstrap_formField_trigger('remove',auth_login_htmlElements.auth_login_rAWoIForm_mobile);
 js_show('hide',auth_login_htmlElements.auth_login_rAWoIForm);
 reset_auth_login_retrieveAccountWithoutInfoForm_validateSQForm();
 reset_auth_login_retrieveAccountWithoutInfoForm_changePwdForm();
}
function reset_auth_login_retrieveAccountWithoutInfoForm_validateSQForm(){
 document.getElementById(auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_warnErrorMsg).innerHTML='';
 $('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA1).val('');
 $('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA2).val('');
 $('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA3).val('');
}
function submit_auth_login_retrieveAccountWithoutInfoForm_validateSQ(){
 var auth_reg_q1=$('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ1Id).val();
 var auth_reg_q2=$('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ2Id).val();
 var auth_reg_q3=$('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ3Id).val();
 var auth_reg_a1=$('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA1).val();
 var auth_reg_a2=$('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA2).val();
 var auth_reg_a3=$('#'+auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA3).val();
 if(validate_securityQA(auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ1Id, 
						auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA1, 
						auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ2Id, 
						auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA2, 
						auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityQ3Id, 
						auth_login_htmlElements.auth_login_rAWoIForm_securityQForm_securityA3)){
   showHide_auth_login_retrieveAccountWithoutInfoForm_sQcP(auth_login_htmlElements.auth_login_rAWoIForm_changePasswordForm);
   // Call the Endpoint and show Change Password Form
 }
}
function reset_auth_login_retrieveAccountWithoutInfoForm_changePwdForm(){
 document.getElementById(auth_login_htmlElements.auth_login_rAWoIForm_changePassword_warnErrorMsg).innerHTML='';
 $('#'+auth_login_htmlElements.auth_login_rAWoIForm_changePassword_newMobile).val('');
 $('#'+auth_login_htmlElements.auth_login_rAWoIForm_changePassword_newPassword).val('');
 $('#'+auth_login_htmlElements.auth_login_rAWoIForm_changePassword_confirmpassword).val('');
}
function submit_auth_login_retrieveAccountWithoutInfoForm_changePwd(){

}
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
	  <button id="auth-login-retrieveAccountWithoutInfoForm-mobile-verifyBtn" class="btn btn-default hide-block" 
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
	 <h5><b>Change Mobile Number and Password to secure Account</b></h5>
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
	     <button id="auth-reg-genInfo-mobile-validateOTPBtn" class="btn btn-default" 
		    onclick=""><b>Verify</b></button>
      </div><!--/.input-btn-group -->
     </div><!--/.input-group -->
   <!-- -->
   </div><!--/.form-group -->
   <div class="form-group">
	 <input id="auth-login-retrieveAccountWithoutInfoForm-changePassword-newPassword" class="form-control" placeholder="Enter your Password"/>
   </div><!--/.form-group -->
   <div class="form-group">
	 <input id="auth-login-retrieveAccountWithoutInfoForm-changePassword-confirmpassword" class="form-control" placeholder="Enter your Confirm Password"/>
   </div><!--/.form-group -->
   <div class="form-group">
	  <button class="btn btn-default form-control"><b>Change Password</b></button>
   </div><!--/.form-group -->
   <!-- -->
 </div><!--/.col-xs-12 -->
 <!-- -->
 </div><!--/#auth-login-retrieveAccountWithoutInfoForm -->
 </div>
 </div><!--/#auth-login-retrieveAccountWithoutInfoForm -->
 