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
 * g) submit_auth_reg_verifyMobile() - Triggered When Verify Button is clicked
 * h) submit_auth_reg_validateOTPCode() - Triggered When Validate OTP Code Button is clicked
 * i) submit_auth_reg_genInfo() - Triggered When Next Button ( To Proceed to Next Button ) is clicked
 * j) reset_auth_reg_genInfoForm) - Triggered to reset General Info Module Form
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
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is triggered When Verify Button is clicked.
 * DOES: a) Validates Mobile Number
 *          IF Mobile -> EXISTS (Displays Alert Message - User already Registered )
 *                    -> NOT_EXISTS && Has valid Surname, Name, Gender (Displays OTP Code Form)
 *          ELSE -> ( Displays Alert Message - With Reason )
 */
 VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
 var valid_surName = validate_surName(auth_reg_htmlElements.auth_reg_surName); // Validates SurName
 var valid_name = validate_name(auth_reg_htmlElements.auth_reg_name); // Validate Name
 var valid_gender = validate_gender(auth_reg_htmlElements.auth_reg_gender); // Validate Gender
 var valid_mobile = validate_mobile(auth_reg_htmlElements.auth_reg_mobile); // Validate Mobile
 var mobile = $('#'+auth_reg_htmlElements.auth_reg_mobile).val();
 if(valid_mobile){ // If Mobile Number validates
   // Check Mobile Number already registered or not using VerifyMobileNumber EndPoint
   authEndpoints.userAccounts_verify_mobileNumber(mobile,function(response){
      console.log(JSON.stringify(response));
    // If Mobile Number is not registered VerifyMobileNumber Endpoint returns NOT_EXISTS
    // If Mobile Number is registered VerifyMobileNumber Endpoint returns EXISTS
    // If VerifyMobileNumber Endpoint returns NOT_EXISTS and Surname, Name, Gender gets Validated
    //   -> a) Alert Message is set to Empty
    //      b) Displays OTP Code Form
    //      c) Add Success validation Icon
	  if(response.user==='NOT_EXISTS' && valid_surName && valid_name && valid_gender){ // Mobile not exists
	    document.getElementById(auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg).innerHTML=''; // Alert Message is set to Empty
      showHide_auth_reg_otpForm('show'); // Displays OTP Code Form
	    bootstrap_formField_trigger('success',auth_reg_htmlElements.auth_reg_mobile); // Add Success validation Icon
	  } else if(response.user==='EXISTS'){ // Mobile exists
	    VALIDATION_MESSAGE_ERROR='You already Registered. Please login to your Account ';
	    show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg); // Alert Message - Mobile already Registered
		  bootstrap_formField_trigger('error',auth_reg_htmlElements.auth_reg_mobile); // Add Error validation Icon
	  } else {
		 show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg); // Alert Message - With Reason
	  }
   });
 } else {
    show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg); // Alert Message - With Invalid Mobile Number
 }
}

function submit_auth_reg_validateOTPCode(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is triggered When Validate OTP Code Button is clicked.
 * DOES: validates OTP Code
 *       IF validated -> a) Shows OTP Code got validated
 *                       b) OTP Code Input Field and Validate OTP Code Button Field - Editable
 *                       c)  Displays Next Button ( To Proceed to Next Button )
 */
  VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
  var valid_otpcode = validate_otpcode(auth_reg_htmlElements.auth_reg_otpcode); // Validates OTP Code
  if(valid_otpcode){ // Valid OTP Code
	  VALIDATION_MESSAGE_ERROR='Your OTP Code got validated. Please move into <b>Next</b> Process. ';
	  show_validate_msg('success',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg); // Alert Message - OTP Code got Validated
    document.getElementById(auth_reg_htmlElements.auth_reg_otpcode).disabled=true; // OTP Code Input Field - Editable
	  document.getElementById(auth_reg_htmlElements.validateOTPBtn).disabled=true; // Validate OTP Code Button Field - Editable
	  showHide_auth_reg_genInfoNext('show'); // Displays Next Button ( To Proceed to Next Button )
  } else { // Invalid OTP Code
     show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg); // Alert Message - Invalid OTP Code
  }
}
function submit_auth_reg_genInfo(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is triggered When Next Button ( To Proceed to Next Button ) is clicked.
 * DOES: Validates Params
 *        IF valid -> Sets Level to Badge#2, Set Param values globally and loads Set Password Module Form 
 *        Else -> Set Param values globally to EMPTY and Alert Message - With Reason
 */
 VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
 var valid_surName = validate_surName(auth_reg_htmlElements.auth_reg_surName); // Validates SurName
 var valid_name = validate_name(auth_reg_htmlElements.auth_reg_name); // Validates Name
 var valid_gender = validate_gender(auth_reg_htmlElements.auth_reg_gender); // Validates Gender
 var valid_mobile = validate_mobile(auth_reg_htmlElements.auth_reg_mobile); // Validates Mobile Number
 var valid_otpcode = validate_otpcode(auth_reg_htmlElements.auth_reg_otpcode); // Validates OTP Code
 if(valid_surName && valid_name && valid_gender && valid_mobile && valid_otpcode){ // All Valid
    AUTH_REG_SURNAME = $("#"+auth_reg_htmlElements.auth_reg_surName).val(); // Sets Variable globally
	  AUTH_REG_NAME = $("#"+auth_reg_htmlElements.auth_reg_name).val(); // Sets Variable globally
	  AUTH_REG_GENDER = $("#"+auth_reg_htmlElements.auth_reg_gender).val(); // Sets Variable globally
	  AUTH_REG_MOBILE = $("#"+auth_reg_htmlElements.auth_reg_mobile).val(); // Sets Variable globally
	  AUTH_REG_OTPCODE = $("#"+auth_reg_htmlElements.auth_reg_otpcode).val(); // Sets Variable globally
    ALLOW_UPTO_INDEX=2; // Sets Level to Badge#2
	  sel_auth_badges(badge_htmlElements.badge_menu[ALLOW_UPTO_INDEX-1]); // This is used to load Set Password Module Form
 } else { // Anything Invalid
	  AUTH_REG_SURNAME = ''; // Sets Variable globally to Empty
	  AUTH_REG_NAME = ''; // Sets Variable globally to Empty
	  AUTH_REG_GENDER = ''; // Sets Variable globally to Empty
	  AUTH_REG_MOBILE = ''; // Sets Variable globally to Empty
	  AUTH_REG_OTPCODE = ''; // Sets Variable globally to Empty
	  show_validate_msg('error',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg); // Alert Message - With Reason
 }
}

function reset_auth_reg_genInfoForm(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function used to reset General Info Module Form
 * DOES: a) Set Level to Badge#1
 *       b) Sets Form Fields to Empty and removes Success/Error Validation Icons to these Form Fields
 *       c) Hides OTP Code Form
 *       d) Sets Alert Message - Empty
 */
 ALLOW_UPTO_INDEX=1;
 sel_auth_badges(badge_htmlElements.badge_menu[0]);
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

/* ===============================================================================================
 * SET PASSWORD MODULE FORM:
 * ===============================================================================================
 * This form consists of following fields:
 * a) Password b) Confirm Password  c) Next Button (To proceed to Set Security Questions Module Form)
 * ----------------------------------
 * Functions on this Module:
 * ----------------------------------
 * a) submit_auth_reg_setPassword() - Triggered when Next Button (To proceed to Set Security 
 *                                    Questions Module Form) is clicked
 * b) reset_auth_reg_passwordForm() - Triggered to reset Set Password Form
 */
function submit_auth_reg_setPassword(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is triggered when Next Button (To proceed to Set Security Questions 
 * Module Form) is clicked.
 * DOES: a) Validates Password and Confirm Password
 *          If Valid -> i) Sets Params Globally
 *                     ii) Sets Level to Badge#3 and loads Set Security Questions Module Form
 *                    iii) Sets Alert Message - Empty 
 *                     iv) Loads Questions into Security Questions#1,2,3 Dropdowns
 *          Else -> i) Sets Params Globally to EMPTY
 *                 ii) Alert Message - With Reason
 */
 VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
 var valid_password=validate_password(auth_reg_htmlElements.auth_reg_password); // Validates Password
 var valid_confirmPassword=validate_confirmPassword(auth_reg_htmlElements.auth_reg_password, 
											auth_reg_htmlElements.auth_reg_confirmPassword); // Validates Password and Confirm Password
 if(valid_password && valid_confirmPassword){ // All Valid
    AUTH_REG_PASSWORD = $("#"+auth_reg_htmlElements.auth_reg_password).val(); // Sets Variable globally 
	  ALLOW_UPTO_INDEX=3; // Sets Level to Badge#3
	  sel_auth_badges(badge_htmlElements.badge_menu[ALLOW_UPTO_INDEX-1]); // This loads Set Security Questions Module Form
	  document.getElementById(auth_reg_htmlElements.auth_reg_lock_warnErrorMsg).innerHTML=''; // Alert Message - EMPTY
	  load_auth_reg_securityQ(); // Loads Questions into Security Questions#1,2,3 Dropdowns
 } else {	
    AUTH_REG_PASSWORD = ''; // Sets Variable globally to EMPTY
	  show_validate_msg('error',auth_reg_htmlElements.auth_reg_lock_warnErrorMsg); // Alert Message - With Reason
 }
}
function reset_auth_reg_passwordForm(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used to reset Set Password Form.
 * DOES: a) Set Level to Badge#2
 *       b) Set Form Fields to Empty and remove Sucess/Error Validation Icons to Form Fields
 *       c) Alert Message - Empty
 */
 ALLOW_UPTO_INDEX=2; // Set Level to Badge#2
 sel_auth_badges(badge_htmlElements.badge_menu[1]);
 $("#"+auth_reg_htmlElements.auth_reg_password).val('');
 $("#"+auth_reg_htmlElements.auth_reg_confirmPassword).val('');
 bootstrap_formField_trigger('remove',[auth_reg_htmlElements.auth_reg_password,auth_reg_htmlElements.auth_reg_confirmPassword]);
 document.getElementById(auth_reg_htmlElements.auth_reg_lock_warnErrorMsg).innerHTML='';
}

/* ===============================================================================================
 * SET SECURITY QUESTIONS MODULE FORM:
 * ===============================================================================================
 * This form consists of following fields:
 * a) Security Question#1 b) Security Answer#1
 * c) Security Question#2 d) Security Answer#2
 * e) Security Question#3 f) Security Answer#3
 * c) Create Account Button (To Finish User Registration)
 * ----------------------------------
 * Functions on this Module:
 * ----------------------------------
 * a) load_auth_reg_securityQ() - Loads Questions from user_accounts_sq table and displays questions
 *                                into dropdowns.
 * b) load_auth_reg_securityQ1() - Loads questions into Security Question#1 dropdown
 * c) load_auth_reg_securityQ2() = Loads questions into Security Question#2 dropdown
 * d) load_auth_reg_securityQ3() = Loads questions into Security Question#3 dropdown
 * e) submit_auth_reg_securityQ() - Triggers when Create Account Button is clicked
 * f) reset_auth_reg_securityQForm() - Resets Set Security Questions Form
 */
function load_auth_reg_securityQ(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used to load the Questions from user_accounts_sq table and displays
 * them into dropdowns.
 */ 
  SECURITYQUESTION1=''; // Sets Variable globally to EMPTY
  SECURITYQUESTION2=''; // Sets Variable globally to EMPTY
  SECURITYQUESTION3=''; // Sets Variable globally to EMPTY
  authEndpoints.userAccounts_viewInfo_securityQ(function(securityQuestions){ // triggers Endpoint
    SECURITYQUESTIONS = securityQuestions; // Sets Variable Globally
	load_auth_reg_securityQ1(); // Sets Questions into Security Question#1 dropdown
	load_auth_reg_securityQ2(); // Sets Questions into Security Question#2 dropdown
	load_auth_reg_securityQ3(); // Sets Questions into Security Question#3 dropdown
  });
}
function load_auth_reg_securityQ1(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used to set Questions into Security Question#1 dropdown
 */ 
  var content='<option value="">Choose your Security Question#1</option>';
  for(var index=0;index<10;index++){
   var sQ_Id = SECURITYQUESTIONS[index].sQ_Id;
   var sQ = SECURITYQUESTIONS[index].sQ;
   content+='<option value="'+sQ_Id+'">'+sQ+'</option>';
  }
  document.getElementById(auth_reg_htmlElements.auth_reg_sQ1).innerHTML=content;
 }

function load_auth_reg_securityQ2(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used to set Questions into Security Question#1 dropdown
 */ 
  var content='<option value="">Choose your Security Question#2</option>';
  for(var index=10;index<20;index++){
   var sQ_Id = SECURITYQUESTIONS[index].sQ_Id;
   var sQ = SECURITYQUESTIONS[index].sQ;
   content+='<option value="'+sQ_Id+'">'+sQ+'</option>';
  }
  document.getElementById(auth_reg_htmlElements.auth_reg_sQ2).innerHTML=content;
 }

function load_auth_reg_securityQ3(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is used to set Questions into Security Question#3 dropdown
 */ 
  var content='<option value="">Choose your Security Question#3</option>';
  for(var index=20;index<SECURITYQUESTIONS.length;index++){
   var sQ_Id = SECURITYQUESTIONS[index].sQ_Id;
   var sQ = SECURITYQUESTIONS[index].sQ;
   content+='<option value="'+sQ_Id+'">'+sQ+'</option>';
  }
  document.getElementById(auth_reg_htmlElements.auth_reg_sQ3).innerHTML=content;
 }

function submit_auth_reg_securityQ(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This Function is triggered when Create Account Button is clicked.
 * DOES: a) Validates Form Fields (Security Question#1, Security Answer#1, Security Question#2,
 *          Security Answer#2, Security Question#3, Security Answer#3)
 *       b) Set Params Globally and trigger Create User Account Endpoint.
 *       c) Set Level to Badge#1 and Display Alert Message - Success 
 */
 VALIDATION_MESSAGE_ERROR='Please provide '; // It's declared in validation.js
 var validate = validate_securityQA(auth_reg_htmlElements.auth_reg_sQ1, auth_reg_htmlElements.auth_reg_a1, 
									auth_reg_htmlElements.auth_reg_sQ2, auth_reg_htmlElements.auth_reg_a2, 
									auth_reg_htmlElements.auth_reg_sQ3, auth_reg_htmlElements.auth_reg_a3);
 if(validate){ // All Valid
   AUTH_REG_SQ1 = $("#"+auth_reg_htmlElements.auth_reg_sQ1).val(); // Set Variable Globally
   AUTH_REG_A1 =  $("#"+auth_reg_htmlElements.auth_reg_a1).val(); // Set Variable Globally
   AUTH_REG_SQ2 = $("#"+auth_reg_htmlElements.auth_reg_sQ2).val(); // Set Variable Globally
   AUTH_REG_A2 = $("#"+auth_reg_htmlElements.auth_reg_a2).val(); // Set Variable Globally
   AUTH_REG_SQ3 = $("#"+auth_reg_htmlElements.auth_reg_sQ3).val(); // Set Variable Globally
   AUTH_REG_A3 = $("#"+auth_reg_htmlElements.auth_reg_a3).val(); // Set Variable Globally
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
    reset_auth_reg_genInfoForm(); // loads General Info Module Form and Resets Data
	  VALIDATION_MESSAGE_ERROR='Your Account has been created. Please login into your Account.';
	  show_validate_msg('success',auth_reg_htmlElements.auth_reg_genInfo_warnErrorMsg); // Alert Message - Success
   });
 } else { show_validate_msg('error',auth_reg_htmlElements.auth_reg_sQ_warnErrorMsg); } // Alert Message - With Reason
}

function reset_auth_reg_securityQForm(){
/* =======================================================================================
 * FUNCTION DESCRIPTION:
 * =======================================================================================
 * This is used to reset Set Security Questions Form.
 */
 ALLOW_UPTO_INDEX=3; // Set level to Badge#3
 sel_auth_badges(badge_htmlElements.badge_menu[2]); // Loads Set Security Questions Module Form
 $("#"+auth_reg_htmlElements.auth_reg_sQ1).val('');
 $("#"+auth_reg_htmlElements.auth_reg_a1).val('');
 $("#"+auth_reg_htmlElements.auth_reg_sQ2).val('');
 $("#"+auth_reg_htmlElements.auth_reg_a2).val('');
 $("#"+auth_reg_htmlElements.auth_reg_sQ3).val('');
 $("#"+auth_reg_htmlElements.auth_reg_a3).val('');
 bootstrap_formField_trigger('remove',[auth_reg_htmlElements.auth_reg_sQ1,auth_reg_htmlElements.auth_reg_a1,
									   auth_reg_htmlElements.auth_reg_sQ2,auth_reg_htmlElements.auth_reg_a2,
									   auth_reg_htmlElements.auth_reg_sQ3,auth_reg_htmlElements.auth_reg_a3]);
 document.getElementById(auth_reg_htmlElements.auth_reg_sQ_warnErrorMsg).innerHTML=''; // Alert Message - EMPTY
}