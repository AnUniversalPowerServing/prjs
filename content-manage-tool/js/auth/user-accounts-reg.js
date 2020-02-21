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
var AUTH_REG_SQENDPOINT='backend/php/dac/controller.accounts.user.auth.php';
var ALLOW_UPTO_INDEX=1;
var badge_htmlElements = { badge_menu:["badge-auth-reg-genInfo","badge-auth-reg-setPassword","badge-auth-reg-securityQ"],
						   badge_info:{ "badge-auth-reg-genInfo":{ "contents":["auth-reg-genInfo"],"functions":function(){ } },
										"badge-auth-reg-setPassword":{ "contents":["auth-reg-setPassword"],"functions":function(){ } },
										"badge-auth-reg-securityQ":{ "contents":["auth-reg-securityQ"],"functions":function(){ } }}
						   };
var auth_reg_htmlElements = { auth_reg_surName:'auth-reg-genInfo-surName', auth_reg_name:'auth-reg-genInfo-name', 
							  auth_reg_gender:'auth-reg-genInfo-gender', auth_reg_mobile:'auth-reg-genInfo-mobile', 
							  auth_reg_otpcode:'auth-reg-genInfo-otpcode', auth_reg_password:'auth-reg-genInfo-password',
							  auth_reg_confirmPassword:'auth-reg-genInfo-confirmPassword',
							  auth_reg_sQ1:'auth-reg-securityQ-sQ1', auth_reg_a1:'auth-reg-securityQ-a1',
							  auth_reg_sQ2:'auth-reg-securityQ-sQ2', auth_reg_a2:'auth-reg-securityQ-a2',
							  auth_reg_sQ3:'auth-reg-securityQ-sQ3', auth_reg_a3:'auth-reg-securityQ-a3'	
							};
							
function trigger_userAccounts_auth(){
 sel_auth_badges(badge_htmlElements.badge_menu[0]);
 load_auth_reg_securityQ();
}
function sel_auth_badges(sel_Id){
 bootstrap_menu_trigger(badge_htmlElements.badge_info,'badges', sel_Id,ALLOW_UPTO_INDEX);
}
/*********************************************************************************************************************/
/*********************************************************************************************************************/
/*********************************************************************************************************************/
function submit_auth_reg_genInfo(){
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
 }
}

/**********************************************************************************************************************/
/**********************************************************************************************************************/
/**********************************************************************************************************************/
function submit_auth_reg_setPassword(){
 var password=$("#"+auth_reg_htmlElements.auth_reg_password).val();
 var confirmPassword=$("#"+auth_reg_htmlElements.auth_reg_confirmPassword).val();
 var valid_password=validate_password(password);
 var valid_confirmPassword=validate_confirmPassword(confirmPassword);
 if(valid_password && valid_confirmPassword){
    AUTH_REG_PASSWORD = password;
	ALLOW_UPTO_INDEX=3;
	sel_auth_badges(badge_htmlElements.badge_menu[ALLOW_UPTO_INDEX-1]);
 } else {	AUTH_REG_PASSWORD = ''; }
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
 }
}


function load_auth_reg_securityQ(){
  SECURITYQUESTION1='';SECURITYQUESTION2='';SECURITYQUESTION3='';
  js_ajax('GET',AUTH_REG_SQENDPOINT,{ action:'USER_AUTH_SECURITYQ' },function(securityQuestions){
    SECURITYQUESTIONS = securityQuestions;
	load_auth_reg_securityQ1();
	load_auth_reg_securityQ2();
	load_auth_reg_securityQ3();
  });
}
function load_auth_reg_securityQ1(){
 var content='<option value="">Choose your Security Question#1</option>';
 for(var index in SECURITYQUESTIONS){
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
 for(var index in SECURITYQUESTIONS){
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
 for(var index in SECURITYQUESTIONS){
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