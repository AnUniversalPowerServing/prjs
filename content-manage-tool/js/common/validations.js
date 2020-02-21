/**********************************************************************************************************************/
/************************************* VALIDATIONS ********************************************************************/
/**********************************************************************************************************************/
function validate_surName(auth_reg_surName){
  var surName = $("#"+auth_reg_surName).val();
  var status = false;
  if(surName.length>0){ status = true;bootstrap_formField_trigger('success',auth_reg_surName); }
  else {  bootstrap_formField_trigger('error',auth_reg_surName); }
  return status;
}
function validate_name(auth_reg_name){
  var name = $("#"+auth_reg_name).val();
  var status = false;
  if(name.length>0){ status = true;bootstrap_formField_trigger('success',auth_reg_name); }
  else { bootstrap_formField_trigger('error',auth_reg_name); }
  return status;
}
function validate_gender(auth_reg_gender){
  var gender = $("#"+auth_reg_gender).val();
  var status = false;
  if(gender.length>0){ status = true;bootstrap_formField_trigger('success',auth_reg_gender); }
  else { bootstrap_formField_trigger('error',auth_reg_gender); }
  return status;
}
function validate_mobile(auth_reg_mobile){
  var mobile = $("#"+auth_reg_mobile).val();
  var status = false;
  if(mobile.length>0){ status = true;bootstrap_formField_trigger('success',auth_reg_mobile); }
  else { bootstrap_formField_trigger('error',auth_reg_mobile); }
  return status;
}
function validate_otpcode(auth_reg_otpcode){
  var otpcode = $("#"+auth_reg_otpcode).val();
  var status = false;
  if(otpcode.length>0){ status = true;bootstrap_formField_trigger('success',auth_reg_otpcode); }
  else { bootstrap_formField_trigger('error',auth_reg_otpcode); }
  return status;
}
function validate_password(auth_reg_password){
  var password = $("#"+auth_reg_password).val();
  var status = false;
  if(password.length>0){ status = true;bootstrap_formField_trigger('success',auth_reg_password); }
  else { bootstrap_formField_trigger('error',auth_reg_password); }
  return status;
}
function validate_confirmPassword(auth_reg_password, auth_reg_confirmPassword){
  var password = $("#"+auth_reg_password).val();
  var confirmPassword = $("#"+auth_reg_confirmPassword).val();
  var status = false;
  if(password === confirmPassword){ 
    status = true; 
	bootstrap_formField_trigger('success',auth_reg_password);
    bootstrap_formField_trigger('success',auth_reg_confirmPassword); 
  }
  else { 
    bootstrap_formField_trigger('error',auth_reg_password);
    bootstrap_formField_trigger('error',auth_reg_confirmPassword); 
  }
  return status;
}
function validate_securityQA(auth_reg_sQ1, auth_reg_a1, auth_reg_sQ2, auth_reg_a2, auth_reg_sQ3, auth_reg_a3){
  var sQ1 = $("#"+auth_reg_sQ1).val();
  var a1 = $("#"+auth_reg_a1).val();
  var sQ2 = $("#"+auth_reg_sQ2).val();
  var a2 = $("#"+auth_reg_a2).val();
  var sQ3 = $("#"+auth_reg_sQ3).val();
  var a3 = $("#"+auth_reg_a3).val();
  var status = true;
  if(sQ1.length===0){ status = false;bootstrap_formField_trigger('error',auth_reg_sQ1); }
  else { bootstrap_formField_trigger('success',auth_reg_sQ1); }
  if(a1.length===0){ status = false;bootstrap_formField_trigger('error',auth_reg_a1); }
  else { bootstrap_formField_trigger('success',auth_reg_a1); }
  if(sQ2.length===0){ status = false;bootstrap_formField_trigger('error',auth_reg_sQ2); }
  else { bootstrap_formField_trigger('success',auth_reg_sQ2); }
  if(a2.length===0){ status = false;bootstrap_formField_trigger('error',auth_reg_a2); }
  else { bootstrap_formField_trigger('success',auth_reg_a2); }
  if(sQ3.length===0){ status = false;bootstrap_formField_trigger('error',auth_reg_sQ3); }
  else { bootstrap_formField_trigger('success',auth_reg_sQ3); }
  if(a3.length===0){ status = false;bootstrap_formField_trigger('error',auth_reg_a3); }
  else { bootstrap_formField_trigger('success',auth_reg_a3); }
  return status;
}