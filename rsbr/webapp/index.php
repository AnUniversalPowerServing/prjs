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
<script type="text/javascript">
$(document).ready(function(){
 viewLatestNews();
 viewLatestGallery(); 
});

function viewLatestNews(){
 js_ajax('POST',PROJECT_URL+'backend/php/dac/controller.latest.news.php',
 { action : 'VIEW_LATEST_NEWS_3' },function(response){
   console.log("response: "+response);
   response=JSON.parse(response);
   var content='';
   for(var index=0;index<response.length;index++){
     var news_Id = response[index].news_Id;
     var title = response[index].title;
     var picture = response[index].picture;
     var ts = response[index].ts;
    content+='<div class="col-md-4 col-sm-4 col-xs-12">';
	content+='<div class="list-group">';
	content+='<div class="list-group-item home-media-div">';
	
	content+='<div class="list-group">';
	content+='<div class="list-group-item home-media-div-img">';
	content+='<img src="'+picture+'" class="home-media-img"/>';
	content+='</div>';
	content+='</div>';
		
	content+='<div align="justify" class="home-media-img-desc">'+title+'</div>';
		
	content+='<div align="left" class="mtop15p"><span style="color:#aaa;">'+get_stdDateTimeFormat01(ts)+'</span></div>';
		
    content+='<div align="right">';
	content+='<a href="'+PROJECT_URL+'media-brief/'+news_Id+'">';
	content+='<button class="btn btn-xs btn-default btn-green-o"><b>Know more</b></button>';
	content+='</a>';
	content+='</div>';
	
	content+='</div>';
	content+='</div>';
	
	content+='</div>';
   }
   
   document.getElementById("view_latestNews_info").innerHTML=content;
 });
}

function viewLatestGallery(){
 js_ajax('POST',PROJECT_URL+'backend/php/dac/controller.latest.gallery.php',{ action:'VIEW_LATEST_NEWS3' },
 function(response){ 
   console.log("response: "+response);
   response=JSON.parse(response);
   var content='';
   for(var index=0;index<response.length;index++){
     var news_Id = response[index].news_Id;
     var title = response[index].title;
	 
     var picture = response[index].picture;
     var ts = response[index].ts;
	 content+='<div class="list-group">';
	 if(index%10===0){
	 content+='<div class="list-group-item home-record-ach-div-blue">';
	 } else if(index%10===1){
	 content+='<div class="list-group-item home-record-ach-div-tomato">';
	 } else if(index%10===2){
	 content+='<div class="list-group-item home-record-ach-div-slateBlue">';
	 } else if(index%10===3){
	 content+='<div class="list-group-item home-record-ach-div-mediumSeaGreen">';
	 } else if(index%10===4){
	 content+='<div class="list-group-item home-record-ach-div-blue">';
	 } else if(index%10===5){
	 content+='<div class="list-group-item home-record-ach-div-tomato">';
	 }
	 content+='<div class="container-fluid">';
	 content+='<div class="row">';
	 content+='<div class="col-md-3 col-sm-3 col-xs-12">';
	 content+='<img src="'+picture+'" ';
	 content+='class="home-record-ach-img">';
	 content+='</div>';
	 content+='<div class="col-md-9 col-sm-9 col-xs-12 font-white"><div>';
	 content+='<h3 class="lh35p"><b>'+title+'</b></h3>';
	 content+='</div>';
	 content+='<div>';
	 content+='<div class="pull-left" style="margin-top:15px;"><b>'+get_stdDateTimeFormat01(ts)+'</b></div>';
	 content+='<a href="'+PROJECT_URL+'gallery-brief/'+news_Id+'">';
	 content+='<button class="btn btn-default btn-blue-o pull-right"><b>Know more</b></button>';
	 content+='</a>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
   }
   document.getElementById("latestRecordAchievements").innerHTML=content;
 });
}
</script>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	  <!-- -->
	  <?php include_once 'templates/top-header.php';?>
	  
	  <?php include_once 'templates/home-slider.php';?>
	  
	  <?php include_once 'templates/home-row1-headers.php';?>
	  
	  <?php include_once 'templates/home-row2-media.php';?>
	  
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