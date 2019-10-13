<style>
.home-item-bg1 { background-color:mediumSeaGreen;color:#fff;min-height:200px; }
.home-item-bg2 { background-color:dodgerBlue;color:#fff;min-height:200px; }
.home-item-bg5 { background-color:tomato;color:#fff;min-height:320px; }
.home-item-bg6 { background-color:orange;color:#fff;min-height:320px; }

.home-item-bg3 { background-color:#a02cd6;color:#fff;min-height:260px; }
.home-item-bg4 { background-color:tomato;color:#fff;min-height:260px; }

.home-item-title { font-family:Arial;font-weight:bold;letter-spacing:2px; }
.home-item-title-desc { font-family:arial;font-size:14px;letter-spacing:2px; }
</style>
<div class="container-fluid" style="height:auto;margin-bottom:50px;">

<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12 home-item-bg1">
 
	 <div>
	  <h3 align="center" class="home-item-title">How Royal Success Book of Records works?</h3>
	 </div><!--/div -->
	 <div align="center" class="home-item-title-desc">
	  Here you can find the process how Royal Success Book of Records works about record-breaking and 
	  the Royal Success Book of Records applications process, as well for our website and other products.
	 </div><!--/div -->
	 <div align="center" class="col-md-12 col-sm-12 col-xs-12 mtop15p mbot20p">
	   <button class="btn btn-default btn-green-o" data-toggle="modal" data-target="#howItWorksModal"><b>Watch Video</b></button>
	 </div><!--/div -->

 
</div><!--/.col-md-6 .col-sm-6 .col-xs-6 -->
<div id="howItWorksModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>How It Works?</b></h4>
      </div>
      <div class="modal-body">
        <!-- -->
		 <iframe width="100%" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
		<!-- -->
      </div>
    </div>

  </div>
</div>


<div class="col-md-6 col-sm-6 col-xs-12 home-item-bg2">

 <div>
  <h3 align="center" class="home-item-title">
   Find Categories
  </h3>
 </div><!--/div -->
 <div align="center" class="home-item-title-desc">
 Royal Success Book of Records crucially monitors the higher Achievements in the following categories
 </div><!--/div -->
 <div align="center" class="col-md-12 col-sm-12 col-xs-12 mtop15p mbot20p">
   <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/find-categories">
     <button class="btn btn-default btn-blue-o"><b>Know Categories</b></button>
   </a>
 </div><!--/div -->
 
</div><!--/.col-md-6 .col-sm-6 .col-xs-6 -->

</div><!--/.row -->

</div><!--/.container-fluid -->