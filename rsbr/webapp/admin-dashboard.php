<?php session_start(); 
if(isset($_SESSION["USER_ACCOUNT_TYPE"]) && $_SESSION["USER_ACCOUNT_TYPE"]=='ADMINISTRATOR'){
?>
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
function viewCustomerApplicationListInit(){
 var content='<div align="center" style="color:#999;">Loading...</div>';
 document.getElementById("customerViewMyApplications").innerHTML=content;
}
function viewCustomerApplicationList(){
 viewCustomerApplicationListInit();
 js_ajax('POST',PROJECT_URL+'api/customer/request',
 { action:'VIEW_CUSTOMER_APPLICATIONS',account_Id:USER_ACCOUNT_ID },function(response){
   console.log(response);buildCustomerApplicationListTable(response);
 });
}
$(document).ready(function(){
 viewCustomerApplicationList();
});
var APPLICATION_LIST_RESPONSE;
function buildCustomerApplicationListTable(response){
 response=JSON.parse(response);
 
 APPLICATION_LIST_RESPONSE = response;
 var content='';
 if(response.length>0){
       content+='<table class="table" style="border:1px solid #ccc;margin-bottom:0px;">';
	   content+='<thead style="background-color:#ccc;border-bottom:1px solid #fff;">';
	   content+='<tr align="center">';
	   content+='<td><b>#</b></td>';
	   content+='<td><b>Record Title</b></td>';
	   content+='<td><b>Uploaded On</b></td>';
	   content+='<td><b>Status</b></td>';
	   content+='<td><b>Comments</b></td>';
	   content+='</tr>';
	   content+='</thead>';
	   content+='<tbody>';
 for(var index=0;index<response.length;index++){
   var recordTitle = response[index].recordTitle;
   var ts = response[index].ts;
   var status = response[index].status;
   var comment = response[index].comment;
   content+='<tr align="center" onclick="javascript:buildCustomerApplicationListModal('+index+');">';
   content+='<td>'+(index+1)+'</td>';
   content+='<td>'+recordTitle+'</td>';
   content+='<td>'+get_stdDateTimeFormat01(ts)+'</td>';
   content+='<td>'+status+'</td>';
   content+='<td>'+comment+'</td>';
   content+='</tr>';	      
 }
  content+='</tbody>';
  content+='</table>';
  } else {
    content+='<div align="center">';
	content+='<span style="color:#ccc;">You have no Applications</span>';
	content+='</div>';
  }
  document.getElementById("customerViewMyApplications").innerHTML=content;
}
function sel_popup_menu(id){
 var ids=["menu_record_info","menu_certify_info"];
 var idsContent=["menu_record_info_content","menu_certify_info_content"];
 for(var index=0;index<ids.length;index++){
  if(ids[index]===id){
    if(!$("#"+ids[index]).hasClass('active')){ $("#"+ids[index]).addClass('active'); }
	if($("#"+idsContent[index]).hasClass('hide-block')){ $("#"+idsContent[index]).removeClass('hide-block'); }
  } else {
    if($("#"+ids[index]).hasClass('active')){ $("#"+ids[index]).removeClass('active'); }
	if(!$("#"+idsContent[index]).hasClass('hide-block')){ $("#"+idsContent[index]).addClass('hide-block'); }
  }
 }
}
//   
function buildCustomerApplicationListModal(index){
   var request_Id = APPLICATION_LIST_RESPONSE[index].request_Id;
   var account_Id = APPLICATION_LIST_RESPONSE[index].account_Id;
   var application = APPLICATION_LIST_RESPONSE[index].application;
   var recordTitle = APPLICATION_LIST_RESPONSE[index].recordTitle;
   var recordDesc = APPLICATION_LIST_RESPONSE[index].recordDesc;
   var isCertify = APPLICATION_LIST_RESPONSE[index].isCertify;
   var certifyTitle = APPLICATION_LIST_RESPONSE[index].certifyTitle;
   var certifyDesc = APPLICATION_LIST_RESPONSE[index].certifyDesc;
   var ts = APPLICATION_LIST_RESPONSE[index].ts;
   var status = APPLICATION_LIST_RESPONSE[index].status;
   var comment = APPLICATION_LIST_RESPONSE[index].comment;
   if(comment.length===0){
     comment = '-'; 
   }
   var content='<div class="modal-dialog">';
       content+='<div class="modal-content">';
       content+='<div class="modal-header">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title"><b>Application Info</b></h4>';
       content+='</div>';
       content+='<div class="modal-body">';
       //
	   content+='<ul class="nav nav-tabs">';
       content+='<li id="menu_record_info" class="active" onclick="javascript:sel_popup_menu(this.id);">';
	   content+='<a href="#"><b>Record Info</b></a></li>';
       content+='<li id="menu_certify_info" onclick="javascript:sel_popup_menu(this.id);">';
	   content+='<a href="#"><b>Generate Certificate</b></a></li>';
       content+='</ul>';
	   
	   content+='<div id="menu_record_info_content" class="list-group">';
	   content+='<div class="list-group-item">';
	   
	   content+='<div class="container-fluid">';
	   
	   content+='<div class="row">';
	   content+='<div class="col-md-12 col-md-12 col-xs-12">';
	   
	   content+='<div class="form-group">';
	   content+='<label>Record Title</label>';
	   content+='<div class="list-group">';
	   content+='<div class="list-group-item">'+recordTitle+'</div>';
	   content+='</div>';
	   content+='</div>';
	   
	   content+='<div class="form-group">';
	   content+='<label>Record Description</label>';
	   content+='<div class="list-group">';
	   content+='<div class="list-group-item">'+recordDesc+'</div>';
	   content+='</div>';
	   content+='</div>';
	   
	   content+='<div class="form-group">';
	   content+='<label>Application Uploaded on</label>';
	   content+='<div class="list-group">';
	   content+='<div class="list-group-item">'+get_stdDateTimeFormat01(ts)+'</div>';
	   content+='</div>';
	   content+='</div>';
	   
	   content+='<div class="form-group">';
	   content+='<label>Status</label>';
	   content+='<div class="list-group">';
	   content+='<div class="list-group-item">'+status+'</div>';
	   content+='</div>';
	   content+='</div>';
	   
	   content+='<div class="form-group">';
	   content+='<label>Comment</label>';
	   content+='<div class="list-group">';
	   content+='<div class="list-group-item">'+comment+'</div>';
	   content+='</div>';
	   content+='</div>';
	   
	   content+='<div align="right" class="form-group">';
	   content+='<div class="btn-group">';
	   content+='<button class="btn btn-rsbr3" onclick="javascript:viewUploadedApplicationBack(event,';
	   content+='\''+application+'\');">';
	   content+='<b>View User Application</b></button>';
	   // content+='<button class="btn btn-danger" onclick="javascript:deleteMyApplication('+request_Id+',\''+application+'\');">';
	  // content+='<b>Delete Application</b></button>';
	   content+='</div>';
	   content+='</div>';
	   
	   content+='</div>';
	   content+='</div>';
	   
	   //
       content+='</div>'; // Container-fluid 
	   
	   content+='</div>'; // list-group-item
	   content+='</div>'; // list-group
	   
	   content+='<div id="menu_certify_info_content" class="list-group hide-block">';
	   content+='<div class="list-group-item">';
	   
	   content+='<div class="container-fluid">';
	   content+='<div class="row">';
	   content+='<div class="col-md-12 col-sm-12 col-xs-12">';
	   
	   content+='<form target="_blank" action="'+PROJECT_URL+'pdfBuilder.php" method="post">';
	   
	   content+='<div class="form-group">';
	   content+='<label>Certificate Title</label>';
	   content+='<input type="hidden" id="rsbr_certificate_Id" name="rsbr_certificate_Id" value="'+request_Id+'" />';
	   content+='<textarea id="rsbr_certificate_txt" name="rsbr_certificate_txt" class="form-control">';
	   
	   if(certifyTitle.length>0){
	   content+=certifyTitle;
	   }
	   content+='</textarea>';
	   content+='</div>'; // form-group
	  
	   content+='<div class="form-group">';
	   content+='<label>Certificate Description</label>';
	   content+='<textarea id="rsbr_certificate_desc" name="rsbr_certificate_desc" class="form-control">';
	   if(certifyDesc.length>0){
	   content+=certifyDesc;
	   }
	   content+='</textarea>';
	   content+='</div>'; // form-group
	  
	   content+='<div align="right" class="form-group">';
	   content+='<button type="submit" class="btn btn-success" onclick="javascript:saveCertificateInfo();">';
	   content+='<b>Save and Generate Certificate</b></button>';
	   content+='</div>'; // form-group
	   
	   content+='</form>'; 
	   
	   content+='</div>'; // col-md-12 col-sm-12 col-xs-12
	   content+='</div>'; // row
	   content+='</div>'; // Container-fluid
	   
	   content+='</div>'; // list-group-item
	   content+='</div>'; // list-group
	   
       content+='</div>';
	   content+='</div>';
	document.getElementById("applicationListModal").innerHTML=content;
	$('#applicationListModal').modal();
}
function saveCertificateInfo(){ 
 var certificate_Id = document.getElementById("rsbr_certificate_Id").value;
 var certificate_txt = document.getElementById("rsbr_certificate_txt").value;
 var certificate_desc = document.getElementById("rsbr_certificate_desc").value;
 js_ajax('POST', PROJECT_URL+'backend/php/dac/controller.module.customer.requests.php', 
 { action:'UPDATE_CUSTOMER_REQUESTS',request_Id: certificate_Id, certifyTitle:certificate_txt, 
   certifyDesc:certificate_desc, isCertify:'Y' },function(response){
   console.log(response);
 });
}
function deleteMyApplication(request_Id,application){
  viewCustomerApplicationListInit();
  $('#applicationListModal').modal('hide');
  js_ajax('POST',PROJECT_URL+'backend/php/dac/controller.module.customer.requests.php',
  { action:'DELETE_CUSTOMER_APPLICATION', request_Id:request_Id, account_Id:USER_ACCOUNT_ID, 
    application:application },function(response){
	console.log(response);
    viewCustomerApplicationList();
  }); 
}
function viewUploadedApplicationBack(event, url){
 event.preventDefault();
 window.open(url);
}
</script>
<div id="applicationListModal" class="modal fade" role="dialog"></div>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	   <?php include_once 'templates/top-header.php';?>
	   
	   <div class="container-fluid" style="background-color:#777;">
	    <div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <span class="heading">My Dashboard</span>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		</div>
	   </div>

	   <div style="margin-top:15px;min-height:600px;">
	   
	     <div id="uploadApplicationForm" class="container-fluid">
		 
	       <div class="row">
	         <div class="col-md-12 col-sm-12 col-xs-12">
	            <h4><b>View My Applications</b></h4><hr/>
	         </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
	       </div><!--/.row -->
		   
		   <div class="row">
	         <div id="customerViewMyApplications" class="col-md-12 col-sm-12 col-xs-12"></div>
	       </div><!--/.row -->
		 
	     </div><!--/.container-fluid -->
		 
	   </div>
	
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
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>