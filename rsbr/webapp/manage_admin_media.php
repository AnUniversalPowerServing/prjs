<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Success Book of Records</title>
  <?php include_once 'templates/api-params.php'; ?>
  <!-- include summernote css/js -->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
</head>
<body>
<style>
html { overflow-x:hidden;overflow-y:scroll; }
.heading { font-family:longdoosi-regular;font-size:36px;color:#fff; }
</style>
<!-- -->
<script type="text/javascript">
var user='<?php echo $_GET["user"]; ?>';
console.log("user: "+user);
$(document).ready(function() {
  $('.summernote').summernote({height: 300});
  viewLatestNews();
});
function addLatestNews(){
 var title = $('#add_latestNews_title').val();
 var newsDesc = $('#add_latestNews_desc').summernote('code').replace(/'/g,"\\'");
 console.log("FILENAME: "+FILENAME);
 console.log("title: "+title);
 console.log("newsDesc: "+newsDesc);
 if(FILENAME!==undefined){
  if(title.length>0){
   if(newsDesc.length>0){
    $('#addLatestNewsModal').modal('hide');
    js_ajax('POST',PROJECT_URL+'backend/php/dac/controller.latest.news.php',
	{ action : 'ADD_LATEST_NEWS', title:title, picture:FILENAME, desc:newsDesc },function(response){
	  console.log("response: "+response);
	  viewLatestNews();
	});
    console.log("FILENAME: "+FILENAME);
	console.log("title: "+title);
	console.log("newsDesc: "+newsDesc);
   } else { div_display_warning('add_latestNews_alert','W008'); }
  } else { div_display_warning('add_latestNews_alert','W007'); }
 } else { div_display_warning('add_latestNews_alert','W006'); }
}

function viewLatestNews(){
 js_ajax('POST',PROJECT_URL+'backend/php/dac/controller.latest.news.php',
 { action : 'VIEW_LATEST_NEWS' },function(response){
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
	if(user==='Y'){
	content+='<a href="'+PROJECT_URL+'media-brief/'+news_Id+'">';
	} else {
	content+='<a href="'+PROJECT_URL+'manage-admin-media-desc/'+news_Id+'">';
	}
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
</script>
<!-- -->
<!-- Modal ::: Start -->
<div id="addLatestNewsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Add Latest News</b></h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<div class="container-fluid">
		  <div class="row">
		    <div id="add_latestNews_alert" class="col-xs-12 col-md-12 col-sm-12">
			<!-- -->
<script type="text/javascript">
function uploadMediaForm(){ 
 pictureUpload('add_latestNews_pic',{ folderName: 'news' },
 function(){ return true; },
 function(){ });
}
</script> 			
			<!-- -->
			</div><!--/.col-xs-12 col-md-12 col-sm-12 -->
		  </div><!--/.row -->
		  
		  <div class="row">
		    <div align="center" class="col-xs-12 col-md-12 col-sm-12">
			  <!-- -->
			  <form name="fileuploadForm" id="fileuploadForm" action="#" method="POST" enctype="multipart/form-data">
				<input type="file" name="uploadpic" id="uploadpic" accept="image/*"  
				onchange="javascript:uploadMediaForm();" style="visibility:hidden;"/>
			    <img id="add_latestNews_pic" src="images/image-upload-icon.png" style="width:50%;height:auto;"
			    onclick="javascript:pictureUploadClick();"/>
			  </form>
			  <!-- -->
		    </div><!--/.col-xs-12 col-md-12 col-sm-12 -->
		  </div><!--/.row -->
		  
		  <div class="row">
		    <div class="col-xs-12 col-md-12 col-sm-12">
			  <!-- -->
		      <div class="form-group">
			    <label>Title</label>
				<input id="add_latestNews_title" type="text" class="form-control" placeholder="Enter News Title"/>
			  </div>
			  
			  <div class="form-group">
			    <label>Description</label>
				<div id="add_latestNews_desc" class="summernote">Write your <b>NewsFeed</b> here</div>
			  </div>
			  <!-- -->
			  
			  <!-- -->
			  <div class="form-group">
			    <button class="btn btn-primary form-control" onclick="javascript:addLatestNews();"><b>Add Latest News</b></button>
			  </div>
			  <!-- -->
			  
		    </div><!--/.col-xs-12 col-md-12 col-sm-12 -->
		  </div><!--/.row -->
		</div><!--/.container-fluid -->
		<!-- -->
      </div>
    </div>

  </div>
</div>
<!-- Modal ::: End -->
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	   <?php include_once 'templates/top-header.php';?>
	   
	   <div class="container-fluid" style="background-color:#555;">
	    <div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <h2 class="home-media-title" style="color:#fff;">What's happening at Royal Success Book of Records?</h2>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		</div>
	   </div>
	   
	   <?php include_once 'templates/manage-media-page1.php'; ?>
	   
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
	
</div>
</body>
</html>