<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/api/simple-sidebar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  sideWrapperToggle();
});
function sideWrapperToggle(){
if($("#wrapper").hasClass('toggled')) { 
 $("#wrapper").removeClass('toggled'); // hides SideMenu
 $('html').removeClass("stop-vertificalScroll");
 $("#page-content-wrapper").css("position","absolute");
}
else { 
 $("#wrapper").addClass("toggled");  // adds SideMenu
 $("#page-content-wrapper").css("position","fixed");
 setTimeout(function(){ $("html").addClass("stop-vertificalScroll"); },400);
}
}
</script> 
</head>
<body>

<div id="wrapper" class="toggled">
  <!-- Core Skeleton : Side and Top Menu -->
  <?php include_once 'templates/header.php'; ?>
	
  <div id="page-content-wrapper">
    <div align="center" style="left:45%;position:absolute;z-index:1;">
	 <img src="images/profile.jpg" style="width:200px;height:200px;background-color:#eee;border:2px solid #ccc;border-radius:50%;"/>
	</div>
	
	<nav id="header_bot" class="navbar" style="background-color:#eee;margin-bottom:0px;border-radius:0px;">
	  <div id="applogo-header">
		<a class="navbar-brand a-custom" style="cursor:pointer;" onclick="javascript:sideWrapperToggle();">
			<span class="glyphicon glyphicon-align-justify white-font"></span>
		</a>
		<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
		  <div id="div_app_logo" class="col-md-2 col-sm-4 col-xs-10" style="padding-left:0px;"></div>
		</div>
      </div>
    </nav>
	
  </div>
  
</div>
</body>
</html>