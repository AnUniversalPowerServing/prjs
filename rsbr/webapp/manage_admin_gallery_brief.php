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
 var news_Id='<?php echo $_GET["news_Id"]; ?>';
 js_ajax('POST',PROJECT_URL+'backend/php/dac/controller.latest.gallery.php',
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
	   
	   <div class="container-fluid" style="background-color:#555;">
		 <div class="row">
	       <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		     <span id="news-title" style="font-family:longdoosi-regular;color:#fff;font-size:28px;"></span>
		   </div>
	     </div>
	   </div>
		
		
		<div class="container-fluid" style="margin-bottom:50px;">
		  <div class="row">
	        <div id="view_media_brief" class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		
		
			</div>
		 </div>
		</div>
	   
	   
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
	
</div>
</body>
</html>