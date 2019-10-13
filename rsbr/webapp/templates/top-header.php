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
<script type="text/javascript">
function customerprofile_modal_init(){
 customerprofile_view_nameChangeBtn();
 customerprofile_view_mobileChangeBtn();
 customerprofile_hide_mobileOTPForm();
}
function customerprofile_view_nameChangeBtn(){
 if($('#customer_profile_name_changeBtn').hasClass('hide-block')){
   $('#customer_profile_name_changeBtn').removeClass('hide-block');
 }
 if(!$('#customer_profile_name_saveBtn').hasClass('hide-block')){
   $('#customer_profile_name_saveBtn').addClass('hide-block');
 }
}
function customerprofile_view_nameSaveBtn(){
 if($('#customer_profile_name_saveBtn').hasClass('hide-block')){
   $('#customer_profile_name_saveBtn').removeClass('hide-block');
 }
 if(!$('#customer_profile_name_changeBtn').hasClass('hide-block')){
   $('#customer_profile_name_changeBtn').addClass('hide-block');
 }
}
function customerprofile_view_mobileChangeBtn(){
 if($('#customer_profile_mobile_changeBtn').hasClass('hide-block')){
   $('#customer_profile_mobile_changeBtn').removeClass('hide-block');
 }
 if(!$('#customer_profile_mobile_saveBtn').hasClass('hide-block')){
   $('#customer_profile_mobile_saveBtn').addClass('hide-block');
 }
}
function customerprofile_view_mobileSaveBtn(){
 if($('#customer_profile_mobile_saveBtn').hasClass('hide-block')){
   $('#customer_profile_mobile_saveBtn').removeClass('hide-block');
 }
 if(!$('#customer_profile_mobile_changeBtn').hasClass('hide-block')){
   $('#customer_profile_mobile_changeBtn').addClass('hide-block');
 }
}
function customerprofile_screen_changeName(){
 customerprofile_view_nameSaveBtn();
 document.getElementById("customer_profile_name").disabled=false;
}
function customerprofile_screen_saveName(){
 var accountType = document.getElementById("customer_profile_accountType").value;
 var name = document.getElementById("customer_profile_name").value;
 customerprofile_view_nameChangeBtn();
 document.getElementById("customer_profile_name").disabled=true;
 if(accountType==='CUSTOMER'){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.customer.php',
 { action: 'UPDATE_ACCOUNT_INFO', account_Id: USER_ACCOUNT_ID, name: name },
 function(response){ console.log(response); 
   div_display_success('customerprofile_general_alert','S003'); // S003 : Name updated Successfully.
 });
 } else if(accountType==='ADMINISTRATOR'){ // Admin
   js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.admin.php',
   { action: 'UPDATE_ACCOUNT_INFO', admin_Id: USER_ACCOUNT_ID, name: name },
   function(response){ console.log(response); 
     div_display_success('customerprofile_general_alert','S003'); // S003 : Name updated Successfully.
   });
 }
}
function customerprofile_screen_changeMobile(){
  customerprofile_view_mobileSaveBtn();
  document.getElementById("customer_profile_mobile").disabled=false;
}
function customerprofile_screen_saveMobile(){
  customerprofile_view_mobileChangeBtn();
  customerprofile_view_mobileOTPForm();
  document.getElementById("customer_profile_mobile").disabled=true;
}
var CHANGEMOBILE_OTPCODE = Math.floor(Math.random()*90000) + 10000;
function customerprofile_screen_changeMobileOTPCode(){
var phoneNumber = document.getElementById("customer_profile_mobile").value;
var msg="Your Request for changing Mobile Number is accepted. Please Enter your OTP Code: "+CHANGEMOBILE_OTPCODE;
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
 { action:'SEND_OTPCODE', msg:encodeURI(msg), mobile:phoneNumber },function(response){ console.log(response); });
  div_display_success('customerprofile_general_alert','S006');
}
function customerprofile_screen_newOTPCode(){
  CHANGEMOBILE_OTPCODE = Math.floor(Math.random()*90000) + 10000;
  console.log("CHANGEMOBILE_OTPCODE: "+CHANGEMOBILE_OTPCODE);
  var phoneNumber = document.getElementById("customer_profile_mobile").value;
  var msg="Your New OTP Code for changing Mobile Number is "+CHANGEMOBILE_OTPCODE;
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
 { action:'SEND_OTPCODE', msg:encodeURI(msg), mobile:phoneNumber },function(response){ console.log(response); });
 div_display_success('customerprofile_general_alert','S007');
}
function customerprofile_view_mobileOTPForm(){
 $("#customer_profile_mobileOTP_form").removeClass('hide-block');
 customerprofile_screen_changeMobileOTPCode();
}
function customerprofile_hide_mobileOTPForm(){
 $("#customer_profile_mobileOTP_form").addClass('hide-block');
 document.getElementById("customer_profile_otpcode").innerHTML='';
}
function customerprofile_screen_verifyAndSaveMobile(){
 var accountType = document.getElementById("customer_profile_accountType").value;
 var mobileNumber = document.getElementById("customer_profile_mobile").value;
 var otpcode = document.getElementById("customer_profile_otpcode").value;
 console.log("otpcode: "+otpcode+"  CHANGEMOBILE_OTPCODE: "+CHANGEMOBILE_OTPCODE);
 if(CHANGEMOBILE_OTPCODE.toString()===otpcode.trim()){
   customerprofile_hide_mobileOTPForm();
   if(accountType==='CUSTOMER'){
     js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.customer.php',
     { action:'UPDATE_ACCOUNT_INFO', account_Id:USER_ACCOUNT_ID, mobileNumber:mobileNumber },
     function(response){ console.log(response); 
       div_display_success('customerprofile_general_alert','S004'); // S004 : MobileNumber updated Successfully.
     });
   } else if(accountType==='ADMINISTRATOR'){ // Admin
      js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.admin.php',
      { action: 'UPDATE_ACCOUNT_INFO', admin_Id: USER_ACCOUNT_ID, mobileNumber: mobileNumber },
      function(response){ console.log(response); 
        div_display_success('customerprofile_general_alert','S004'); // S003 : MobileNumber updated Successfully.
      });
   }
 }
}
function customerprofile_screen_changePassword(){
 var accountType = document.getElementById("customer_profile_accountType").value;
 var pwd = document.getElementById("customer_profile_pwd").value;
 var confirmpwd = document.getElementById("customer_profile_confirmpwd").value;
 if(pwd.length>=6){
   if(pwd===confirmpwd){
     document.getElementById("customer_profile_pwd").value='';
	 document.getElementById("customer_profile_confirmpwd").value='';
	 if(accountType==='CUSTOMER'){
     js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.customer.php',
	  { action: 'UPDATE_ACCOUNT_INFO', account_Id: USER_ACCOUNT_ID, acc_pwd: pwd },
	  function(response){ console.log(response); 
	  div_display_success('customerprofile_changePwd_alert','S005'); // S005: Password changed Successfully.
	  });
	 } else if(accountType==='ADMINISTRATOR'){ // Admin
      js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.admin.php',
      { action: 'UPDATE_ACCOUNT_INFO', admin_Id: USER_ACCOUNT_ID, acc_pwd: pwd },
      function(response){ console.log(response); 
        div_display_success('customerprofile_general_alert','S005'); // S005 : Password changed Successfully.
      });
    }
   } else { div_display_warning('customerprofile_changePwd_alert','W018'); } // W018 : Account Password and Confirm Account Password doesn't matched
 } else { div_display_warning('customerprofile_changePwd_alert','W020'); } //  W020 : Account Password should be atleast 6 charcaters
}

	// customer_profile_name  	customer_profile_name_changeBtn  customer_profile_name_saveBtn
	// customer_profile_mobile  customer_profile_mobile_changeBtn  customer_profile_mobile_saveBtn
	// customer_profile_pwd  customer_profile_confirmpwd
</script>
<!-- Customer Profile Info ::: Start -->
<div id="customerProfileInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">My Profile</h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<div class="container-fluid">
		  <div class="row">
		    <div class="col-md-12 col-sm-12 col-xs-12">
		     <!-- -->
			 <div id="customerprofile_general_alert" class="form-group"></div>
			 <div class="form-group">
			   <label>Name</label>
			   <div class="input-group">
			      <input type="hidden" id="customer_profile_accountType" class="form-control" value="<?php echo $_SESSION["USER_ACCOUNT_TYPE"]; ?>"/>
			      <input id="customer_profile_name" type="text" class="form-control" placeholder="Enter your Name" 
				  value="<?php echo $_SESSION["USER_ACCOUNT_NAME"]; ?>" disabled/>
				  <div class="input-group-btn">
				    <button id="customer_profile_name_changeBtn" class="btn btn-primary hide-block" 
					onclick="javascript:customerprofile_screen_changeName();"><b>Change</b></button>
					<button id="customer_profile_name_saveBtn" class="btn btn-primary hide-block" 
					onclick="javascript:customerprofile_screen_saveName();"><b>Save</b></button>
				  </div>
			   </div>
			 </div><!--/.form-group -->

			 <div class="form-group">
			   <label>Mobile Number</label>
			   <div class="input-group">
			      <input id="customer_profile_mobile" type="text" class="form-control" placeholder="Enter your Mobile Number" 
				  value="<?php echo $_SESSION["USER_MOBILE_NUMBER"]; ?>" disabled/>
				  <div class="input-group-btn">
				    <button id="customer_profile_mobile_changeBtn" class="btn btn-primary hide-block"
					onclick="javascript:customerprofile_screen_changeMobile();"><b>Change</b></button>
					<button id="customer_profile_mobile_saveBtn" class="btn btn-primary hide-block" 
					onclick="javascript:customerprofile_screen_saveMobile();"><b>Save</b></button>
				  </div>
			   </div>
			 </div><!--/.form-group -->
			 
			 <div id="customer_profile_mobileOTP_form" class="hide-block">
			  <div class="form-group">
			   <label>OTPCode</label>
			   <div class="input-group">
			     <input id="customer_profile_otpcode" type="text" class="form-control" placeholder="Enter your OTPCode"/>
				 <div class="input-group-btn">
				   <button class="btn btn-primary" onclick="javascript:customerprofile_screen_verifyAndSaveMobile();"><b>Verify and Save Mobile</b></button>
				 </div>
			   </div>
			  </div><!--/.form-group -->
			 
			  <div class="form-group">
			   <div align="right"><a href="#" onclick="javascript:customerprofile_screen_newOTPCode();">Send New OTPCode?</a></div>
			  </div><!--/.form-group -->
			 </div>
			 
			 <div class="form-group">
			   <h4><b>Change Password</b></h4><hr/>
			 </div><!--/.form-group -->
			 
			 <div id="customerprofile_changePwd_alert" class="form-group"></div>
			 
			 <div class="form-group">
			   <label>Password</label>
			   <input id="customer_profile_pwd" type="password" class="form-control" placeholder="Enter your Password"/>
			 </div><!--/.form-group -->
			 
			 <div class="form-group">
			   <label>Confirm Password</label>
			   <input id="customer_profile_confirmpwd" type="password" class="form-control" placeholder="Enter your Confirm Password"/>
			 </div><!--/.form-group -->
			 
			 <div align="right" class="form-group">
			   <button class="btn btn-primary" onclick="javascript:customerprofile_screen_changePassword();"><b>Change Password</b></button>
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
<!-- Customer Profile Info ::: End -->
<style>
.header-info-link,.header-info-link:hover,.header-info-link:focus,.header-info-link:active { text-decoration:none;color:#ffc607; }
</style>
<div class="container-fluid" style="background-color:#0e2551;color:#ffc607;width:100%;min-height:35px;">
 <div class="row">
   <div class="col-md-4 col-sm-4 col-xs-12">
     <div align="center" style="margin-top:8px;">
        <i class="fa fa-envelope" aria-hidden="true" style="color:#ffc607;"></i>&nbsp;&nbsp;
		<span style="font-size:12px;">admin@royalsuccessbookofrecords.com</span>
	 </div>
   </div>
   <div class="col-md-4 col-sm-4 col-xs-12">
     <div align="center" style="margin-top:8px;">
       <i class="fa fa-headphones" aria-hidden="true"></i>&nbsp;&nbsp;
	   <span style="font-size:12px;">+91-9160111369, +91-9052111369</span>
     </div>
   </div>
   <div class="col-md-4 col-sm-4 col-xs-12">
     <div align="center" style="margin-top:8px;">
	    <a href="https://www.facebook.com/Royalsuccessbookofrecords-114737719911651" target="_blank" class="header-info-link">
          <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;
		</a>
		<a href="https://twitter.com/@royalsucces" target="_blank" class="header-info-link">
		  <i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;&nbsp;
		</a>
		<a href="https://www.instagram.com/royalsuccessbookofrecords/" target="_blank" class="header-info-link">
		  <i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;&nbsp;
		</a>
		<a href="https://api.whatsapp.com/send?phone=919160111369" target="_blank" class="header-info-link">
		  <i class="fa fa-whatsapp" aria-hidden="true"></i>
		</a>
	 </div>
   </div>
 </div><!--/.row -->
</div><!--/.container-fluid -->

<nav class="navbar navbar-default" style="margin-bottom:0px;padding-top:10px;position:sticky;border:0px;border-radius:0px;background-color:#f7f7f7;">

		  <div align="center" class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#" style="cursor:pointer;color:#0e2551;" onclick="javascript:sideWrapperToggle();">
			    <span class="glyphicon glyphicon-align-justify"></span>
			  </a>
			  <span><img src="images/logo.png" style="width:110px;height:110px;"/></span>
			</div>
		
			<div id="topMenu" style="margin-top:2%;" class="navbar-form navbar-left">

			  <?php
			    if($_SESSION["USER_ACCOUNT_TYPE"]=='ADMINISTRATOR') { 
			  ?>
			 
			  <?php } if($_SESSION["USER_ACCOUNT_TYPE"]=='CUSTOMER' || $_SESSION["USER_ACCOUNT_TYPE"]=='ADMINISTRATOR') {  ?>
			  <div class="form-group">
			    <a href="#" data-toggle="modal" data-target="#customerProfileInfo" 
				onclick="javascript:customerprofile_modal_init();">
			      <button class="btn btn-rsbr3-o form-control">My Profile</button>
				</a>
			  </div>
			  <?php } else { ?> 
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
			  
			  <?php if(isset($_SESSION["USER_ACCOUNT_TYPE"]) && strlen($_SESSION["USER_ACCOUNT_TYPE"])>0) { ?>
			   <div class="form-group">
			    <button class="btn btn-default btn-rsbr3-o form-control" onclick="javascript:logout();">logout</button>
			  </div>
			  <?php }?> 
			   
			 
			</div>
			
		  </div>
	  </nav>
<div class="container-fluid" 
style="background-color:#0e2551;color:#ffc607;width:100%;min-height:35px;">
 <div class="row">
   <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/about-us">
     <div class="col-md-3 col-sm-3 col-xs-12" 
       style="background-color:#e91e63;color:#fff;min-height:35px;font-weight:bold;">
         <div align="center" style="margin-top:8px;">About us</div>
     </div>
   </a>
   <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/user/gallery">
     <div class="col-md-3 col-sm-3 col-xs-12" 
        style="background-color:#2196f3;color:#fff;min-height:35px;font-weight:bold;">
         <div align="center" style="margin-top:8px;">Our Gallery</div>
     </div>
   </a>
   <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/user/panelboard">
     <div class="col-md-3 col-sm-3 col-xs-12" 
      style="background-color:#4caf50;color:#fff;min-height:35px;font-weight:bold;">
        <div align="center" style="margin-top:8px;">Our Panel Board</div>
     </div>
   </a>
   <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/user/media">
     <div class="col-md-3 col-sm-3 col-xs-12" 
      style="background-color:#9c27b0;color:#fff;min-height:35px;font-weight:bold;">
       <div align="center" style="margin-top:8px;">Our News</div>
     </div>
   </a>
 </div><!--/.row -->
</div><!--/.container-fluid -->



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
			   <button class="btn btn-primary" onclick="javascript:rsbr_customer_register_mobileVerify(event);"><b>Verify</b></button>
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
			<button class="btn btn-primary form-control" onclick="javascript:rsbr_customer_register(event);"><b>Register</b></button>
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
			<button id="header_customer_loginOrUpdatePwd" class="btn btn-primary form-control" onclick="javascript:rsbr_customer_login(event);"><b>Login</b></button>
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
   var mobileNumber = document.getElementById("customer_login_mobileNumber").value;
   if(mobileNumber.length===10){
   document.getElementById("customer_header_loginAlert").innerHTML='';
   if($('#header_customer_forgotPwdField').hasClass('hide-block')) { 
     $('#header_customer_forgotPwdField').removeClass('hide-block'); 
   }
   if(!$('#header_customer_loginField').hasClass('hide-block')) { 
     $('#header_customer_loginField').addClass('hide-block'); 
   }
   div_display_success('customer_header_loginAlert','S006');
   rsbr_login_otpSend();
   FRGTPWD=false;
   document.getElementById("header_customer_frgtPasswordTxt").innerHTML='Back to Login';
   document.getElementById("header_customer_loginOrUpdatePwd").innerHTML='<b>Update and Login</b>';
   LOGIN_STATUS = 'UPDATE_AND_LOGIN';
   } else { div_display_warning('customer_header_loginAlert','W010'); } // Missing Mobile Number
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
 div_display_success('customer_header_registerAlert','S007');
 rbsr_register_otpsend();
}
function rbsr_register_otpsend(){
REGISTER_MOBILENUMBER = document.getElementById("customer_register_mobileNumber").value;
console.log("REGISTER_MOBILENUMBER: "+REGISTER_MOBILENUMBER);
var msg="Thanks for Registering RSBR. Your OTP Code is "+REGISTER_OTPCODE;
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
 { action:'SEND_OTPCODE', msg:encodeURI(msg), mobile:REGISTER_MOBILENUMBER },function(response){ console.log(response); });
 
}
function rsbr_login_newOTPCode(){
 LOGIN_OTPCODE=Math.floor(Math.random()*90000) + 10000;
 console.log("LOGIN_OTPCODE: "+LOGIN_OTPCODE);
 console.log("CUSTOMER_LOGIN: "+CUSTOMER_LOGIN_MOBILENUMBER);
 div_display_success('customer_header_loginAlert','S007');
 rsbr_login_otpSend();
 
}
function rsbr_login_otpSend(){
 CUSTOMER_LOGIN_MOBILENUMBER = document.getElementById("customer_login_mobileNumber").value;
 console.log("CUSTOMER_LOGIN_MOBILENUMBER: "+CUSTOMER_LOGIN_MOBILENUMBER);
 var msg="We can help you in login to your Account. Your OTP Code is "+LOGIN_OTPCODE;
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
 { action:'SEND_OTPCODE', msg:encodeURI(msg), mobile:CUSTOMER_LOGIN_MOBILENUMBER },function(response){ console.log(response); });
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
function rsbr_customer_register_mobileVerify(event){
 event.preventDefault();
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
	   div_display_success('customer_header_registerAlert','S006');
	   document.getElementById("customer_register_mobileNumber").disabled=true;
	   display_registerForm_afterVerify();
       rbsr_register_otpsend();
	 } else { div_display_warning('customer_header_registerAlert','W019'); } // W012: Mobile Number Registered, Please Login
	});
	// 
    
   } else { div_display_warning('customer_header_registerAlert','W011'); } // W011: Invalid Mobile Number
  } else { div_display_warning('customer_header_registerAlert','W010'); } // W010: Missing Mobile Number
 } else { div_display_warning('customer_header_registerAlert','W009'); } // W009: Missing Customer Name
 //      
// 	     
}
function rsbr_customer_register(event){
 event.preventDefault();
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
	 function(response){ console.log(response);
       window.location.href=PROJECT_URL+'customer/dashboard';
	 }); 
   } else { div_display_warning('customer_header_registerAlert','W018'); } //  W018 : Account Password =#= Confirm password
  } else { div_display_warning('customer_header_registerAlert','W020'); } // W020 : 6-characters Pwd
 } else { div_display_warning('customer_header_registerAlert','W014'); } // W014 : Invalid OTPCode
 } else { div_display_warning('customer_header_registerAlert','W013'); } // W013 : Missing OTPCode
}
var CUSTOMER_LOGIN_MOBILENUMBER;
function rsbr_customer_login(event){
 event.preventDefault();
 if(LOGIN_STATUS==='LOGIN'){
    var mobileNumber = document.getElementById("customer_login_mobileNumber").value;
	 CUSTOMER_LOGIN_MOBILENUMBER=mobileNumber;
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