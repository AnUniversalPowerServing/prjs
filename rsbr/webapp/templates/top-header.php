<script type="text/javascript">
$(document).ready(function(){
 if($(window).width()<=768){
  sideWrapperToggle();
 }
});
function sideWrapperToggle(){
if($("#wrapper").hasClass('toggled')) { 
 $("#wrapper").removeClass('toggled'); // hides SideMenu
 // $("#page-content-wrapper").css("position","absolute");
}
else { 
 $("#wrapper").addClass("toggled");  // adds SideMenu
// $("#page-content-wrapper").css("position","fixed");
 // setTimeout(function(){ $("html").addClass("stop-vertificalScroll"); },400);
}
}
function downloadApplicationFile(event){
  event.preventDefault();
  window.open(PROJECT_URL+'doc/RSBR-Application-Form.pdf','_blank');
}
</script> 
<style>
ul.dropdown-menu>li>a { color:#0e2551; }
.btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, 
.btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, 
.open>.dropdown-toggle.btn-default.focus, .open>.dropdown-toggle.btn-default:focus, 
.open>.dropdown-toggle.btn-default:hover {
    color: #fff;
    background-color: #0e2551;
    border-color: #0e2551;
}
</style>
<style>
@media (min-width: 768px){ #topMenu { float: right!important; } }

@font-face { font-family:glarious;src:url('fonts/glarious.otf'); }
@font-face { font-family:longdoosi-regular;src:url('fonts/longdoosi-regular.ttf'); }

.fs22p { font-size:22px; }

.mtop5p { margin-top:5px; }
.mtop15p { margin-top:15px; }
.mtop50p { margin-top:50px; }

.mbot5p { margin-bottom:5px; }
.mbot15p { margin-bottom:15px; }
.mbot20p { margin-bottom:20px; }
.mbot50p { margin-bottom:50px; }

.font-white { color:#fff; }
.lh35p { line-height:35px; }

hr { border-bottom:2px solid #ccc; }
hr.tomato { border-bottom:2px solid tomato; }
hr.dodgerBlue { border-bottom:2px solid dodgerBlue; }
hr.black { border-bottom:2px solid black; }
hr.white { border-bottom:2px solid white; }

.btn-blue-o { background-color:#fff;border:2px solid dodgerblue;color:dodgerblue;font-weight:bold; }
.btn-green-o { background-color:#fff;border:2px solid mediumSeaGreen;color:mediumSeaGreen;font-weight:bold; }
.btn-tomato-o { background-color:#fff;border:2px solid tomato;color:tomato;font-weight:bold; }
.btn-orange-o { background-color:#fff;border:2px solid orange;color:orange;font-weight:bold; }
.btn-rsbr-o { background-color:#fff;border:2px solid #a02cd6;color:#a02cd6;font-weight:bold; }

.btn-rsbr2-o { background-color:#fff;border:1px solid #6d049e;color:#6d049e;font-weight:bold; }

.btn-rsbr3-o { background-color:#fff;border:1px solid #0e2551;color:#0e2551;font-weight:bold; }
.btn-rsbr3-o:hover { background-color:#0e2551;border:1px solid #0e2551;color:#fff; }

.btn-rsbr3 { background-color:#0e2551;border:1px solid #0e2551;color:#fff;font-weight:bold; }
.btn-rsbr3:hover { background-color:#fff;border:1px solid #0e2551;color:#0e2551; }

.btn-rsbr2 { background-color:#6d049e;color:#fff;border:1px solid #6d049e; }
.btn-rsbr2:hover { background-color:#a02cd6;color:#fff;border:1px solid #a02cd6; }


</style>

<nav class="navbar navbar-default" 
style="position:sticky;border:0px;border-radius:0px;background-color:#f7f7f7;margin-bottom:-10px;">

		  <div align="center" class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#" style="cursor:pointer;color:#0e2551;" onclick="javascript:sideWrapperToggle();">
			    <span class="glyphicon glyphicon-align-justify"></span>
			  </a>
			  <span><img src="images/logo.png" style="width:110px;height:110px;"/></span>
			</div>
		
			<div id="topMenu" style="margin-top:2%;">
			<form class="navbar-form navbar-left">
			  <?php
  			    if(isset($_SESSION["USER_ACCOUNT_TYPE"])) { 
			    if($_SESSION["USER_ACCOUNT_TYPE"]=='ADMINISTRATOR') { 
			  ?>
			  <div class="form-group">
			    <a href="#" data-toggle="modal" data-target="#messageBalance">
			      <button class="btn btn-default btn-rsbr3-o form-control">View Message Balance</button>
				</a>
			  </div>
			  
			  <?php } else if($_SESSION["USER_ACCOUNT_TYPE"]=='CUSTOMER') {  ?>
			  <div class="form-group">
			    <a href="#" data-toggle="modal" data-target="#messageBalance">
			      <button class="btn btn-rsbr3-o form-control">My Profile</button>
				</a>
			  </div>
			  <?php } } else { ?> 
			  <div class="form-group">
			    <a href="#" data-toggle="modal" data-target="#customerLoginRegisterModal" 
				onclick="javascript:init_loginFrgtPwdForm();">
			      <button class="btn btn-default btn-rsbr3-o form-control">Customer Login / Register</button>
				</a>
			  </div>
			  <?php }  ?>
              <div class="form-group">
			    <button class="btn btn-default btn-rsbr3 form-control" 
				onclick="javascript:downloadApplicationFile(event);">
				Download Application</button>
			  </div>
			  
			  <?php if(isset($_SESSION["USER_ACCOUNT_TYPE"])) { ?>
			   <div class="form-group">
			    <button class="btn btn-default btn-rsbr3-o form-control" onclick="javascript:logout();">logout</button>
			  </div>
			  <?php }?> 
			   
			  
			  
			</div>
			
		  </div>
	  </nav>

<!-- Modal ::: Start -->
<div id="messageBalance" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#0e2551;color:#fff;">
        <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
        <h4 class="modal-title"><b>View Message Balance</b></h4>
      </div>
      <div class="modal-body">
      <!-- -->
	  <div class="container-fluid">
	   <div class="row">
	    <div align="center" class="col-md-12 col-sm-12 col-xs-12">
	    <!-- -->
		<h3>1000 Messages&nbsp;&nbsp;&nbsp;<a href="#"><span style="font-size:16px;"><b><u>SMS Recharge?</u></b></span></a></h3>
		<!-- -->
	    </div><!--/.col-md-6 -->
	   </div><!--/.row -->
	  </div><!--/.container-fluid -->
	  <!-- -->
      </div>
    </div>

  </div>
</div>


<!-- Modal :::End -->

<!-- Login / Register ::: Start --->
<style>
.hide-block { display:none; }
</style>
<!-- Modal ::: Start -->
<div id="customerLoginRegisterModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#0e2551;color:#fff;">
        <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
        <h4 class="modal-title"><b>Customer Login / Register</b></h4>
      </div>
      <div class="modal-body">
      <!-- -->
	  <div class="container-fluid">
	   <div class="row">
	   
	    <div class="col-md-6 col-sm-6 col-xs-12">
	    <!-- --> 
		  <div align="center" class="form-group">
			<h4><b>Register</b></h4><hr style="border-bottom: 1px solid #eee;"/>
		  </div><!--/.form-group -->
		  
		  <div id="customer_header_registerAlert" class="form-group"></div><!--/.form-group -->
		  
		  <div class="form-group">
			<label>Name</label>
			<input id="customer_register_name" type="text" class="form-control" placeholder="Enter Name"/>
		  </div><!--/.form-group -->
		 
		  <div class="form-group">
			<label>Mobile Number</label>
			<div class="input-group">
			  <input id="customer_register_mobileNumber" type="text" class="form-control" placeholder="Enter Mobile Number"/>
			  <div class = "input-group-btn">
			   <button class="btn btn-primary" onclick="javascript:rsbr_customer_register_mobileVerify();"><b>Verify</b></button>
			  </div>
			</div>
		  </div><!--/.form-group -->
		   
		 <div id="header_customer_registerAfterVerify" class="hide-block">
		  <div class="form-group">
				<label>OTP Code</label>
				<input id="customer_register_otpcode" type="text" class="form-control" placeholder="Enter OTP Code"/>
				<div align="right"><a href="#" onclick="javascript:rsbr_register_newOTPCode();">Send New OTPCode?</a></div>
		  </div><!--/.form-group -->
		  <div class="form-group">
			<label>Account Password</label>
			<input id="customer_register_accPwd" type="password" class="form-control" placeholder="Enter Account Password"/>
		  </div><!--/.form-group -->
		  
		  <div class="form-group">
			<label>Confirm Account Password</label>
			<input id="customer_register_confirmAccPwd" type="password" class="form-control" placeholder="Enter Confirm Account Password"/>
		  </div><!--/.form-group -->
		  
		  <div class="form-group">
			<button class="btn btn-primary form-control" onclick="javascript:rsbr_customer_register();"><b>Register</b></button>
		  </div><!--/.form-group -->
	
		 </div>
		<!-- -->
	    </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		
		<div class="col-md-6 col-sm-6 col-xs-12">
	     <!-- --> 
		  <div align="center" class="form-group">
			<h4><b>Login</b></h4><hr style="border-bottom: 1px solid #eee;"/>
		  </div><!--/.form-group -->
		  
		  <div id="customer_header_loginAlert" class="form-group"></div><!--/.form-group -->
		 
		  <div class="form-group">
			<label>Mobile Number</label>
			<input id="customer_login_mobileNumber" type="text" class="form-control" placeholder="Enter Mobile Number"/>
		  </div><!--/.form-group -->
		  
		  <div id="header_customer_loginField" class="hide-block">
			  <div class="form-group">
				<label>Account Password</label>
				<input id="customer_login_accPwd" type="password" class="form-control" placeholder="Enter Account Password"/>
			  </div><!--/.form-group -->
		  </div>
		  <div id="header_customer_forgotPwdField" class="hide-block">
		      <div class="form-group">
				<label>OTP Code</label>
				<input id="customer_login_otpCode" type="text" class="form-control" placeholder="Enter OTP Code"/>
				<div align="right"><a href="#" onclick="javascript:rsbr_login_newOTPCode();">Send New OTPCode?</a></div>
			  </div><!--/.form-group -->
			  <div class="form-group">
				<label>New Account Password</label>
				<input id="customer_login_newAccPwd" type="password" class="form-control" placeholder="Enter Account Password"/>
			  </div><!--/.form-group -->
			  <div class="form-group">
				<label>Confirm Account Password</label>
				<input id="customer_login_ConfirmAccPwd" type="password" class="form-control" placeholder="Enter Confirm Account Password"/>
			  </div><!--/.form-group -->
		  </div>
		  
		  <div align="right" class="form-group">
			<a href="#" id="header_customer_frgtPasswordTxt" onclick="javascript:toggle_loginFrgtPwdForm();">Forgot Password?</a>
		  </div><!--/.form-group -->
		  
		  <div class="form-group">
			<button id="header_customer_loginOrUpdatePwd" class="btn btn-primary form-control" onclick="javascript:rsbr_customer_login();"><b>Login</b></button>
		  </div><!--/.form-group -->
		<!-- -->
	    </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		
	   </div><!--/.row -->
	  </div><!--/.container-fluid -->
	  <!-- -->
      </div>
    </div>

  </div>
</div>
<!-- Modal :::End -->
<script type="text/javascript">
var FRGTPWD = false;
var LOGIN_STATUS='LOGIN'; // LOGIN / UPDATE_AND_LOGIN
function init_loginFrgtPwdForm(){
 FRGTPWD = false;
 LOGIN_STATUS = 'LOGIN';
 toggle_loginFrgtPwdForm();
}
function toggle_loginFrgtPwdForm(){
 if(!FRGTPWD){ // Show Login Form
  if($('#header_customer_loginField').hasClass('hide-block')) { 
     $('#header_customer_loginField').removeClass('hide-block'); 
  }
  if(!$('#header_customer_forgotPwdField').hasClass('hide-block')) { 
    $('#header_customer_forgotPwdField').addClass('hide-block'); 
  }
  FRGTPWD=true;
  document.getElementById("header_customer_frgtPasswordTxt").innerHTML='Forgot Password?';
  document.getElementById("header_customer_loginOrUpdatePwd").innerHTML='<b>Login</b>';
  LOGIN_STATUS = 'LOGIN';
 } else { // Show Forgot Password
   if($('#header_customer_forgotPwdField').hasClass('hide-block')) { 
     $('#header_customer_forgotPwdField').removeClass('hide-block'); 
   }
   if(!$('#header_customer_loginField').hasClass('hide-block')) { 
     $('#header_customer_loginField').addClass('hide-block'); 
   }
   FRGTPWD=false;
   document.getElementById("header_customer_frgtPasswordTxt").innerHTML='Back to Login';
   document.getElementById("header_customer_loginOrUpdatePwd").innerHTML='<b>Update and Login</b>';
   LOGIN_STATUS = 'UPDATE_AND_LOGIN';
 }
}
</script>
<script type="text/javascript">
var REGISTER_NAME;
var REGISTER_MOBILENUMBER;
var REGISTER_OTPCODE = Math.floor(Math.random()*90000) + 10000;
var LOGIN_OTPCODE = Math.floor(Math.random()*90000) + 10000;
function rsbr_register_newOTPCode(){
 REGISTER_OTPCODE=Math.floor(Math.random()*90000) + 10000;
 console.log("REGISTER_OTPCODE: "+REGISTER_OTPCODE);
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
 { action:'SEND_OTPCODE', otpcode:REGISTER_OTPCODE},function(response){ console.log(response); });
}
function rsbr_login_newOTPCode(){
 LOGIN_OTPCODE=Math.floor(Math.random()*90000) + 10000;
 console.log("LOGIN_OTPCODE: "+LOGIN_OTPCODE);
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
 { action:'SEND_OTPCODE', otpcode:LOGIN_OTPCODE},function(response){ console.log(response); });
}
function display_registerForm_afterVerify(){
 if($("#header_customer_registerAfterVerify").hasClass('hide-block')){
   $("#header_customer_registerAfterVerify").removeClass('hide-block');
 }
}
function hide_registerForm_afterVerify(){
 if(!$("#header_customer_registerAfterVerify").hasClass('hide-block')){
   $("#header_customer_registerAfterVerify").addClass('hide-block');
 }
}
function rsbr_customer_register_mobileVerify(){
 REGISTER_NAME = document.getElementById("customer_register_name").value;
 REGISTER_MOBILENUMBER = document.getElementById("customer_register_mobileNumber").value;
 hide_registerForm_afterVerify();
 if(REGISTER_NAME.length>0){
  if(REGISTER_MOBILENUMBER.length>0){
   if(REGISTER_MOBILENUMBER.length==10){
    /* Check Mobile Number Exists or not in Database */
	js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.customer.php',
	{ action:'CHECK_MOBILENUMBER',mobileNumber:REGISTER_MOBILENUMBER }, function(response){
	 console.log(response);
	 response = JSON.parse(response);
	 if(response.length==0){
	   // Freeze Mobile Number
	   document.getElementById("customer_register_mobileNumber").disabled=true;
	   display_registerForm_afterVerify();
       js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
	   { action:'SEND_OTPCODE', otpcode:REGISTER_OTPCODE},function(response){
	     console.log(response);
	   });
	 } else { div_display_warning('customer_header_registerAlert','W019'); } // W012: Mobile Number Registered, Please Login
	});
	// 
    
   } else { div_display_warning('customer_header_registerAlert','W011'); } // W011: Invalid Mobile Number
  } else { div_display_warning('customer_header_registerAlert','W010'); } // W010: Missing Mobile Number
 } else { div_display_warning('customer_header_registerAlert','W009'); } // W009: Missing Customer Name
 //      
// 	     
}
function rsbr_customer_register(){
 var otpcode = document.getElementById("customer_register_otpcode").value;
 var accPwd = document.getElementById("customer_register_accPwd").value;
 var confirmAccPwd = document.getElementById("customer_register_confirmAccPwd").value;
 console.log("REGISTER_OTPCODE: "+REGISTER_OTPCODE+"  otpcode: "+otpcode);
 if(otpcode.length>0){ 
 if(REGISTER_OTPCODE.toString()===otpcode.trim()){
   if(accPwd.length>=6){
   if(accPwd===confirmAccPwd){
     js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.customer.php',
	 { action:'ADD_ACCOUNT_INFO', name:REGISTER_NAME, mobileNumber:REGISTER_MOBILENUMBER, acc_pwd:accPwd },
	 function(response){ console.log(response); });
   } else { div_display_warning('customer_header_registerAlert','W018'); } //  W018 : Account Password =#= Confirm password
  } else { div_display_warning('customer_header_registerAlert','W020'); } // W020 : 6-characters Pwd
 } else { div_display_warning('customer_header_registerAlert','W014'); } // W014 : Invalid OTPCode
 } else { div_display_warning('customer_header_registerAlert','W013'); } // W013 : Missing OTPCode
}
function rsbr_customer_login(){
 if(LOGIN_STATUS==='LOGIN'){
    var mobileNumber = document.getElementById("customer_login_mobileNumber").value;
    var acc_pwd = document.getElementById("customer_login_accPwd").value;
	if(mobileNumber.length>0){
	if(mobileNumber.length===10){
	if(acc_pwd.length>0){
	  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.customer.php', 
	  { action:'GET_ACCOUNT_INFO', mobileNumber:mobileNumber, acc_pwd:acc_pwd },
	  function(response){ console.log(response); 
	    response=JSON.parse(response);
	    if(response.length>0){
	      window.location.href=PROJECT_URL+'customer/dashboard';
	    } else { div_display_warning('customer_header_loginAlert','W021'); } // W021: Mobile Number or Password is wrong
	  });
	} else { div_display_warning('customer_header_loginAlert','W015'); } // W015: Missing Account Password
	} else { div_display_warning('customer_header_loginAlert','W011'); } // W011: Invalid Mobile Number
	} else { div_display_warning('customer_header_loginAlert','W010'); } // W010: Missing Mobile Number
	
   
 } else if(LOGIN_STATUS==='UPDATE_AND_LOGIN'){
   console.log("LOGIN_OTPCODE: "+LOGIN_OTPCODE);
    var mobileNumber = document.getElementById("customer_login_mobileNumber").value;
    var otpcode = document.getElementById("customer_login_otpCode").value;
	var newAccPwd = document.getElementById("customer_login_newAccPwd").value;
	var confirmAccPwd = document.getElementById("customer_login_ConfirmAccPwd").value;
	if(mobileNumber.length>0){
	if(mobileNumber.length===10){
	if(otpcode.length>0){
    if(LOGIN_OTPCODE.toString()===otpcode.trim()){
	if(newAccPwd.length>=6){
    if(newAccPwd===confirmAccPwd){
	
	js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.customer.php', 
	{ action:'UPDATE_ACCOUNT_AND_LOGIN', mobileNumber:mobileNumber, acc_pwd:newAccPwd },
	function(response){ console.log(response); 
	  response = JSON.parse(response);
	  if(response.length>0){
	    window.location.href=PROJECT_URL+'customer/dashboard';
	  }
	});
	    
	} else { div_display_warning('customer_header_loginAlert','W018'); } //  W018 : Account Password =#= Confirm password
    } else { div_display_warning('customer_header_loginAlert','W020'); } // W020 : 6-characters Pwd
	} else { div_display_warning('customer_header_loginAlert','W014'); } // W014 : Invalid OTPCode
    } else { div_display_warning('customer_header_loginAlert','W013'); } // W013 : Missing OTPCode
	} else { div_display_warning('customer_header_loginAlert','W011'); } // W011: Invalid Mobile Number
	} else { div_display_warning('customer_header_loginAlert','W010'); } // W010: Missing Mobile Number
 }
// 
}
</script>