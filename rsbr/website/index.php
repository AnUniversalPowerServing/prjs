<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<style>
.navbar-default { background-color:#fff;border:0px;}
#navbar-subMenu { width:100%;position:absolute;border:1px solid #e7e7e7;background-color:#e7e7e7;z-index:10; }
@media (min-width: 768px){
.navbar-nav>li { margin:5px; }
#myNavbar { margin-top:20px; }
#navbar-subMenu { top:11%; }
}
@media (max-width: 768px){
#myNavbar { margin-top:60px; }
#navbar-subMenu { top:20%; }
}
</style>

<div id="navbar-subMenu" style="">
			Position
		  </div>
		  
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="padding:0 15px;">
	    <img src="images/profile.jpg" style="width:120px;height:120px;z-index:-1;"/>
	  </a>
    </div>
	
	
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="margin:0 -15px;">
        <li style="background-color:#e91e63;font-weight:bold;"><a href="#" style="color:#fff;">Home</a></li>
		<li style="background-color:#009688;font-weight:bold;">
		  <a style="color:#fff;" href="#">Page 1</a>
		  
		  <!--
		  <div class="dropdown-menu">
            <div><a href="#">Page 1-1</a></div>
            <div><a href="#">Page 1-2</a></div>
            <div><a href="#">Page 1-3</a></div>
          <div>
		  -->
        </li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
