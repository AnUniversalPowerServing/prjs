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
</style>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	  <!-- -->
	  <?php include_once 'templates/top-header.php';?>
	  
	  <?php include_once 'templates/home-slider.php';?>
	  
	  <?php include_once 'templates/home-row1-headers.php';?>
	  
	  <?php include_once 'templates/home-row2-media.php';?>
	  
	  <?php include_once 'templates/home-row3-headers.php';?>
	  
	  <?php include_once 'templates/home-row4-headers.php'; ?>
	  
	  <?php include_once 'templates/bottom-footer.php'; ?>
	  
	  <!--
	  <div style="background-image:url('images/home-bg.jpg');background-repeat: no-repeat;
	    background-size:100% 800px;color:#fff;width:100%;height:550px;">
	    <div align="center" style="padding-top:15px;">
		  <h4><b>PROVE THE TALENT WITH A RECORD AND GET APPRECIATED</b></h4>
		</div>
	  </div>
	  -->

	  <!-- -->
	
	</div>
</div>
</body>
</html>