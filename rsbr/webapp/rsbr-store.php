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
		   <span style="font-family:longdoosi-regular;color:#fff;font-size:28px;">RSBR Store</span>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
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
			 <h4 style="line-height:32px;">
			   <b>This is Royal Success Book of Records Store Portal where they can buy  
			   Royal Success Book of Records Products like T-Shirts, Record Books, etc..</b></h4>
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