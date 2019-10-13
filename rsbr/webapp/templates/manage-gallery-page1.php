<style>
.home-media-div-img { width:100%;height:250px;padding:0px; }
.home-media-img { width:100%;height:250px; }
.home-media-img-desc { color:#777; }
.home-media-div { border:1px solid mediumSeaGreen; }
.home-media-title { font-family:longdoosi-regular;color:tomato; }
</style>
<div class="container-fluid"  style="height:auto;margin-bottom:50px;min-height:600px;">

<?php if(isset($_GET["user"]) && $_GET["user"]=='N') { ?>
<div class="row">

  <div align="right" class="col-xs-12 col-md-12 col-sm-12" style="margin-top:25px;">
     <button class="btn btn-rsbr3-o" data-toggle="modal" data-target="#addLatestNewsModal" 
	 data-backdrop="static" onclick="event.preventDefault();"><b>Add Latest Gallery</b></button>
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