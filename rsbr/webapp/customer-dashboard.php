<?php session_start(); 
if(isset($_SESSION["USER_ACCOUNT_ID"]) && isset($_SESSION["USER_ACCOUNT_TYPE"]) && 
$_SESSION["USER_ACCOUNT_TYPE"]=='CUSTOMER') {
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
function viewUploadApplication(){
 if($('#uploadApplicationForm').hasClass('hide-block')){ $('#uploadApplicationForm').removeClass('hide-block'); }
 if(!$('#viewApplicationStatusForm').hasClass('hide-block')){ $('#viewApplicationStatusForm').addClass('hide-block'); }
}
function viewApplicationStatus(){
 if(!$('#uploadApplicationForm').hasClass('hide-block')){ $('#uploadApplicationForm').addClass('hide-block'); }
 if($('#viewApplicationStatusForm').hasClass('hide-block')){ $('#viewApplicationStatusForm').removeClass('hide-block'); }
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

<style>
.dashboard-list { background-color:mediumSeaGreen;color:#fff; }
.curpoint { cursor:pointer; }
</style>
    <div style="margin-top:30px;min-height:600px;">
	   <div class="container-fluid">
	     <div class="row">
		   <div class="col-md-3 col-sm-3 col-xs-12">
		   <!-- -->
		     
		     <div class="list-group curpoint" onclick="javascript:viewUploadApplication();s">
			   <div align="center" class="list-group-item dashboard-list">
			     <i class="fa fa-5x fa-file-text mtop15p mbot15p" aria-hidden="true"></i>
			   </div><!--/.list-group-item -->
			   <div align="center" class="list-group-item dashboard-list">
				<b>Upload Application</b>
			   </div><!--/.list-group-item -->
			 </div><!--/.list-group -->
			 
		   </div>
		   <div class="col-md-3 col-sm-3 col-xs-12"> 
		   
			 <div class="list-group curpoint" onclick="javascript:viewApplicationStatus();">
			   <div align="center" class="list-group-item dashboard-list">
			     <i class="fa fa-5x fa-file-text mtop15p mbot15p" aria-hidden="true"></i>
			   </div><!--/.list-group-item -->
			   <div align="center" class="list-group-item dashboard-list">
				<b>View Application Status</b>
			   </div><!--/.list-group-item -->
			 </div><!--/.list-group -->
			 
		   <!-- -->
		   </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		 </div><!--/.row -->
	   </div><!--/.container-fluid -->
	   
	   
	     <div id="uploadApplicationForm" class="container-fluid mtop15p hide-block">
		 
	       <div class="row">
	         <div class="col-md-12 col-sm-12 col-xs-12">
	            <h4><b>Upload Application Form</b></h4><hr/>
	         </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
	       </div><!--/.row -->
		 
		   <div class="row">
	         <div class="col-md-6 col-sm-6 col-xs-12">
	           <!-- -->
			   <div class="list-group">
			    <div class="list-group-item" style="border-color:tomato;background-color:tomato;color:#fff;">
			      <b>Upload Application Form</b>
			    </div><!-- /.list-group-item -->
				<div class="list-group-item"  style="border-color:tomato;">
			      <div style="color:#999;">
				    <div align="center"><h5><b>Want to Claim a Record?</b></h5></div>
					<div>
					  <ol>
					  <li>
					    <div class="mtop15p">Download Application Form mentioned below,</div>
						<div class="mtop15p">
						    <button class="btn btn-default btn-rsbr3">Download Application</button>
						</div>
					  </li>
					  <li><div class="mtop15p">Fill the Details of the Record you want to claim in the Application.</div></li>
					  <li>
					    <div class="mtop15p">
						 Upload the Application back here in pdf Format.
						</div>
						<div class="list-group mtop15p">
						 <div class="list-group-item">
						 <!-- -->
						  <div class="container-fluid">
						    <div class="row">
						      <div class="col-md-12 col-sm-12 col-xs-12 mtop15p">
						      <!-- -->
							  <div align="center" class="form-group">
							    <button class="btn btn-rsbr3-o"><b>Choose your Application File</b></button>
								<button class="btn btn-rsbr3"><b>Upload Application Form</b></button>
							  </div>
							  </div><!--.col-md-12 col-sm-12 col-xs-12 -->
						    </div><!--/.row -->
						  </div><!--/.container-fluid -->
						 <!-- -->
						 </div><!--/.list-group-item -->
						</div><!--/.list-group -->
					  </li>
					  </ol>
					  
					</div>
				  </div>
			    </div><!-- /.list-group-item -->
			   </div><!-- /.list-group -->
			   <!-- -->
	         </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
			 <div class="col-md-6 col-sm-6 col-xs-12"><!--/.col-md-6 col-sm-6 col-xs-12 -->
			 <!-- -->
			   <div class="list-group">
			    <div class="list-group-item" style="border-color:slateBlue;background-color:slateBlue;color:#fff;">
			      <b>View your Applications</b>
			    </div><!--/.list-group-item -->
				<div class="list-group-item" style="border-color:slateBlue;">
				 <!-- -->
				 <div class="table-responsive">          
				  <table class="table" style="border:1px solid #ccc;">
					<thead style="background-color:#ccc;border-bottom:1px solid #fff;">
					  <tr align="center">
						<td><b>#</b></td>
						<td><b>Application Uploaded</b></td>
						<td><b>Status</b></td>
					  </tr>
					</thead>
					<tbody>
					  <tr align="center">
						<td>1</td>
						<td>20-January-1991</td>
						<td>UPLOADED</td>
					  </tr>
					</tbody>
				  </table>
				 </div><!--/.table-responsive -->
				 <!-- -->
				</div><!--/.list-group-item -->
			   </div><!--/.list-group -->
			 <!-- -->
			 </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
			 
	       </div><!--/.row -->
		   
	     </div><!--/.container-fluid -->
		 
		 <div id="viewApplicationStatusForm" class="container-fluid mtop15p hide-block">
		 
	       <div class="row">
	         <div class="col-md-12 col-sm-12 col-xs-12">
	            <h4><b>View Application Status</b></h4><hr/>
	         </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
	       </div><!--/.row -->
		 
		   <div class="row">
	         <div class="col-md-12 col-sm-12 col-xs-12">
	           
	         </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
	       </div><!--/.row -->
		   
	     </div><!--/.container-fluid -->
		 
	   </div>
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
	
</div>
</body>
</html>
<?php } else { header("Location:".$_SESSION["PROJECT_URL"]); } ?>