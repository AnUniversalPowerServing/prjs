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
.heading { font-family:longdoosi-regular;font-size:28px;color:#fff; }
.home-media-title { font-family:longdoosi-regular;color:#000; }
</style>
<script type="text/javascript">
var user='<?php echo $_GET["user"]; ?>';
console.log("user: "+user);
$(document).ready(function(){
 var news_Id='<?php if(isset($_GET["news_Id"])){ echo $_GET["news_Id"]; } ?>';
 js_ajax('POST',PROJECT_URL+'backend/php/dac/controller.latest.news.php',
 { action:'VIEW_LATEST_NEWS_BY_ID', news_Id:news_Id },function(response){ 
    console.log(response);
	response=JSON.parse(response);
	
	document.getElementById("news-title").innerHTML=response[0].title;
	
	var content='';
		if(user==='N'){
		  content+='<div align="right" class="mtop15p">';
		  content+='<button class="btn btn-danger"><b>Delete this Article</b></button>';
		  content+='</div>';
		}
		content+='<div class="mtop15p">';
		content+='<img src="'+response[0].picture+'" style="width:100%;height:auto;"/>';
		content+='</div>';
		
		content+='<div align="right" class="mtop15p">';
		content+='<span style="color:#ccc;">Posted on '+get_stdDateTimeFormat01(response[0].ts)+'</span>';
		content+='</div>';
		
		content+='<div class="mtop15p">'+response[0].newsDesc+'</div>';
		
	
	document.getElementById("view_media_brief").innerHTML=content;
 });
 
});
</script>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	   <?php include_once 'templates/top-header.php';?>
	   
	   <div class="container-fluid" style="background-color:#777;">
		 <div class="row">
	       <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		     <span id="news-title" class="heading"></span>
		   </div>
	     </div>
	   </div>
		
		
		<div class="container-fluid" style="margin-bottom:50px;">
		  <div class="row">
	        <div id="view_media_brief" class="col-md-8 col-sm-8 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		
		
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		    <!-- -->
			  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/apply-set-a-record" style="text-decoration:none;">
			  <div class="list-group">
			    <div class="list-group-item" style="background-color:dodgerBlue;color:#fff;">
				  <div align="center"><h5 style="line-height:30px;"><b>See How to Apply to set a Record?</b></h5></div>
				</div>
			  </div><!--/.list-group -->
			  </a>
			  
			  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/marketing-solutions" style="text-decoration:none;">
			  <div class="list-group">
			    <div class="list-group-item" style="background-color:tomato;color:#fff;">
				  <div align="center"><h5 style="line-height:30px;"><b>Know our Marketing Solutions</b></h5></div>
				</div>
			  </div><!--/.list-group -->
			  </a>
			  
			  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/standard-applications" style="text-decoration:none;">
			  <div class="list-group">
			    <div class="list-group-item" style="background-color:mediumSeaGreen;color:#fff;">
				  <div align="center"><h5 style="line-height:30px;"><b>Know our Application Process</b></h5></div>
				</div>
			  </div><!--/.list-group -->
			  </a>
			  
			  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/make-rsbr-title" style="text-decoration:none;">
			  <div class="list-group">
			    <div class="list-group-item" style="background-color:#f55b8f;color:#fff;">
				  <div align="center"><h5 style="line-height:26px;"><b>You can find the information about 
				  How to make Royal Success Book of Records Title at here.</b></h5></div>
				</div>
			  </div><!--/.list-group -->
			  </a>
			  
			  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/find-categories" style="text-decoration:none;">
			  <div class="list-group">
			    <div class="list-group-item" style="background-color:#fdac35;color:#fff;">
				  <div align="center"><h5 style="line-height:26px;">
				  <b>Find our Categories where you can make your Records</b></h5></div>
				</div>
			  </div><!--/.list-group -->
			  </a>
			  
			  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/our-panel-board" style="text-decoration:none;">
			  <div class="list-group">
			    <div class="list-group-item" style="background-color:#d453ea;color:#fff;">
				  <div align="center"><h5 style="line-height:26px;">
				  <b>See Our Panel Board Members</b></h5></div>
				</div>
			  </div><!--/.list-group -->
			  </a>
			<!-- -->
			</div>
		  </div>
		</div>
	   
	   
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
	
</div>
</body>
</html>