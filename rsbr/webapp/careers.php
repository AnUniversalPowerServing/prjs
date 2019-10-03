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
.heading { font-family:longdoosi-regular;font-size:36px;color:#fff; }
</style>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	   <?php include_once 'templates/top-header.php';?>
	   
	   <div class="container-fluid" style="background-color:dodgerBlue;">
	    <div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <span class="heading">Careers</span>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		</div>
	   </div>
	   
	   <div class="container-fluid" style="background-color:#47a2fb;">
	    <!--/.row -->
		<div class="row mtop50p mbot50p">
		 <div align="center" class="col-md-4 col-sm-4 col-xs-12 mbot15p">
		  <img src="http://www.safetytechnology.co.uk/wp-content/uploads/2019/01/o-SKYDIVER-facebook.jpg"
		   style="width:300px;height:230px;border:2px solid #fff;"/>
		 </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		 <div class="col-md-8 col-sm-8 col-xs-12 mtop15p">
		   <div style="font-family:longdoosi-regular;font-size:28px;color:#fff;margin-top:15px;">
		    This is where you can do your best work. Before you apply, let's connect.<br/>
			Find your Next Job at Royal Success Book of Records.<br/>
			<h1>What do you want to do?</h1>
		   </div>
		 </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		</div>
	   </div>
	   
	   <div class="container-fluid" style="margin-top:75px;margin-bottom:200px;">
	     <div class="row">
		   <div class="col-md-1 col-sm-1 col-xs-12"></div>
		   <div class="col-md-10 col-sm-10 col-xs-12">
		   <!-- -->
		   <div class="list-group">
		     <div class="list-group-item">
		     <!-- -->
			 <h4 align="center" style="line-height:32px;">
			   <b>This is Royal Success Book of Records Jobs and Career Portal</b></h4>
			   <!-- -->
			   <div class="list-group">
		         <div align="center" class="list-group-item">
			       <h4><b>THIS PAGE COMING SOON</b></h4>
			     </div><!--/.list-group-item -->
		       </div><!--/.list-group -->
			   <!-- -->
			 <!-- -->
		     </div><!--/.list-group-item -->
		   </div><!--/.list-group -->
		   <!-- -->
		   </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		   <div class="col-md-1 col-sm-1 col-xs-12"></div>
		 </div><!--/.row -->
	   </div><!--/.container-fluid -->
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
	
</div>
</body>
</html>