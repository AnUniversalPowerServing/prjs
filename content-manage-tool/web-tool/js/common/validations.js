/**********************************************************************************************************************/
/************************************* VALIDATIONS ********************************************************************/
/**********************************************************************************************************************/
var VALIDATION_MESSAGE_ERROR='';
function show_validate_msg(mode,div_Id){
 VALIDATION_MESSAGE_ERROR=VALIDATION_MESSAGE_ERROR.substring(0, VALIDATION_MESSAGE_ERROR.length - 1);
 console.log("VALIDATION_MESSAGE_ERROR: "+VALIDATION_MESSAGE_ERROR);
 if(mode==='error'){ bootstrap_message_error(div_Id,VALIDATION_MESSAGE_ERROR); }
 else if(mode==='success'){ bootstrap_message_success(div_Id,VALIDATION_MESSAGE_ERROR); }
}

function core_validate_allowOnlyNumeric(evt) {
 evt = (evt) ? evt : window.event;
 var charCode = (evt.which) ? evt.which : evt.keyCode;
 if(charCode > 31 && (charCode < 48 || charCode > 57)){ return false; }
 return true;
}

function core_validate_allowOnlyAlphabets(evt) {
 evt = (evt) ? evt : window.event;
 var charCode = (evt.which) ? evt.which : evt.keyCode;
  if(!(charCode >= 65 && charCode <= 120) && (charCode != 32 && charCode != 0)) { return false; }
 return true;
}

function validate_surName(auth_reg_surName){
  var surName = $("#"+auth_reg_surName).val();
  var status = false;
  if(surName.length>0){ 
    status = true;VALIDATION_MESSAGE_ERROR+='';
    bootstrap_formField_trigger('success',auth_reg_surName); 
  } else {  
    bootstrap_formField_trigger('error',auth_reg_surName);
	VALIDATION_MESSAGE_ERROR+=' Surname,';
  }
  return status;
}
function validate_name(auth_reg_name){
  var name = $("#"+auth_reg_name).val();
  var status = false;
  if(name.length>0){ 
    status = true;VALIDATION_MESSAGE_ERROR+='';
    bootstrap_formField_trigger('success',auth_reg_name); }
  else { 
    bootstrap_formField_trigger('error',auth_reg_name);
	VALIDATION_MESSAGE_ERROR+=' Name,';
  }
  return status;
}
function validate_gender(auth_reg_gender){
  var gender = $("#"+auth_reg_gender).val();
  var status = false;
  if(gender.length>0){ 
     status = true;VALIDATION_MESSAGE_ERROR+='';
	 bootstrap_formField_trigger('success',auth_reg_gender); 
  } else { 
     bootstrap_formField_trigger('error',auth_reg_gender);
     VALIDATION_MESSAGE_ERROR+=' Gender,';
  }
  return status;
}
function validate_mobile(auth_reg_mobile){
  var mobile = $("#"+auth_reg_mobile).val();
  var status = false;
  if(mobile.length>0 && mobile.length===10){ 
    status = true;VALIDATION_MESSAGE_ERROR+='';
	bootstrap_formField_trigger('success',auth_reg_mobile); 
  } else if(mobile.length>0 && mobile.length<10){ 
	bootstrap_formField_trigger('error',auth_reg_mobile);
	VALIDATION_MESSAGE_ERROR+=' valid 10-digits Mobile Number,';
  } else { 
    VALIDATION_MESSAGE_ERROR+=' Mobile Number,';
    bootstrap_formField_trigger('error',auth_reg_mobile);	
  }
  return status;
}
function validate_otpcode(auth_reg_otpcode){
  var otpcode = $("#"+auth_reg_otpcode).val();
  var status = false;
  if(otpcode.length>0){ 
     if(otpcode==='12345'){
       status = true;VALIDATION_MESSAGE_ERROR+='';
	   bootstrap_formField_trigger('success',auth_reg_otpcode);
	 } else {
	    status = false;VALIDATION_MESSAGE_ERROR='Please provide Valid OTP Code that sent to your Mobile Number. ';
	    bootstrap_formField_trigger('error',auth_reg_otpcode);
	 }
  } else { 
     bootstrap_formField_trigger('error',auth_reg_otpcode);
	 VALIDATION_MESSAGE_ERROR+=' OTP Code,';
  }
  return status;
}
function validate_password(auth_reg_password){
  var password = $("#"+auth_reg_password).val();
  var status = false;
  if(password.length===0){
	bootstrap_formField_trigger('error',auth_reg_password);
	VALIDATION_MESSAGE_ERROR+=' Password,';
  } else if(password.length>=8){ 
     status = true;VALIDATION_MESSAGE_ERROR+='';
	 bootstrap_formField_trigger('success',auth_reg_password); 
  } else { 
    bootstrap_formField_trigger('error',auth_reg_password);
	VALIDATION_MESSAGE_ERROR+=' Password should contain minimum 8-Alphanumeric Characters,';
  }
  return status;
}
function validate_confirmPassword(auth_reg_password, auth_reg_confirmPassword){
  var password = $("#"+auth_reg_password).val();
  var confirmPassword = $("#"+auth_reg_confirmPassword).val();
  var status = false;
  if(password.length>=8){
    if(password === confirmPassword){ 
       status = true;VALIDATION_MESSAGE_ERROR+='';
       bootstrap_formField_trigger('success',auth_reg_confirmPassword); 
    } else { 
       bootstrap_formField_trigger('error',auth_reg_confirmPassword);
	   VALIDATION_MESSAGE_ERROR='Password and Confirm Password doesn\'t Match,';
    }
  } else { 
     VALIDATION_MESSAGE_ERROR='Your Password should be atleast 8-charaters,';
	 bootstrap_formField_trigger('error',auth_reg_password);
	 bootstrap_formField_trigger('error',auth_reg_confirmPassword);
	 
  }
  return status;
}
function validate_securityQA(auth_reg_sQ1, auth_reg_a1, auth_reg_sQ2, auth_reg_a2, 
				auth_reg_sQ3, auth_reg_a3){
  var sQ1 = $("#"+auth_reg_sQ1).val();
  var a1 = $("#"+auth_reg_a1).val();
  var sQ2 = $("#"+auth_reg_sQ2).val();
  var a2 = $("#"+auth_reg_a2).val();
  var sQ3 = $("#"+auth_reg_sQ3).val();
  var a3 = $("#"+auth_reg_a3).val();
  var status = true;
  if(sQ1.length===0){ 
    status = false;VALIDATION_MESSAGE_ERROR+=' Security Question #1,';
	bootstrap_formField_trigger('error',auth_reg_sQ1); 
  } else { 
    bootstrap_formField_trigger('success',auth_reg_sQ1);
    VALIDATION_MESSAGE_ERROR+='';
  }
  if(a1.length===0){ 
    status = false;VALIDATION_MESSAGE_ERROR+=' Answer for Security Question #1,';
	bootstrap_formField_trigger('error',auth_reg_a1);
  } else { 
    bootstrap_formField_trigger('success',auth_reg_a1);
	VALIDATION_MESSAGE_ERROR+='';
  }
  if(sQ2.length===0){ 
    status = false;VALIDATION_MESSAGE_ERROR+=' Security Question #2,';
	bootstrap_formField_trigger('error',auth_reg_sQ2);
  } else { 
    bootstrap_formField_trigger('success',auth_reg_sQ2);
	VALIDATION_MESSAGE_ERROR+='';
  }
  if(a2.length===0){ 
    status = false;VALIDATION_MESSAGE_ERROR+=' Answer for Security Question #2,';
	bootstrap_formField_trigger('error',auth_reg_a2); }
  else { 
    bootstrap_formField_trigger('success',auth_reg_a2);
	VALIDATION_MESSAGE_ERROR+='';
  }
  if(sQ3.length===0){ 
    status = false;VALIDATION_MESSAGE_ERROR+=' Security Question #3,';
	bootstrap_formField_trigger('error',auth_reg_sQ3); }
  else { 
    bootstrap_formField_trigger('success',auth_reg_sQ3);
	VALIDATION_MESSAGE_ERROR+='';
  }
  if(a3.length===0){ 
    status = false;VALIDATION_MESSAGE_ERROR+=' Answer for Security Question #3,';
	bootstrap_formField_trigger('error',auth_reg_a3); }
  else { 
    bootstrap_formField_trigger('success',auth_reg_a3); 
	VALIDATION_MESSAGE_ERROR+='';
  }
  return status;
}