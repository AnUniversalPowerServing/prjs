/* ===============================================================================================
 * user-account-reg.js
 * ===============================================================================================
 * User register Form consists of 3 Modules:
 * a) General Info Module Form  b) Set Password Module Form  c) Set Security Question Module Form
 * 
 */
var AUTH_REG_SURNAME;
var AUTH_REG_NAME;
var AUTH_REG_GENDER;
var AUTH_REG_MOBILE;
var AUTH_REG_OTPCODE;
var AUTH_REG_PASSWORD;
var AUTH_REG_SQ1;
var AUTH_REG_A1;
var AUTH_REG_SQ2;
var AUTH_REG_A2;
var AUTH_REG_SQ3;
var AUTH_REG_A3;
var SECURITYQUESTIONS;
var SECURITYQUESTION1;
var SECURITYQUESTION2;
var SECURITYQUESTION3;

var ALLOW_UPTO_INDEX=1; // This is used to represent Badge Index
var badge_htmlElements = { badge_menu:["badge-auth-reg-genInfo","badge-auth-reg-setPassword","badge-auth-reg-securityQ"],
						   badge_info:{ "badge-auth-reg-genInfo":{ "contents":["auth-reg-genInfo"],"functions":function(){ } },
										"badge-auth-reg-setPassword":{ "contents":["auth-reg-setPassword"],"functions":function(){ } },
										"badge-auth-reg-securityQ":{ "contents":["auth-reg-securityQ"],"functions":function(){ } }}
						   };
var auth_reg_htmlElements = { auth_reg_surName:'auth-reg-genInfo-surName', auth_reg_name:'auth-reg-genInfo-name', 
							  auth_reg_gender:'auth-reg-genInfo-gender', auth_reg_mobile:'auth-reg-genInfo-mobile', 
							  auth_reg_otpcode:'auth-reg-genInfo-otpcode', auth_reg_password:'auth-reg-lock-password',
							  auth_reg_confirmPassword:'auth-reg-lock-confirmPassword',
							  auth_reg_sQ1:'auth-reg-securityQ-sQ1', auth_reg_a1:'auth-reg-securityQ-a1',
							  auth_reg_sQ2:'auth-reg-securityQ-sQ2', auth_reg_a2:'auth-reg-securityQ-a2',
							  auth_reg_sQ3:'auth-reg-securityQ-sQ3', auth_reg_a3:'auth-reg-securityQ-a3',
							  auth_reg_genInfo_warnErrorMsg:'auth-reg-genInfo-warnErrorMsg',
							  auth_reg_lock_warnErrorMsg:'auth-reg-lock-warnErrorMsg',
							  auth_reg_sQ_warnErrorMsg:'auth-reg-sQ-warnErrorMsg',
							  verifyMobileForm:'auth-reg-genInfo-verifyMobileForm',
							  verifyMobileBtn:'auth-reg-genInfo-mobile-verifyBtn',
							  changeMobileBtn:'auth-reg-genInfo-mobile-changeBtn',
							  validateOTPBtn:'auth-reg-genInfo-mobile-validateOTPBtn',
							  genInfoMoveNextForm:'auth-reg-genInfo-moveNextForm'
							};
						
function trigger_userAccounts_auth(){
/* ===============================================================================
 * FUNCTION DESCRIPTION:
 * ===============================================================================
 *  This Function is triggered on Document gets Ready. In this function, we loads
 *  a) Select Badge Function to select Badge#1 and Display General Module Info Form.
 *  b) Displays Verify Button in the General Module Info Form.
 *  c) SurName AutoComplete Function
 */
 sel_auth_badges(badge_htmlElements.badge_menu[0]); // This is used to load General Info Module Form
 showHide_auth_reg_mobileVerifyChangeBtn('verifyBtn');
 autocomplete_surNames();
}

function sel_auth_badges(sel_Id){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used to Badge and its Content-Form based on "sel_Id" that supplies.
 * IF sel_Id -> badge_htmlElements.badge_menu[0] (loads General Info Module Form)
 *           -> badge_htmlElements.badge_menu[1] (loads Set Password Module Form)
 *           -> badge_htmlElements.badge_menu[2] (loads Set Security Questions Module Form)
 */
  bootstrap_menu_trigger(badge_htmlElements.badge_info,'badges', sel_Id,ALLOW_UPTO_INDEX);
}

/* ===============================================================================================
 * GENERAL INFO MODULE FORM:
 * ===============================================================================================
 * This form consists of following fields:
 * a) SurName b) Name c) Gender d) MobileCode e) Mobile f) Verify and Change Button
 * g) OTPCode h) Validate OTP Code Button i) Next Button (To proceed to Set Password Module Form)
 * ----------------------------------
 * Functions on this Module:
 * ----------------------------------
 * a) autocomplete_surNames() - AutoComplete list of existsing SurNames
 * b) showHide_auth_reg_mobileVerifyChangeBtn(view) - Toggling between VerifyButton and Change Button
 * c) reset_auth_reg_otpForm() - To Reset OTPCode Form Fields
 * d) showHide_auth_reg_otpForm(mode) - Toggles to Show/hide OTP Code Form
 * e) showHide_auth_reg_genInfoNext(mode) - Toggles to Show/hide Next Button (Proceed to move to
 *                                          Set Password Module Form)
 * f) submit_auth_reg_changeMobile() - Triggered When Change Button is clicked
 * g)
 */

function autocomplete_surNames(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used loads list of SurNames of Users who already Register as an 
 * AutoComplete from user_accounts_auth table
 */ 
 authEndpoints.userAccounts_autocomplete_surNames(function(response){ 
	$("#"+auth_reg_htmlElements.auth_reg_surName).autocomplete({ source:response }); 
 });
}

function showHide_auth_reg_mobileVerifyChangeBtn(view){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This function is used to Toggle Verify and Change Button.
 * IF view -> verifyBtn (Shows Verify Button and hides Change Button)
 *         -> changeBtn (Shows Change Button and hides Verify Button)
 */
 if(view=='verifyBtn'){
  if($('#'+auth_reg_htmlElements.verifyMobileBtn).hasClass('hide-block')){
   $('#'+auth_reg_htmlElements.verifyMobileBtn).removeClass('hide-block');
  }
  if(!$('#'+auth_reg_htmlElements.changeMobileBtn).hasClass('hide-block')){
   $('#'+auth_reg_htmlElements.changeMobileBtn).addClass('hide-block');
  }
 } else if(view=='changeBtn'){
   if(!$('#'+auth_reg_htmlElements.verifyMobileBtn).hasClass('hide-block')){
     $('#'+auth_reg_htmlElements.verifyMobileBtn).addClass('hide-block');
   }
   if($('#'+auth_reg_htmlElements.changeMobileBtn).hasClass('hide-block')){
   $('#'+auth_reg_htmlElements.changeMobileBtn).removeClass('hide-block');
  }
 }
}

function reset_auth_reg_otpForm(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 *  OTP Code Form consists of 
 *   a) OTP Code Input Field   b) Validate OTP Button.
 *  This Function is used to reset OTP Code Form with following tasks:
 *  a) OTP Code Input Field -> Value Empty and Editable
 *  b) Validate OTP Button  -> Clickable
 *  c) Remove - Success / Error validation Icons on these Fields
 * This Function is triggered from:
 *  a) showHide_auth_reg_otpForm(mode)
 */
 $("#"+auth_reg_htmlElements.auth_reg_otpcode).val('');
 document.getElementById(auth_reg_htmlElements.auth_reg_otpcode).disabled=false;
 document.getElementById(auth_reg_htmlElements.validateOTPBtn).disabled=false;
 bootstrap_formField_trigger('remove',auth_reg_htmlElements.auth_reg_otpcode);
}

function showHide_auth_reg_otpForm(mode){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used to toggle OTP Code Form in showing and hiding in the View.
 * When this Function is triggered, hides Next Button
 * IF mode -> show ( Does: a) Shows OTP Code Form
 *                         b) Hides Verify Button and Shows Change Button
 *                         c) Mobile Number Input Field -> Non-Editable 
 *                         d) Resets OTP Code Form )
 *         -> hide (Does: a) Hides OTP Code Form
 *                        b) Shows Verify Button and Hides Change Button
 *                        c) Remove - Success / Error validation Icons on Mobile Code Dropdown, 
 *                           Mobile Number Input and Verify Button Fields
 *                        d) Mobile Number Input Field -> Value Empty and Editable
 */
  showHide_auth_reg_genInfoNext('hide'); // Hides Next Button
  if(mode=='show'){
    // Code to Show OTP Code Form
    if($('#'+auth_reg_htmlElements.verifyMobileForm).hasClass('hide-block')){
       $('#'+auth_reg_htmlElements.verifyMobileForm).removeClass('hide-block');
    }
    showHide_auth_reg_mobileVerifyChangeBtn('changeBtn'); // Hides Verify Button and Shows Change Button
	  document.getElementById(auth_reg_htmlElements.auth_reg_mobile).disabled=true; // Non-Editable 
	  reset_auth_reg_otpForm();  // Reset OTP Code Form
  } else if(mode=='hide'){
     // Code to Hide OTP Code Form
     if(!$('#'+auth_reg_htmlElements.verifyMobileForm).hasClass('hide-block')){
       $('#'+auth_reg_htmlElements.verifyMobileForm).addClass('hide-block');
     }
	   showHide_auth_reg_mobileVerifyChangeBtn('verifyBtn'); // Shows Verify Button and Hides Change Button
     bootstrap_formField_trigger('remove',auth_reg_htmlElements.auth_reg_mobile); // Remove - Success / Error validation Icons
     document.getElementById(auth_reg_htmlElements.auth_reg_mobile).disabled=false; // Editable 
     $("#"+auth_reg_htmlElements.auth_reg_mobile).val(''); // Value Empty
  }
}

function showHide_auth_reg_genInfoNext(mode){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used to toggle Next Button (Procced to Set Password Module Form).
 * IF mode -> show ( Displays Next Button )
 *         -> Hide ( Hides Next Button )
 */
    if($('#'+auth_reg_htmlElements.genInfoMoveNextForm).hasClass('hide-block') && mode=='show'){
       $('#'+auth_reg_htmlElements.genInfoMoveNextForm).removeClass('hide-block');
    }
    if(!$('#'+auth_reg_htmlElements.genInfoMoveNextForm).hasClass('hide-block') && mode=='hide'){
       $('#'+auth_reg_htmlElements.genInfoMoveNextForm).addClass('hide-block');
    }
}

function submit_auth_reg_changeMobile(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is triggered When Change Button is clicked.
 * DOES: a) Set Badge#1
 *       b) Alert Message is set to Empty
 *       c) Hides Change Button, shows Verify Button and Hides OTP Code Form. 
 */
 ALLOW_UPTO_INDEX=1; // Set Badge#1
 document.getElementById(auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg).innerHTML=''; // Alert Message is set to Empty
 showHide_auth_reg_otpForm('hide'); // Hides Change Button, shows Verify Button and Hides OTP Code Form
}

function submit_auth_reg_verifyMobile(){
 VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
 var valid_surName = validate_surName(auth_reg_htmlElements.auth_reg_surName);
 var valid_name = validate_name(auth_reg_htmlElements.auth_reg_name);
 var valid_gender = validate_gender(auth_reg_htmlElements.auth_reg_gender);
 var valid_mobile = validate_mobile(auth_reg_htmlElements.auth_reg_mobile);
 var mobile = $('#'+auth_reg_htmlElements.auth_reg_mobile).val();
 if(valid_mobile){
   authEndpoints.userAccounts_verify_mobileNumber(mobile,function(response){
      console.log(JSON.stringify(response));
	  if(response.user==='NOT_EXISTS' && valid_surName && valid_name && valid_gender){
	    document.getElementById(auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg).innerHTML='';
        showHide_auth_reg_otpForm('show');
	    bootstrap_formField_trigger('success',auth_reg_htmlElements.auth_reg_mobile);
	  } else if(response.user==='EXISTS'){
	    VALIDATION_MESSAGE_ERROR='You already Registered. Please login to your Account ';
	    show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg);
		bootstrap_formField_trigger('error',auth_reg_htmlElements.auth_reg_mobile);
	  } else {
		 show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg);
	  }
   });
 } else {
    show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg);
 }
}
function submit_auth_reg_validateOTPCode(){
  VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
  var otpcode = $("#"+auth_reg_htmlElements.auth_reg_otpcode).val();
  var valid_otpcode = validate_otpcode(auth_reg_htmlElements.auth_reg_otpcode);
  if(valid_otpcode){
	VALIDATION_MESSAGE_ERROR='Your OTP Code got validated. Please move into <b>Next</b> Process. ';
	show_validate_msg('success',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg);
    document.getElementById(auth_reg_htmlElements.auth_reg_otpcode).disabled=true;
	document.getElementById(auth_reg_htmlElements.validateOTPBtn).disabled=true;
	showHide_auth_reg_genInfoNext('show');
	
  } else {
     show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg);
  }
}
function submit_auth_reg_genInfo(){
 VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
 var surName = $("#"+auth_reg_htmlElements.auth_reg_surName).val();
 var name = $("#"+auth_reg_htmlElements.auth_reg_name).val();
 var gender = $("#"+auth_reg_htmlElements.auth_reg_gender).val();
 var mobile = $("#"+auth_reg_htmlElements.auth_reg_mobile).val();
 var otpcode = $("#"+auth_reg_htmlElements.auth_reg_otpcode).val();
 var valid_surName = validate_surName(auth_reg_htmlElements.auth_reg_surName);
 var valid_name = validate_name(auth_reg_htmlElements.auth_reg_name);
 var valid_gender = validate_gender(auth_reg_htmlElements.auth_reg_gender);
 var valid_mobile = validate_mobile(auth_reg_htmlElements.auth_reg_mobile);
 var valid_otpcode = validate_otpcode(auth_reg_htmlElements.auth_reg_otpcode);
 if(valid_surName && valid_name && valid_gender && valid_mobile && valid_otpcode){
    AUTH_REG_SURNAME = surName;
	AUTH_REG_NAME = name;
	AUTH_REG_GENDER = gender;
	AUTH_REG_MOBILE = mobile;
	AUTH_REG_OTPCODE = otpcode;
    ALLOW_UPTO_INDEX=2;
	sel_auth_badges(badge_htmlElements.badge_menu[ALLOW_UPTO_INDEX-1]);
 } else {
	AUTH_REG_SURNAME = '';
	AUTH_REG_NAME = '';
	AUTH_REG_GENDER = '';
	AUTH_REG_MOBILE = '';
	AUTH_REG_OTPCODE = '';
	show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg);
 }
}
function reset_auth_reg_genInfoForm(){
 ALLOW_UPTO_INDEX=1;
 $("#"+auth_reg_htmlElements.auth_reg_surName).val('');
 $("#"+auth_reg_htmlElements.auth_reg_name).val('');
 $("#"+auth_reg_htmlElements.auth_reg_gender).val('');
 $("#"+auth_reg_htmlElements.auth_reg_mobile).val('');
 $("#"+auth_reg_htmlElements.auth_reg_otpcode).val('');
 bootstrap_formField_trigger('remove',[auth_reg_htmlElements.auth_reg_surName,auth_reg_htmlElements.auth_reg_name,
	auth_reg_htmlElements.auth_reg_gender,auth_reg_htmlElements.auth_reg_mobile,auth_reg_htmlElements.auth_reg_otpcode]);
 showHide_auth_reg_otpForm('hide');
 document.getElementById(auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg).innerHTML='';
}
/**********************************************************************************************************************/
/**********************************************************************************************************************/
/**********************************************************************************************************************/
function submit_auth_reg_setPassword(){
 VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
 var password=$("#"+auth_reg_htmlElements.auth_reg_password).val();
 var confirmPassword=$("#"+auth_reg_htmlElements.auth_reg_confirmPassword).val();
 var valid_password=validate_password(auth_reg_htmlElements.auth_reg_password);
 var valid_confirmPassword=validate_confirmPassword(auth_reg_htmlElements.auth_reg_password, 
											auth_reg_htmlElements.auth_reg_confirmPassword);
 if(valid_password && valid_confirmPassword){
    AUTH_REG_PASSWORD = password;
	ALLOW_UPTO_INDEX=3;
	sel_auth_badges(badge_htmlElements.badge_menu[ALLOW_UPTO_INDEX-1]);
	document.getElementById(auth_reg_htmlElements.auth_reg_lock_warnErrorMsg).innerHTML='';
	load_auth_reg_securityQ();
 } else {	
    AUTH_REG_PASSWORD = ''; 
	show_validate_msg('error',auth_reg_htmlElements.auth_reg_lock_warnErrorMsg);
 }
}
function reset_auth_reg_passwordForm(){
 ALLOW_UPTO_INDEX=2;
 $("#"+auth_reg_htmlElements.auth_reg_password).val('');
 $("#"+auth_reg_htmlElements.auth_reg_confirmPassword).val('');
 bootstrap_formField_trigger('remove',[auth_reg_htmlElements.auth_reg_password,auth_reg_htmlElements.auth_reg_confirmPassword]);
 document.getElementById(auth_reg_htmlElements.auth_reg_lock_warnErrorMsg).innerHTML='';
}
/**********************************************************************************************************************/
/**********************************************************************************************************************/
/**********************************************************************************************************************/
function submit_auth_reg_securityQ(){
 var sQ1 = $("#"+auth_reg_htmlElements.auth_reg_sQ1).val();
 var a1 = $("#"+auth_reg_htmlElements.auth_reg_a1).val();
 var sQ2 = $("#"+auth_reg_htmlElements.auth_reg_sQ2).val();
 var a2 = $("#"+auth_reg_htmlElements.auth_reg_a2).val();
 var sQ3 = $("#"+auth_reg_htmlElements.auth_reg_sQ3).val();
 var a3 = $("#"+auth_reg_htmlElements.auth_reg_a3).val();
 VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
 var validate = validate_securityQA(auth_reg_htmlElements.auth_reg_sQ1, auth_reg_htmlElements.auth_reg_a1, 
									auth_reg_htmlElements.auth_reg_sQ2, auth_reg_htmlElements.auth_reg_a2, 
									auth_reg_htmlElements.auth_reg_sQ3, auth_reg_htmlElements.auth_reg_a3);
 if(validate){
   AUTH_REG_SQ1 = sQ1;
   AUTH_REG_A1 = a1;
   AUTH_REG_SQ2 = sQ2;
   AUTH_REG_A2 = a2;
   AUTH_REG_SQ3 = sQ3;
   AUTH_REG_A3 = a3;
   console.log("AUTH_REG_SURNAME: "+AUTH_REG_SURNAME);
   console.log("AUTH_REG_NAME: "+AUTH_REG_NAME);
   console.log("AUTH_REG_GENDER: "+AUTH_REG_GENDER);
   console.log("AUTH_REG_MOBILE: "+AUTH_REG_MOBILE);
   console.log("AUTH_REG_OTPCODE: "+AUTH_REG_OTPCODE);
   console.log("AUTH_REG_PASSWORD: "+AUTH_REG_PASSWORD);
   console.log("AUTH_REG_SQ1: "+AUTH_REG_SQ1);
   console.log("AUTH_REG_A1: "+AUTH_REG_A1);
   console.log("AUTH_REG_SQ2: "+AUTH_REG_SQ2);
   console.log("AUTH_REG_A2: "+AUTH_REG_A2);
   console.log("AUTH_REG_SQ3: "+AUTH_REG_SQ3);
   console.log("AUTH_REG_A3: "+AUTH_REG_A3); 
   	// Call Service to Store data into Database
   var inputData = { mob_code:'+91',mobile:AUTH_REG_MOBILE, surName:AUTH_REG_SURNAME, name:AUTH_REG_NAME, 
					 gender:AUTH_REG_GENDER, acc_pwd:AUTH_REG_PASSWORD, q1:AUTH_REG_SQ1, a1:AUTH_REG_A1, 
					 q2:AUTH_REG_SQ2, a2:AUTH_REG_A2, q3:AUTH_REG_SQ3, a3:AUTH_REG_A3 };
   authEndpoints.userAccounts_create_newAccount(inputData,function(response){
	  reset_auth_reg_genInfoForm();
	  sel_auth_badges(badge_htmlElements.badge_menu[0]);
	  VALIDATION_MESSAGE_ERROR='Your Account has been created. Please login into your Account.';
	  show_validate_msg('success',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg);
   });
 } else { show_validate_msg('error',auth_reg_htmlElements.auth_reg_sQ_warnErrorMsg); }
}
function load_auth_reg_securityQ(){
  SECURITYQUESTION1='';SECURITYQUESTION2='';SECURITYQUESTION3='';
  authEndpoints.userAccounts_viewInfo_securityQ(function(securityQuestions){ 
    SECURITYQUESTIONS = securityQuestions;
	load_auth_reg_securityQ1();
	load_auth_reg_securityQ2();
	load_auth_reg_securityQ3();
  });
}
function load_auth_reg_securityQ1(){
 var content='<option value="">Choose your Security Question#1</option>';
 for(var index=0;index<10;index++){
  var sQ_Id = SECURITYQUESTIONS[index].sQ_Id;
  var sQ = SECURITYQUESTIONS[index].sQ;
  var exclude = false;
	  if(SECURITYQUESTION2===sQ_Id) { exclude = true; }
	  if(SECURITYQUESTION3===sQ_Id) { exclude = true; }
  if(!exclude){ content+='<option value="'+sQ_Id+'">'+sQ+'</option>'; }
 }
 document.getElementById(auth_reg_htmlElements.auth_reg_sQ1).innerHTML=content;
}
function update_auth_reg_securityQ1(){
 SECURITYQUESTION1=document.getElementById(auth_reg_htmlElements.auth_reg_sQ1).value;
 reset_auth_reg_securityQ();
}
function load_auth_reg_securityQ2(){
 var content='<option value="">Choose your Security Question#2</option>';
 for(var index=10;index<20;index++){
  var sQ_Id = SECURITYQUESTIONS[index].sQ_Id;
  var sQ = SECURITYQUESTIONS[index].sQ;
  var exclude = false;
	  if(SECURITYQUESTION1===sQ_Id) { exclude = true; }
	  if(SECURITYQUESTION3===sQ_Id) { exclude = true; }
  if(!exclude){ content+='<option value="'+sQ_Id+'">'+sQ+'</option>'; }
 }
 document.getElementById(auth_reg_htmlElements.auth_reg_sQ2).innerHTML=content;
}
function update_auth_reg_securityQ2(){
 SECURITYQUESTION2=document.getElementById(auth_reg_htmlElements.auth_reg_sQ2).value;
 reset_auth_reg_securityQ();
}
function load_auth_reg_securityQ3(){
 var content='<option value="">Choose your Security Question#3</option>';
 for(var index=20;index<SECURITYQUESTIONS.length;index++){
  var sQ_Id = SECURITYQUESTIONS[index].sQ_Id;
  var sQ = SECURITYQUESTIONS[index].sQ;
  var exclude = false;
	  if(SECURITYQUESTION1===sQ_Id) { exclude = true; }
	  if(SECURITYQUESTION2===sQ_Id) { exclude = true; }
  if(!exclude){ content+='<option value="'+sQ_Id+'">'+sQ+'</option>'; }
 }
 document.getElementById(auth_reg_htmlElements.auth_reg_sQ3).innerHTML=content;
}
function update_auth_reg_securityQ3(){
 SECURITYQUESTION3=document.getElementById(auth_reg_htmlElements.auth_reg_sQ3).value;
 reset_auth_reg_securityQ();
}
function reset_auth_reg_securityQ(){
 console.log("securityQuestion1: "+SECURITYQUESTION1);
 console.log("securityQuestion2: "+SECURITYQUESTION2);
 console.log("securityQuestion3: "+SECURITYQUESTION3);
 if(SECURITYQUESTION1=='') { load_auth_reg_securityQ1(); }
 if(SECURITYQUESTION2=='') { load_auth_reg_securityQ2(); }
 if(SECURITYQUESTION3=='') { load_auth_reg_securityQ3(); }
}
function reset_auth_reg_securityQForm(){
 ALLOW_UPTO_INDEX=3;
 $("#"+auth_reg_htmlElements.auth_reg_sQ1).val('');
 $("#"+auth_reg_htmlElements.auth_reg_a1).val('');
 $("#"+auth_reg_htmlElements.auth_reg_sQ2).val('');
 $("#"+auth_reg_htmlElements.auth_reg_a2).val('');
 $("#"+auth_reg_htmlElements.auth_reg_sQ3).val('');
 $("#"+auth_reg_htmlElements.auth_reg_a3).val('');
 bootstrap_formField_trigger('remove',[auth_reg_htmlElements.auth_reg_sQ1,auth_reg_htmlElements.auth_reg_a1,
									   auth_reg_htmlElements.auth_reg_sQ2,auth_reg_htmlElements.auth_reg_a2,
									   auth_reg_htmlElements.auth_reg_sQ3,auth_reg_htmlElements.auth_reg_a3]);
 document.getElementById(auth_reg_htmlElements.auth_reg_sQ_warnErrorMsg).innerHTML='';
}