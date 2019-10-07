<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Success Book of Records</title>
  <?php include_once 'templates/api-params.php'; ?>
</head>
<body>
<style>
html { overflow-x:hidden;overflow-y:scroll; }
.heading { font-family: longdoosi-regular;font-size: 28px;color: #fff; }
</style>
<script type="text/javascript">
$(document).ready(function(){
 viewCustomerApplicationList();
});
var APPLICATION_LIST_RESPONSE;
function viewCustomerApplicationList(){
 js_ajax('POST',PROJECT_URL+'api/customer/request',
 { action:'VIEWALL_CUSTOMER_APPLICATIONS' },function(response){
   console.log(response);buildCustomerApplicationListTable(response);
 });
}
function buildCustomerApplicationListTable(response){
 response=JSON.parse(response);
 APPLICATION_LIST_RESPONSE = response;
  var content='<table class="table" style="border:1px solid #ccc;margin-bottom:0px;">';
	   content+='<thead style="background-color:#ccc;border-bottom:1px solid #fff;">';
	   content+='<tr align="center">';
	   content+='<td><b>#</b></td>';
	   content+='<td><b>Application Uploaded</b></td>';
	   content+='<td><b>Status</b></td>';
	   content+='<td><b>Comments</b></td>';
	   content+='</tr>';
	   content+='</thead>';
	   content+='<tbody>';
 for(var index=0;index<response.length;index++){
   var ts = response[index].ts;
   var status = response[index].status;
   var comment = response[index].comment;
   content+='<tr align="center" onclick="javascript:updateApplicationFormByAdmin('+index+');">';
   content+='<td>'+(index+1)+'</td>';
   content+='<td>'+get_stdDateTimeFormat01(ts)+'</td>';
   content+='<td>'+status+'</td>';
   content+='<td>'+comment+'</td>';
   content+='</tr>';
	      
 }
  content+='</tbody>';
  content+='</table>';
  document.getElementById("viewYourApplicationListTable").innerHTML=content;
}
</script>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	   <?php include_once 'templates/top-header.php';?>
	   
	   <div class="container-fluid" style="background-color:dodgerBlue;">
	    <div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <span class="heading">My Dashboard</span>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		</div>
	   </div>
	   
	   <div class="container-fluid mtop15p">
	     <div class="row">
		   <div class="col-md-6 col-sm-6 col-xs-12"><!--/.col-md-6 col-sm-6 col-xs-12 -->
			 <!-- -->
			   <div class="list-group">
			    <div class="list-group-item" style="border-color:mediumSeaGreen;background-color:mediumSeaGreen;color:#fff;">
			      <b>View your Applications</b>
			    </div><!--/.list-group-item -->
				<div class="list-group-item" style="border-color:mediumSeaGreen;padding:0px;">
				 <!-- -->
				 <div id="viewYourApplicationListTable" class="table-responsive">          
				 </div><!--/.table-responsive -->
				 <!-- -->
				</div><!--/.list-group-item -->
			   </div><!--/.list-group -->
			 <!-- -->
			 </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		   <div id="viewYourApplicationDetailsInfo" class="col-md-6 col-sm-6 col-xs-12">
		     <!-- -->
			 <!-- -->
		   </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		 </div><!--/.row -->
	   </div><!--/.container-fluid -->
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
<script type="text/javascript">

function updateApplication_editAppBtn(){
 if($("#updateApplication_editResetApp").hasClass('hide-block')){ 
   $("#updateApplication_editResetApp").removeClass('hide-block'); 
 }
 if(!$("#updateApplication_saveResetApp").hasClass('hide-block')){ 
   $("#updateApplication_saveResetApp").addClass('hide-block'); 
 } 
}
function updateApplication_saveAppBtn(){
 if(!$("#updateApplication_editResetApp").hasClass('hide-block')){ 
   $("#updateApplication_editResetApp").addClass('hide-block'); 
 }
 if($("#updateApplication_saveResetApp").hasClass('hide-block')){ 
   $("#updateApplication_saveResetApp").removeClass('hide-block'); 
 }
}
function updateApplicationFormByCertify(){

}
function updateApplicationFormByAdmin(index){
// APPLICATION_LIST_RESPONSE
var request_Id = APPLICATION_LIST_RESPONSE[index].request_Id;
   var account_Id = APPLICATION_LIST_RESPONSE[index].account_Id;
   var application = APPLICATION_LIST_RESPONSE[index].application;
   var recordTitle = APPLICATION_LIST_RESPONSE[index].recordTitle;
   var recordDesc = APPLICATION_LIST_RESPONSE[index].recordDesc;
   var isCertify = APPLICATION_LIST_RESPONSE[index].isCertify;
   var ts = APPLICATION_LIST_RESPONSE[index].ts;
   var status = APPLICATION_LIST_RESPONSE[index].status;
   var comment = APPLICATION_LIST_RESPONSE[index].comment;
var content='<div class="list-group">';
	content+='<div class="list-group-item" style="background-color:tomato;color:#fff;">';
	content+='<b>Application Details</b>';
	content+='</div>';
	content+='<div class="list-group-item">';
	content+='<div class="container-fluid">';
	content+='<div class="row">';
	
	content+='<div class="col-md-12 col-sm-12 col-xs-12">';
	content+='<input type="hidden" id="request_Id"/>';
	content+='<input type="hidden" id="account_Id"/>';
	
	content+='<div class="form-group">';
	content+='<label>Record Title</label>';
	content+='<input type="text" class="form-control" placeholder="Enter Record Title"/>';
	content+='</div>';
						
	content+='<div class="form-group">';
	content+='<label>Record Description</label>';
	content+='<textarea class="form-control">Enter Record Description</textarea>';
	content+='</div>';
	content+='</div>';
	
	content+='</div>';
	
	content+='<div class="row">';
				  
	content+='<div class="col-md-12 col-sm-12 col-xs-12">';
	
    content+='<div class="form-group">';
	content+='<span style="color:#555;">Application uploaded on 20 Sep 2019</span>';
	content+='</div>';	
	
	content+='</div>';
	
	content+='<div class="col-md-12 col-sm-12 col-xs-12">';
	content+='<div align="right" class="form-group">';
	content+='&nbsp;&nbsp;&nbsp;<span style="color:#555;"><b>Status:</b>&nbsp;&nbsp;Uploaded</span>';
	content+='</div>';	
	content+='</div>';
	
	content+='</div>';
	
	content+='<div class="row">';
	
	content+='<div class="col-md-6 col-sm-6 col-xs-12">';
	
	content+='<div class="form-group">';
	content+='<div class="checkbox">';
	content+='<label><input type="checkbox" data-toggle="toggle">Certify</label>';
	content+='</div>';
	content+='</div>';
	
	content+='</div>';
	
	content+='<div class="col-md-6 col-sm-6 col-xs-12">';
	content+='<div align="right" class="form-group">';
	content+='<div class="btn-group" style="margin-top:32px;">';
	content+='<button class="btn btn-rsbr3"><b>View Application</b></button>';
	content+='<button class="btn btn-rsbr3-o"><b>Upload picture</b></button>';
	content+='</div>';
	content+='</div>';
	content+='</div>';
				
	content+='</div>';

	content+='<div class="row">';
	
	
	content+='<div class="col-md-3 col-sm-3 col-xs-12">';
				
	
	content+='</div>';
					
	content+='</div>';
				
    content+='<div id="viewApplicationCertificateGenerateInfo" class="hide-block">';
	
	content+='<div class="row">';
	
	content+='<div class="col-md-12 col-sm-12 col-xs-12">';
	content+='<div class="form-group">';
	content+='<label>Certificate Title</label>';
	content+='<input type="text" class="form-control" placeholder="Enter Certificate Title"/>';
	content+='</div>';

	content+='<div class="form-group">';
	content+='<label>Certificate Description</label>';
	content+='<textarea class="form-control">Enter Certificate Description</textarea>';
	content+='</div>';
	content+='</div>';
	
	content+='</div>';
				   
	content+='<div class="row">';
	content+='<div class="col-md-6 col-sm-6 col-xs-12">';
	content+='<div class="checkbox">';
	content+='<label><input type="checkbox" data-toggle="toggle"> Display Records</label>';
	content+='</div>';
	content+='</div>';
	content+='<div class="col-md-6 col-sm-6 col-xs-12">';
	content+='</div>';
	content+='</div>';
	
	content+='</div>';
				   
	content+='<div class="row">';
	content+='<div class="col-md-6 col-sm-6 col-xs-12">';
					  
	content+='</div>';
	content+='<div class="col-md-6 col-sm-6 col-xs-12">';
	
	content+='</div>';
				   
	content+='</div>';
				   
	content+='<div class="row">';
				     
	content+='<div align="center" class="col-md-12 col-sm-12 col-xs-12">';
					   
	content+='<div id="updateApplication_editResetApp" class="hide-block">';
	content+='<div class="btn-group">';
	content+='<button class="btn btn-rsbr3"><b>Edit Application</b></button>';
	content+='<button class="btn btn-rsbr3-o"><b>Reset</b></button>';
	content+='</div>';
	content+='</div>';
					   
	content+='<div id="updateApplication_saveResetApp" class="hide-block">';
	content+='<div class="btn-group">';
	content+='<button class="btn btn-rsbr3"><b>Save Application</b></button>';
	content+='<button class="btn btn-rsbr3-o"><b>Reset</b></button>';
	content+='</div>';
	content+='</div>';
			   
	content+='</div>';
	content+='</div>';
	content+='</div>';
	
	content+='</div>';
	content+='</div>';
	
  document.getElementById("viewYourApplicationDetailsInfo").innerHTML=content;
}
</script>
</div>
</body>
</html>