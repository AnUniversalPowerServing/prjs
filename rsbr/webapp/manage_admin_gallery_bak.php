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
.hide-block { display:none; }
</style>
<script type="text/javascript">
var user='<?php echo $_GET["user"]; ?>';
console.log("user: "+user);
$(document).ready(function(){
   viewListOfAlbums();
});
var GALLERY_PATH=PROJECT_URL+'uploads/gallery/';

function viewListOfAlbums(){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.album.php',{ action:'viewlistOfAlbum' },function(response){
   console.log(response);
   var imgs=response.split('|');
   console.log(imgs);
   
   var content='';
   for(var index=0;index<imgs.length;index++){
       content+='<div class="col-xs-12 col-md-3 col-sm-3">';
       content+='<img src="'+GALLERY_PATH+imgs[index]+'" ';
	   content+='style="width:100%;"/>';
	   if(user==='N'){
	   content+='<div align="center"><button class="btn btn-default form-control" ';
	   content+='onclick="javascript:deleteAlbumImageConfirm(\''+imgs[index]+'\');"';
	   content+='style="border-top-left-radius:0px;border-top-right-radius:0px;"><b>Delete</b></button></div>';
	   }
	   content+='</div>';
   }  
   document.getElementById("rsbr_img_gallerylist").innerHTML=content;
  });
}

function deleteAlbumImageConfirm(albumName){
var content='<div class="modal-dialog">';
    content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
	content+='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>';
    content+='<div><strong>Are you sure to delete Image from Gallery?</strong></div>';
	content+='<div align="right">';
	content+='<div class="btn-group">';
	content+='<button class="btn btn-danger" ';
	content+='onclick="javascript:deleteAlbumImage(\''+albumName+'\');"><b>Yes</b></button>';
	content+='<button class="btn btn-success" ';
	content+='onclick="javascript:$(\'#deleteGalleryConfirm\').modal(\'hide\');"><b>No</b></button>';
	content+='</div>';
	content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
 document.getElementById("deleteGalleryConfirm").innerHTML=content;
 $('#deleteGalleryConfirm').modal();
}
function deleteAlbumImage(albumName){
 $('#deleteGalleryConfirm').modal('hide');
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.album.php',{ action:'deleteAfileInMainFolder', fileName:albumName },
 function(response){
   console.log(response);
   viewListOfAlbums();
 });
}
</script>
<div id="deleteGalleryConfirm" class="modal fade" role="dialog"></div>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	   <?php include_once 'templates/top-header.php';?>
	   
	   <div class="container-fluid" style="background-color:dodgerBlue;">
	    <div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <span class="heading">Manage Gallery</span>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		</div>
	   </div>
	   
	   <div class="container-fluid" style="background-color:#47a8f5;">
	    <!--/.row -->
		<div class="row mtop50p mbot50p">
		 <div align="center" class="col-md-4 col-sm-4 col-xs-12 mbot15p">
		  <img src="http://www.safetytechnology.co.uk/wp-content/uploads/2019/01/o-SKYDIVER-facebook.jpg"
		   style="width:300px;height:230px;border:2px solid #fff;"/>
		 </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		 <div class="col-md-8 col-sm-8 col-xs-12 mtop15p">
		   <div style="font-family:longdoosi-regular;font-size:28px;color:#fff;margin-top:15px;">
			It is a space for the display of art, usually from the own collection. There are a number of 
			online art catalogues and galleries that have been developed independently of the support of
			any individual.
		   </div>
		 </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		</div>
	   </div>
<script type="text/javascript">
function uploadGalleryForm(){ 
 pictureUpload('add_img_gallery',{ folderName: 'gallery' },
 function(){ return true; },
 function(){ viewListOfAlbums(); });
}
</script> 
     <?php if(isset($_GET["user"]) && $_GET["user"]=='N') { ?>
	   <div class="container-fluid mtop15p">
	    <div class="row">
		  <div align="right" class="col-xs-12 col-md-12 col-sm-12">
		    <form name="fileuploadForm" id="fileuploadForm" action="#" method="POST" enctype="multipart/form-data">
			  <input type="file" name="uploadpic" id="uploadpic" accept="image/*"  
				      onchange="javascript:uploadGalleryForm();" style="visibility:hidden;"/>
			  <span id="add_img_gallery" class="label label-primary" style="padding:10px 15px;cursor:pointer;" 
			  onclick="javascript:pictureUploadClick();"><b>Add New Images</b></span>
			</form>
		    
		  </div><!--/.row -->
		</div><!--/.row -->
	   </div><!--/.container-fluid -->
	  <?php } ?>
	   <div class="container-fluid" style="margin-top:50px;min-height:600px;">
	     <div id="rsbr_img_gallerylist" class="row">
		  <div class="col-xs-12 col-md-3 col-sm-3">
		  
		  </div>
		 </div><!-- row -->
	   </div><!-- container-fluid-->
	   
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
	
</div>
</body>
</html>