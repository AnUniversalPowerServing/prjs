<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Success Book of Records</title>
  <?php include_once 'templates/api-params.php'; ?>
<style>
body { background-color:#f7f7f7; }
</style>
<script type="text/javascript">
var PROGRESS=0;
var frwdProgress=true;
function progressBar(){
 setInterval(function(){
  var content='<div class="progress-bar" role="progressbar" aria-valuenow="'+PROGRESS+'" ';
	  content+='aria-valuemin="0" aria-valuemax="100" style="width:'+PROGRESS+'%"></div>'; 
  document.getElementById("rsbr-progress").innerHTML=content;  
  if(PROGRESS===100){ frwdProgress=false; }
  if(PROGRESS===0){ frwdProgress=true; }
  if(frwdProgress){ PROGRESS++; }
  else { PROGRESS--; }
 }, 10);
}
$(document).ready(function(){
// progressBar();
setTimeout(function(){ transferToMainPage(); },3000);
 // blinkImg();
});
var BLINK = false;
function blinkImg(){
 setInterval(function(){
    if($("#logoImg").hasClass('hide-block')){ $("#logoImg").removeClass('hide-block'); }
	else { $("#logoImg").addClass('hide-block'); }
 },100);
}
function transferToMainPage(){
 window.location.href=PROJECT_URL+'app/home';
}
</script>
<style>
.hide-block { display:none; }
</style>
</head>
<body>
<!-- -->
 <div class="container-fluid">
  <div class="row">
    <div align="center" class="col-md-12 col-sm-12 col-xs-12">
	  <img id="logoImg" src="http://localhost/prjs/rsbr/webapp/images/logo.png" style="width:400px;height:auto;margin-top:8%;"/>
	</div><!--/.col-md-4 col-sm-4 col-xs-12 -->
	<div align="center" class="col-md-12 col-sm-12 col-xs-12">
	  <button class="btn btn-default" onclick="javascript:transferToMainPage();"
	  style="border:2px solid #0e2551; background-color:#f7f7f7;font-size:22px;letter-spacing:2px;font-family:inedita;color:#0e2551;">
	  <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Get Started&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></button>
	</div><!--/.col-md-4 col-sm-4 col-xs-12 -->
  </div><!--/.row -->
 </div><!--/.container-fluid -->
<!-- -->
</body>
</html>