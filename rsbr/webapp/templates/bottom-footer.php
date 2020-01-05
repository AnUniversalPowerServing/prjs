<!-- -->
<style>
.footer-opt { margin-top:5%;cursor:pointer; }
</style>
<!-- -->
<!-- -->
<div id="adminPanel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Login</b></h4>
      </div>
<script type="text/javascript">
var ADMINPANEL_OTPCODE = Math.floor(Math.random()*90000) + 10000;
function adminPanel_formload_frgtPwd(event){
  event.preventDefault();
  if($('#adminPanel_form_frgtPwd').hasClass('hide-block')){ $('#adminPanel_form_frgtPwd').removeClass('hide-block'); }
  if(!$('#adminPanel_form_login').hasClass('hide-block')){ $('#adminPanel_form_login').addClass('hide-block'); }
}
function adminPanel_formload_login(event){
  event.preventDefault();
  if(!$('#adminPanel_form_frgtPwd').hasClass('hide-block')){ $('#adminPanel_form_frgtPwd').addClass('hide-block'); }
  if($('#adminPanel_form_login').hasClass('hide-block')){ $('#adminPanel_form_login').removeClass('hide-block'); }
}
function rsbr_adminPanel_newOTPCode(){
 ADMINPANEL_OTPCODE=Math.floor(Math.random()*90000) + 10000;
 console.log("ADMINPANEL_OTPCODE: "+ADMINPANEL_OTPCODE);
 var phoneNumber = document.getElementById("admin_frgtPwd_mobileNumber").value;
 var msg="Your New OTP Code for changing Mobile Number is "+ADMINPANEL_OTPCODE;
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
 { action:'SEND_OTPCODE', msg:encodeURI(msg), mobile:phoneNumber },function(response){ console.log(response); });
 div_display_success('adminPanel_header_loginAlert','S007');
}
var ADMINPANEL_MOBILESTATUS;
function adminPanelMobileNumberVerify(event){
 event.preventDefault();
 var mobileNumber = document.getElementById("admin_frgtPwd_mobileNumber").value;
 /* Check Mobile Number exists or not in Database */
 /* IF EXISTS, send OTPCode */
 /* IF NOT EXISTS, alert (Not Exists) */
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.admin.php',
 { action:'GET_ACCOUNT_INFO_MOBILE', mobileNumber:mobileNumber },function(response){ 
   console.log(response); 
   response = JSON.parse(response);
   if(response.length==0){
       div_display_warning('adminPanel_header_loginAlert','W011');
	   ADMINPANEL_MOBILESTATUS = false;
	   adminPanel_hide_OtpCodeForm();
   } else { 
      div_display_success('adminPanel_header_loginAlert','S002');
      ADMINPANEL_MOBILESTATUS = true;
	  document.getElementById("admin_frgtPwd_mobileNumber").disabled=true;
	 adminPanel_view_OtpCodeForm();
	   // Send OTP Code to User
	   otpCodeSendUp();
   }
 });
}
function otpCodeSendUp(){
 console.log("ADMINPANEL_OTPCODE: "+ADMINPANEL_OTPCODE);
 var phoneNumber = document.getElementById("admin_frgtPwd_mobileNumber").value;
 var msg="Your New OTP Code for changing Mobile Number is "+ADMINPANEL_OTPCODE;
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.otpcode.php',
 { action:'SEND_OTPCODE', msg:encodeURI(msg), mobile:phoneNumber },function(response){ console.log(response); });
 div_display_success('adminPanel_header_loginAlert','S006');
}
function changePwdAndLogin(event){
 event.preventDefault();
 if(ADMINPANEL_MOBILESTATUS){
   var mobileNumber = document.getElementById("admin_frgtPwd_mobileNumber").value;
   var otpcode = document.getElementById("admin_frgtPwd_otpcode").value;
   var pwd = document.getElementById("admin_frgtPwd_pwd").value;
   var confirmpwd = document.getElementById("admin_frgtPwd_confirmpwd").value;
   console.log("mobileNumber: "+mobileNumber);
   console.log("otpcode: "+otpcode+" ADMINPANEL_OTPCODE: "+ADMINPANEL_OTPCODE);
   console.log("pwd: "+pwd);
   console.log("confirmpwd: "+confirmpwd);
   if(mobileNumber.length>0){
    if(otpcode.length>0){
	 if(ADMINPANEL_OTPCODE.toString()===otpcode.trim()){  
      if(pwd.length>0){
       if(confirmpwd.length>0){
	    console.log("pwd=confirmpwd: "+(pwd===confirmpwd));
	    if(pwd===confirmpwd){
		  alert("Done");
          js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.admin.php',
		  { action:'UPDATE_ACCOUNT_INFO', admin_Id:1, acc_pwd:pwd },function(response){
		     console.log(response);
		     window.location.href=PROJECT_URL+"admin/dashboard";
		  });
		} else { div_display_warning('adminPanel_header_loginAlert','W018'); } 
       } else { div_display_warning('adminPanel_header_loginAlert','W016'); } // confirmpwd
     } else { div_display_warning('adminPanel_header_loginAlert','W015'); } // pwd
	 } else { div_display_warning('adminPanel_header_loginAlert','W014'); } // ADMINPANEL_OTPCODE=#=otpcode
    } else { div_display_warning('adminPanel_header_loginAlert','W013'); } // otpcode
   } else { div_display_warning('adminPanel_header_loginAlert','W010'); } // mobileNumber
 } else { div_display_warning('adminPanel_header_loginAlert','W012'); } // mobileNumber not registered
}
function adminPanelLogin(event){
 event.preventDefault();
 var username = document.getElementById("admin_login_username").value;
 var pwd = document.getElementById("admin_login_pwd").value;
 if(username.length>0){
   if(pwd.length>0){
    js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.accounts.admin.php',
    { action:'GET_ACCOUNT_INFO', username:username, acc_pwd:pwd },function(response){
	  console.log(response);
	  response=JSON.parse(response);
	  if(response.length>0){ window.location.href=PROJECT_URL+"admin/dashboard"; }
	  else { div_display_warning('adminPanel_header_loginAlert','W026'); }
    });
   } else { div_display_warning('adminPanel_header_loginAlert','W015'); }
 } else { div_display_warning('adminPanel_header_loginAlert','W025');  }
}

function adminPanel_view_OtpCodeForm(){
 if($('#admin_otpcode_form').hasClass('hide-block')){ $('#admin_otpcode_form').removeClass('hide-block'); }
}
function adminPanel_hide_OtpCodeForm(){
 if(!$('#admin_otpcode_form').hasClass('hide-block')){ $('#admin_otpcode_form').addClass('hide-block'); }
}
</script>
      <div class="modal-body">
        <!-- -->
		<div class="container-fluid">
		<div class="row">
		   <div class="col-md-12 col-sm-12 col-xs-12">
	     <!-- --> 
		
		<div id="adminPanel_header_loginAlert" class="form-group"></div><!--/.form-group -->
		
		 <div id="adminPanel_form_frgtPwd" class="hide-block">
		   
		  <div class="form-group">
			<label>MobileNumber</label>
			<div class="input-group">
			  <input id="admin_frgtPwd_mobileNumber" type="text" class="form-control" placeholder="Enter Mobile Number"/>
			  <div class="input-group-btn">
			    <button class="btn btn-primary" onclick="javascript:adminPanelMobileNumberVerify(event);"><b>Verify</b></button>
			  </div>
			</div>
		  </div><!--/.form-group -->
	  
		  <div id="admin_otpcode_form" class="hide-block">
		  
		    <div class="form-group">
			   <label>OTP Code</label>
			   <input id="admin_frgtPwd_otpcode" type="text" class="form-control" placeholder="Enter OTP Code"/>
		    </div><!--/.form-group -->
		   
		    <div align="right"><a href="#" onclick="javascript:rsbr_adminPanel_newOTPCode();">Send New OTPCode?</a></div>
			
		  </div>
		   
		  <div class="form-group">
			<label>Password</label>
			<input id="admin_frgtPwd_pwd" type="password" class="form-control" placeholder="Enter Password"/>
		  </div><!--/.form-group -->
		  
		  <div class="form-group">
			<label>Confirm Password</label>
			<input id="admin_frgtPwd_confirmpwd" type="password" class="form-control" placeholder="Enter Confirm Password"/>
		  </div><!--/.form-group -->
		  
		  <div align="right" class="form-group">
			<a href="#" onclick="adminPanel_formload_login(event);">Back to Login</a>
		  </div><!--/.form-group -->
		  
		  <div align="right" class="form-group">
			<button class="btn btn-primary" onclick="javascript:changePwdAndLogin(event);"><b>Change Password and login</b></button>
		  </div><!--/.form-group -->
		  
		 </div>
		  
		 <div id="adminPanel_form_login" class="hide-block">
		  <div class="form-group">
			<label>Username</label>
			<input id="admin_login_username" type="text" class="form-control" placeholder="Enter Username"/>
		  </div><!--/.form-group -->
		  <div class="form-group">
			<label>Password</label>
			<input id="admin_login_pwd" type="password" class="form-control" placeholder="Enter Password"/>
		  </div><!--/.form-group -->
		  <div align="right" class="form-group">
			<a href="#" onclick="adminPanel_formload_frgtPwd(event);">Forgot Password?</a>
		  </div><!--/.form-group -->
		  <div align="right" class="form-group">
			<button class="btn btn-primary" onclick="javascript:adminPanelLogin(event);"><b>login</b></button>
		  </div><!--/.form-group -->
		  
		 </div>
		<!-- -->
	    </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		
	   </div><!--/.row -->
	  </div><!--/.container-fluid -->
		<!-- -->
      </div>

    </div>

  </div>
</div>
<!-- -->

<div class="container-fluid" style="margin-top:15px;background-color:#eee;">
<div class="row" style="margin-top:30px;margin-bottom:50px;">

<div align="center" class="col-md-6 col-sm-6 col-xs-12">
 <div style="margin-top:15px;margin-bottom:15px;text-transform-uppercase;font-family:longdoosi-regular;">
   <h5 style="font-size:28px;">About RSBR</h5>
 </div>
 
 <div align="center" class="col-md-6 col-sm-6 col-xs-12">
	<div style="font-size:16px;">
	  <div class="footer-opt">
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/about-us">About us</a>
	  </div>
	  <div class="footer-opt">
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/user/panelboard">Our Panel Board</a>
	  </div>
	  <div class="footer-opt">
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/user/gallery">Our Gallery</a>
	  </div>
	  <div class="footer-opt">
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/careers">Careers</a>
	  </div> 
	  <?php if(!isset($_SESSION["USER_ACCOUNT_TYPE"])) { ?>
	  <div class="footer-opt" data-toggle="modal" data-target="#adminPanel" 
	   onclick="javascript:adminPanel_formload_login(event);"><a href="#">Admin Panel</a></div>  
	  <?php } ?>
	</div>
 </div>
 
 <div align="center" class="col-md-6 col-sm-6 col-xs-12">
    <div style="font-size:16px;">
      <div class="footer-opt">
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/advertise-sponsor">Advertise /Be a Sponsor</a>
	  </div>
	  <div class="footer-opt"> 
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/user/media">Our News</a>
	  </div>
	  <div class="footer-opt">
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/contact-us">Contact Us</a>
	  </div>
	  <div class="footer-opt">
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/termsAndConditions">Terms and Conditions</a>
	  </div>
	  <div class="footer-opt">
	     <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/privacypolicy">Privacy Policy</a>
	  </div>
	</div>
 </div>
 
</div><!--/.col-md-12 col-sm-12 col-xs-12 -->

<div align="center" class="col-md-6 col-sm-6 col-xs-12">

 <div style="margin-top:15px;margin-bottom:15px;text-transform-uppercase;font-family:longdoosi-regular;">
   <h5 style="font-size:28px;">Record Topics</h5>
 </div>
 
 <div align="center" class="col-md-6 col-sm-6 col-xs-12">
 <!-- -->
 <div style="font-size:16px;">
  <div class="footer-opt">
    <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/find-categories">Find Categories</a>
  </div>
  <div class="footer-opt">
    <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/apply-set-a-record">Apply to set a Record</a>
  </div>
  <div class="footer-opt">
    <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/marketing-solutions">Record Breaking types</a>
  </div>
  <div class="footer-opt">
    <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/rsbr-store">RSBR Store</a>
  </div>
 </div>
 <!-- -->
 </div>
 
 <div align="center" class="col-md-6 col-sm-6 col-xs-12">
 <!-- -->
 <div style="font-size:16px;">
  <div class="footer-opt">
    <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/marketing-solutions">Marketing Solutions</a>
  </div>
  <div class="footer-opt">
    <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/make-rsbr-title">What makes a RSBR Title?</a>
  </div>
  <div class="footer-opt">
    <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/apply-set-a-record">
	  How to set / Break a Record</a>
  </div>
  <div class="footer-opt">
    <a style="text-decoration:none;" href="<?php echo $_SESSION["PROJECT_URL"];?>app/application-rejection">
     Reasons for Application Rejection</a>
  </div>
 </div>
 <!-- -->
 </div>
 
</div><!--/.col-md-12 col-sm-12 col-xs-12 -->


</div><!--/.row -->
</div><!--/.container-fluid -->
<div class="container-fluid" style="background-color:#fff;">
<div class="row" style="margin-top:30px;margin-bottom:30px;">
<div align="center" class="col-md-12 col-sm-12 col-xs-12">
<div align="center">All Rights Reserved. Copyrights &copy; by Royal Success Book Of Records Private Limited</div>
</div><!--/.col-md-12 col-sm-12 col-xs-12 -->
</div><!--/.row -->
</div><!--/.container-fluid -->