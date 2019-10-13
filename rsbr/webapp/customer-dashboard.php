<?php session_start(); 
if(isset($_SESSION["USER_ACCOUNT_TYPE"]) && $_SESSION["USER_ACCOUNT_TYPE"]=='CUSTOMER') {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Success Book of Records</title>
  <?php include_once 'templates/api-params.php'; ?>
</head>
<body>
<style>
.font-black { color:#000; }
.font-grey { color:#555; }
html { overflow-x:hidden;overflow-y:scroll; }
.heading { font-family: longdoosi-regular;font-size: 28px;color: #fff; }
.dashboard-list { background-color:mediumSeaGreen;color:#fff; }
.curpoint { cursor:pointer; }
#application_file_pdfUploadStatus { color:mediumSeaGreen;font-weight:bold; }
</style>
<script type="text/javascript">
var RECORD_TITLE;
var RECORD_DESC;
var RECORD_FILENAME;
function uploadAppFile(){
  document.getElementById("application_file_pdfUploadStatus").innerHTML=$('#uploadpic').val().replace('C:\\fakepath\\','');
}
function uploadApplicationForm(){
 RECORD_FILENAME = new Date().getTime()+'.pdf';
 var jsonData = { folderName:'customers/'+USER_ACCOUNT_ID, renameFile: RECORD_FILENAME };
 pictureUpload('add_application_filePdf',jsonData,function(){
   var status = false;
   var fileName = $('#uploadpic').val();
   var extension = '';
   for(var index=fileName.length-1;index>=0;index--){
     if(fileName[index]!=='.') { extension+=fileName[index]; }
	 else { break; }
   }
   if(extension==='fdp'){ status = true; }
   else { document.getElementById("application_file_pdfUploadStatus").innerHTML=''; } 
   // Your File is invalid format. Please upload in PDF Format
   return status;
 },
 function(){
   recordApplicationForm();
 });
}
function recordApplicationForm(){
 /* Add record Information into Database */
 js_ajax('POST',PROJECT_URL+'api/customer/request', { action:'ADD_CUSTOMER_REQUESTS', account_Id:USER_ACCOUNT_ID,
  application:PROJECT_URL+'uploads/customers/'+USER_ACCOUNT_ID+'/'+RECORD_FILENAME, 
  recordTitle:RECORD_TITLE, recordDesc:RECORD_DESC },function(response){
    console.log(response);
	resetApplicationForm();
	viewCustomerApplicationList();
  });
}
function submitUserApplication(){
 RECORD_TITLE = document.getElementById("add_application_recordTitle").value;
 RECORD_DESC = document.getElementById("add_application_recordDesc").value;
 var fileName = $('#uploadpic').val();
 if(RECORD_TITLE.length>0){
  if(RECORD_DESC.length>0){
    console.log("fileName: "+fileName);
    if(fileName.length>0){
        uploadApplicationForm();
		div_display_success('add_application_alert','S001');
    } else { div_display_warning('add_application_alert','W024'); } // W024 :  Missing Application File
  } else { div_display_warning('add_application_alert','W023'); } // W023 :  Missing Record Description
 } else { div_display_warning('add_application_alert','W022'); } // W022 : Missing Record Title
}
function resetApplicationForm(){
 document.getElementById("add_application_recordTitle").value='';
 document.getElementById("add_application_recordDesc").value='';
 document.getElementById("add_application_alert").innerHTML='';
 document.getElementById("application_file_pdfUploadStatus").innerHTML='';
 $('#uploadpic').val('');
}
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
function buildCustomerApplicationListModal(index){
   var request_Id = APPLICATION_LIST_RESPONSE[index].request_Id;
   var account_Id = APPLICATION_LIST_RESPONSE[index].account_Id;
   var application = APPLICATION_LIST_RESPONSE[index].application;
   var recordTitle = APPLICATION_LIST_RESPONSE[index].recordTitle;
   var recordDesc = APPLICATION_LIST_RESPONSE[index].recordDesc;
   var isCertify = APPLICATION_LIST_RESPONSE[index].isCertify;
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
       content+='<h4 class="modal-title">Application Info</h4>';
       content+='</div>';
       content+='<div class="modal-body">';
       //
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
	   content+='<b>View My Application</b></button>';
	   content+='<button class="btn btn-danger" onclick="javascript:deleteMyApplication('+request_Id+',\''+application+'\');">';
	   content+='<b>Delete Application</b></button>';
	   content+='</div>';
	   content+='</div>';
	   
	   content+='</div>';
	   content+='</div>';
	   
	   //
       content+='</div>';
       content+='</div>';
	   content+='</div>';
	document.getElementById("applicationListModal").innerHTML=content;
	$('#applicationListModal').modal();
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
<!-- Modal -->
<div id="uploadNewApplicationFormModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload New Application</h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<div class="container-fluid">
		  <div class="row">
		    <div class="col-md-12 col-sm-12 col-xs-12">
			<!-- -->
			  <div style="color:#999;">
				    <div align="center"><h5><b>Want to Claim a Record?</b></h5></div>
					<div>
					  <ol>
					  <li>
					    <div class="mtop15p">Download Application Form mentioned below,</div>
						<div class="mtop15p">
						  <button class="btn btn-default downloadFile btn-rsbr3" 
						  onclick="javascript:downloadApplicationFile(event);">
							Download Application</button>
						</div>
					  </li>
					  <li><div class="mtop15p">Fill the Details of the Record you want to 
					      claim in the Application.</div></li>
					  <li>
					    <div class="mtop15p">
						 Upload the Application back here in pdf Format.
						</div>
						<div class="list-group mtop15p">
						 <div class="list-group-item">
						 <!-- -->
						  <div class="container-fluid">
						    <div class="row">
						      <div class="col-md-12 col-sm-12 col-xs-12 mtop15p font-black">
							    <!-- -->
								<div id="add_application_alert" class="form-group"></div>
								<div class="form-group">
								  <label>Record Title</label>
								  <input id="add_application_recordTitle" type="text" class="form-control" placeholder="Enter Record Title"/>
								</div>
								
								<div class="form-group">
								  <label>Record Description</label>
								  <textarea id="add_application_recordDesc" class="form-control font-grey">Enter Record Description</textarea>
								</div>
								<!-- -->
							  </div> 
							</div><!--/.row -->
						    <div class="row">
						      <div class="col-md-12 col-sm-12 col-xs-12 mtop15p">
						      <!-- -->
							  
							  <div align="center" class="form-group">
							    <div id="application_file_pdfUploadStatus"></div>
						  
							    <form name="fileuploadForm" id="fileuploadForm" action="#" method="POST" enctype="multipart/form-data">
								<input type="file" name="uploadpic" id="uploadpic" accept="pdf/*"  
								onchange="javascript:uploadAppFile();" style="visibility:hidden;"/>
							    <button id="add_application_filePdf" class="btn btn-rsbr3-o"
								onclick="javascript:pictureUploadClick();"><b>Choose and Upload Application File</b></button>
								</form>
								
							  </div>
							  </div><!--.col-md-12 col-sm-12 col-xs-12 -->
						    </div><!--/.row -->
							<div class="row">
						      <div align="right" class="col-md-12 col-sm-12 col-xs-12 mtop15p font-black">
							    <!-- -->
								<div class="form-group">
								  <div class="btn-group">
								    <button class="btn btn-rsbr3" onclick="javascript:submitUserApplication();"><b>Submit Application</b></button>
								    <button class="btn btn-rsbr3-0" onclick="javascript:resetApplicationForm();"><b>Reset</b></button>
								  </div>
								</div>
								
								<!-- -->
							  </div>
							</div><!--/.row -->
						  </div><!--/.container-fluid -->
						 <!-- -->
						 </div><!--/.list-group-item -->
						</div><!--/.list-group -->
					  </li>
					  </ol>
					  
					</div>
				  </div>
			    
			<!-- -->
		    </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		  </div><!--/.row -->
		</div><!--/.container-fluid -->
		<!-- -->
      </div><!--/.modal-body -->
    </div><!--/.modal-content -->

  </div><!--/.modal-dialog -->
</div><!--/.modal -->
<!-- Modal -->   
	   <div class="container-fluid" style="background-color:#7b7878;">
	    <div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <span class="heading">My Dashboard</span>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		</div>
	   </div>

	   <div class="container-fluid">
	    <div class="row">
		 <div align="right" class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <button class="btn btn-success" data-toggle="modal" data-target="#uploadNewApplicationFormModal" 
		   data-backdrop="static"><b>Upload Application Form</b></button>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		</div>
	   </div>

    <div style="min-height:600px;">
	   
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
	
</div>
</body>
</html>
<?php } else { header("Location:".$_SESSION["PROJECT_URL"]); } ?>