<style>
.home-media-div-img { width:100%;height:250px;padding:0px; }
.home-media-img { width:100%;height:250px; }
.home-media-img-desc { color:#777; }
.home-media-div { border:1px solid mediumSeaGreen; }
.home-media-title { font-family:longdoosi-regular;color:tomato; }
</style>
<div class="container-fluid"  style="height:auto;margin-bottom:50px;min-height:600px;">

<div class="row">

 <div class="col-md-12 col-sm-12 col-xs-12">
   <h2 class="home-media-title">
    What's happening at Royal Success Book of Records?<hr class="tomato"/>
   </h2>
 </div>

</div><!--/.row -->
<?php if(isset($_GET["user"]) && $_GET["user"]=='N') { ?>
<div class="row">

  <div align="right" class="col-xs-12 col-md-12 col-sm-12">
     <button class="btn btn-danger" data-toggle="modal" data-target="#addLatestNewsModal" 
	 data-backdrop="static" onclick="event.preventDefault();"><b>Add Latest News</b></button>
   </div><!--/.row -->
	     
</div><!--/.row -->
<?php } ?>

<div id="view_latestNews_info" class="row mtop15p"></div>
<!-- ### Pagination Code
<div class="row">
  <div align="center" class="col-md-12 col-sm-12 col-xs-12">
    <button class="btn btn-default btn-tomato-o"><b>Know more</b></button>
  </div>
</div> -->
<!--/.row -->

</div><!-- container-fluid -->