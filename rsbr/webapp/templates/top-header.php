<script type="text/javascript">
$(document).ready(function(){
 if($(window).width()<=768){
  sideWrapperToggle();
 }
});
function sideWrapperToggle(){
if($("#wrapper").hasClass('toggled')) { 
 $("#wrapper").removeClass('toggled'); // hides SideMenu
 // $("#page-content-wrapper").css("position","absolute");
}
else { 
 $("#wrapper").addClass("toggled");  // adds SideMenu
// $("#page-content-wrapper").css("position","fixed");
 // setTimeout(function(){ $("html").addClass("stop-vertificalScroll"); },400);
}
}
</script> 
<style>
@media (min-width: 768px){ #topMenu { float: right!important; } }

@font-face { font-family:glarious;src:url('fonts/glarious.otf'); }
@font-face { font-family:longdoosi-regular;src:url('fonts/longdoosi-regular.ttf'); }

.fs22p { font-size:22px; }

.mtop5p { margin-top:5px; }
.mtop15p { margin-top:15px; }
.mtop50p { margin-top:50px; }

.mbot5p { margin-bottom:5px; }
.mbot20p { margin-bottom:20px; }
.mbot50p { margin-bottom:50px; }

.font-white { color:#fff; }
.lh35p { line-height:35px; }

hr { border-bottom:2px solid #ccc; }
hr.tomato { border-bottom:2px solid tomato; }
hr.dodgerBlue { border-bottom:2px solid dodgerBlue; }
hr.black { border-bottom:2px solid black; }
hr.white { border-bottom:2px solid white; }

.btn-blue-o { background-color:#fff;border:2px solid dodgerblue;color:dodgerblue;font-weight:bold; }
.btn-green-o { background-color:#fff;border:2px solid mediumSeaGreen;color:mediumSeaGreen;font-weight:bold; }
.btn-tomato-o { background-color:#fff;border:2px solid tomato;color:tomato;font-weight:bold; }
.btn-orange-o { background-color:#fff;border:2px solid orange;color:orange;font-weight:bold; }
.btn-purple1-o { background-color:#fff;border:2px solid #a02cd6;color:#a02cd6;font-weight:bold; }

.btn-purple2-o { background-color:#fff;border:1px solid #6d049e;color:#6d049e;font-weight:bold; }

.btn-purple3-o { background-color:#fff;border:1px solid #6d049e;color:#6d049e;font-weight:bold; }
.btn-purple3-o:hover { background-color:#6d049e;border:1px solid #6d049e;color:#fff; }

.btn-purple3 { background-color:#6d049e;border:1px solid #6d049e;color:#fff;font-weight:bold; }
.btn-purple3:hover { background-color:#fff;border:1px solid #6d049e;color:#6d049e; }

.btn-purple2 { background-color:#6d049e;color:#fff;border:1px solid #6d049e; }
.btn-purple2:hover { background-color:#a02cd6;color:#fff;border:1px solid #a02cd6; }


</style>

<nav class="navbar navbar-default" 
style="position:sticky;border:0px;border-radius:0px;background-color:#fcfcfc;margin-bottom:-10px;">

		  <div align="center" class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#" style="cursor:pointer;color:#6d049e;" onclick="javascript:sideWrapperToggle();">
			    <span class="glyphicon glyphicon-align-justify"></span>
			  </a>
			  <span><img src="images/logo.png" style="width:110px;height:110px;"/></span>
			</div>
		
			<div id="topMenu" style="margin-top:2%;">
			<form class="navbar-form navbar-left">
			  <?php
  			    if(isset($_SESSION["USER_ACCOUNT_ID"])) { 
			    if($_SESSION["USER_ACCOUNT_ID"]=='ADMINISTRATOR') { 
			  ?>
			   <div class="form-group">
			     <!-- -->
<style>
ul.dropdown-menu>li>a { color:#6d049e; }
</style>
			     <div class="dropdown">
			      <button class="btn btn-default dropdown-toggle btn-purple3-o form-control" 
				  data-toggle="dropdown">Admin Management 
				    <span class="caret"></span></button>
				  <ul class="dropdown-menu" style="width:325px;">
					<li><a href="manage_admin_panelboard.php"><b>Manage Panel Board</b></a></li>
					<li class="divider"></li>
					<li><a href="manage_admin_gallery.php"><b>Manage Gallery</b></a></li>
					<li class="divider"></li>
					<li><a href="manage_admin_events.php"><b>Manage Events</b></a></li>
					<li class="divider"></li>
					<li><a href="manage_admin_categories.php"><b>Manage Categories</b></a></li>
					<li class="divider"></li>
					<li><a href="manage_admin_media.php"><b>Manage News</b></a></li>
				  </ul>
				 </div>
				 <!-- -->
			  </div>
			  <div class="form-group">
			    <!-- -->
				<div class="dropdown">
			      <button class="btn btn-default dropdown-toggle btn-purple3-o form-control" data-toggle="dropdown">
				    Customer Management <span class="caret"></span></button>
				  <ul class="dropdown-menu" style="width:325px;">
					<li><a href="manage_customer_viewNewRequests.php"><b>View New Requests</b></a></li>
					<li class="divider"></li>
					<li><a href="manage_customer_viewRequestsHistory.php"><b>View Requests History</b></a></li>
				  </ul>
				</div>
				<!-- -->
			  </div>
			  <div class="form-group">
			    <a href="#" data-toggle="modal" data-target="#messageBalance">
			      <button class="btn btn-default btn-purple3-o form-control">View Message Balance</button>
				</a>
			  </div>
			  <?php } else if($_SESSION["USER_ACCOUNT_ID"]=='CUSTOMER') { ?>
			  <div class="form-group">
			    <button class="btn btn-default btn-purple3-o form-control"></button>
			  </div>
			  <?php } } else { ?>
			  <div class="form-group">
			    <button class="btn btn-default btn-purple3-o form-control">Login / Register</button>
			  </div>
			  <?php } ?>
              <div class="form-group">
			    <button class="btn btn-default btn-purple3 form-control">Download App</button>
			  </div>
			  
			</div>
			
		  </div>
	  </nav>

<!-- Modal ::: Start -->
<div id="messageBalance" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3da1f1;color:#fff;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>View Message Balance</b></h4>
      </div>
      <div class="modal-body">
      <!-- -->
	  <div class="container-fluid">
	   <div class="row">
	    <div align="center" class="col-md-12 col-sm-12 col-xs-12">
	    <!-- -->
		<h3>1000 Messages</h3>
		<!-- -->
	    </div><!--/.col-md-6 -->
	   </div><!--/.row -->
	  </div><!--/.container-fluid -->
	  <!-- -->
      </div>
    </div>

  </div>
</div>
<!-- Modal :::End -->