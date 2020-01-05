  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/api/simple-sidebar.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <!-- include summernote css/js -->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<?php
$_SESSION["PROJECT_MODE"]='DEBUG'; // DEBUG / PROD
if($_SESSION["PROJECT_MODE"]=='DEBUG'){
 $_SESSION["PROJECT_URL"]="http://".$_SERVER["HTTP_HOST"]."/prjs/rsbr/webapp/"; 
} else {
 $_SESSION["PROJECT_VERSION_NUMBER"]='1.0';
 $_SESSION["PROJECT_URL"]="http://royalsuccessbookofrecords.com/";
}
?>
<style>
@font-face { font-family:inedita;src:url('fonts/Inedita.otf'); }
@font-face { font-family:glarious;src:url('fonts/glarious.otf'); }
@font-face { font-family:longdoosi-regular;src:url('fonts/longdoosi-regular.ttf'); }
</style>
<script type="text/javascript">
var PROJECT_MODE='<?php  if(isset($_SESSION["PROJECT_MODE"])) { echo $_SESSION["PROJECT_MODE"]; } ?>';
var PROJECT_VERSION_NUMBER = '<?php  if(isset($_SESSION["PROJECT_VERSION_NUMBER"])) { echo $_SESSION["PROJECT_VERSION_NUMBER"]; } ?>';
var PROJECT_URL='<?php  if(isset($_SESSION["PROJECT_URL"])) { echo $_SESSION["PROJECT_URL"]; } ?>';
var USR_LANG = 'english';
var USER_ACCOUNT_ID='<?php if(isset($_SESSION["USER_ACCOUNT_ID"])) { echo $_SESSION["USER_ACCOUNT_ID"]; } ?>';
var USER_ACCOUNT_TYPE='<?php if(isset($_SESSION["USER_ACCOUNT_TYPE"])) { echo $_SESSION["USER_ACCOUNT_TYPE"]; } ?>';
var USER_MOBILE_NUMBER='<?php if(isset($_SESSION["USER_MOBILE_NUMBER"])) { echo $_SESSION["USER_MOBILE_NUMBER"]; } ?>';
var USER_ACCOUNT_USERNAME='<?php if(isset($_SESSION["USER_ACCOUNT_USERNAME"])) { echo $_SESSION["USER_ACCOUNT_USERNAME"]; } ?>';
var USER_ACCOUNT_NAME='<?php if(isset($_SESSION["USER_ACCOUNT_NAME"])) { echo $_SESSION["USER_ACCOUNT_NAME"]; } ?>';

console.log("PROJECT_MODE: "+PROJECT_MODE);
console.log("PROJECT_VERSION_NUMBER: "+PROJECT_VERSION_NUMBER);
console.log("PROJECT_URL: "+PROJECT_URL);
console.log("USR_LANG: "+USR_LANG);
console.log("USER_ACCOUNT_ID: "+USER_ACCOUNT_ID);
console.log("USER_ACCOUNT_TYPE: "+USER_ACCOUNT_TYPE);
console.log("USER_MOBILE_NUMBER: "+USER_MOBILE_NUMBER);
console.log("USER_ACCOUNT_USERNAME: "+USER_ACCOUNT_USERNAME);
console.log("USER_ACCOUNT_NAME: "+USER_ACCOUNT_NAME);
</script>
<script type="text/javascript">
function js_ajax(method,url,data,fn_output){
 $.ajax({type: method, url: url,data:data, success: function(response) { fn_output(response); } }); 
}
function div_display_warning(div_Id,warning_Id){
js_ajax("GET",PROJECT_URL+'backend/config/warning_messages.json',{},function(response){
var content='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    content+='<strong>Warning!</strong><br/> '+response[warning_Id][USR_LANG];
    content+='</div>';
 document.getElementById(div_Id).innerHTML=content;
});
}
function alert_display_warning(warning_Id){
js_ajax("GET",PROJECT_URL+'backend/config/warning_messages.json',{},function(response){
var content='<div class="modal-dialog">';
	content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
    content+='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>';
    content+='<strong>Warning!</strong> '+response[warning_Id][USR_LANG];
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
var modalDivision = document.createElement("div"); 
    modalDivision.setAttribute("id", "alertWarningModal");
	modalDivision.setAttribute("class", "modal fade");
	modalDivision.setAttribute("role", "dialog");
 document.body.appendChild(modalDivision);  
 document.getElementById("alertWarningModal").innerHTML=content;
 $('#alertWarningModal').modal();
});
}
function div_display_success(div_Id,success_Id){
js_ajax("GET",PROJECT_URL+'backend/config/success_messages.json',{},function(response){
var content='<div class="alert alert-success alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    content+='<strong>Success!</strong> '+response[success_Id][USR_LANG];
    content+='</div>';
 document.getElementById(div_Id).innerHTML=content;
});
}
function alert_display_success(success_Id,success_url){
js_ajax("GET",PROJECT_URL+'backend/config/success_messages.json',{},function(response){
var content='<div class="modal-dialog">';
	content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
    content+='<div class="alert alert-success alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" onclick="javascript:urlTransfer(\''+success_url+'\');" class="close" data-dismiss="modal" ';
	content+='aria-label="close">&times;</a>';
    content+='<strong>Success!</strong> '+response[success_Id][USR_LANG];
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
var modalDivision = document.createElement("div"); 
    modalDivision.setAttribute("id", "alertSuccessModal");
	modalDivision.setAttribute("class", "modal fade");
	modalDivision.setAttribute("role", "dialog");
 document.body.appendChild(modalDivision);  
 document.getElementById("alertSuccessModal").innerHTML=content;
 $('#alertSuccessModal').modal({backdrop: "static"});
});
}
</script>
<script type="text/javascript">
var FILENAME;
function pictureUpload(img_Id,jsonData,uploadVal_fn,success_fn) {
/*
  JSONData: { folderName: '', renameFile:'' }
 */
  if(uploadVal_fn()){
	var folderName = jsonData.folderName;
	var renameFile = jsonData.renameFile;
    var form = $('#fileuploadForm')[0];
    var formData = new FormData(form);
	    formData.append("JSON_DATA",JSON.stringify(jsonData));
	    formData.append('uploadpic', $('input[type=file]')[0].files[0]); 
      console.log("data: "+JSON.stringify(formData));
    $.ajax({type: "POST", enctype: 'multipart/form-data', url: PROJECT_URL+"api/upload/file",
      data: formData, processData: false, contentType: false, cache: false, timeout: 600000, success: function (response) {  
        console.log("SUCCESS : "+response);
        if(PROJECT_MODE==='DEBUG'){
        FILENAME=PROJECT_URL+'uploads/'+folderName+'/'+response;
		} else {
		FILENAME=PROJECT_URL+folderName+'/'+response;
		}
        document.getElementById(img_Id).src=FILENAME;
        success_fn();
    },error: function (e) { console.log("ERROR : "+e); } });
  }
}
function pictureUploadClick(){
 event.preventDefault();document.getElementById('uploadpic').click();
}
</script>
<script type="text/javascript">
/* TimeZones */ 
function get_stdDateTimeFormat01(ts_date){ 
/* Input : YYYY-MM-DD HH:ii:ss
 * OutputStandardFormat01 : Thursday, 26 February 2018 02:00 PM 
 */
var days=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var months=["January","February","March","April","May","June","July","August","September","October","November","December"];
 var d = new Date(ts_date);
 var day=days[d.getDay()];
 var date=d.getDate();
 var month=months[d.getMonth()];
 var year=d.getFullYear();
 var hours = d.getHours() > 12 ? d.getHours() - 12 : d.getHours();
 var am_pm = d.getHours() >= 12 ? "PM" : "AM";
 hours = hours < 10 ? "0" + hours : hours;
 var minutes = d.getMinutes() < 10 ? "0" + d.getMinutes() : d.getMinutes();
 var seconds = d.getSeconds() < 10 ? "0" + d.getSeconds() : d.getSeconds();
 return day+", "+date+" "+month+" "+year+" "+hours + ":"+minutes+" "+am_pm;
}
function logout(){
 console.log("logout");
 js_ajax("POST",PROJECT_URL+'backend/php/api/app.session.php',{action:'DestroySession'},function(response){
  window.location.href=PROJECT_URL; });
}
</script>