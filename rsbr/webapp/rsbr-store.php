<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Success Book of Records</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/api/simple-sidebar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
		   <span class="heading">RSBR Store</span>
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
			RSBR (Royal Success Book of Records) Store is just the process of selling products of 
			Royal Success Book of Records like T-Shirts, Record Books, etc. by electronic means such as 
			by mobile applications and the Internet.
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