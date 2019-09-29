<?php
$_SESSION["USER_ACCOUNT_ID"]='ADMINISTRATOR';
$_SESSION["PROJECT_MODE"]='DEBUG'; // DEBUG / PROD
if($_SESSION["PROJECT_MODE"]=='DEBUG'){
 $_SESSION["PROJECT_URL"]="http://".$_SERVER["HTTP_HOST"]."/prjs/rsbr/webapp/"; 
} else {
 $_SESSION["PROJECT_VERSION_NUMBER"]='1.0';
 $_SESSION["PROJECT_URL"]="http://widesecond.com/rsbr2.0/";
}
?>
<script type="text/javascript">
var PROJECT_MODE='<?php  if(isset($_SESSION["PROJECT_MODE"])) { echo $_SESSION["PROJECT_MODE"]; } ?>';
var PROJECT_VERSION_NUMBER = '<?php  if(isset($_SESSION["PROJECT_VERSION_NUMBER"])) { echo $_SESSION["PROJECT_VERSION_NUMBER"]; } ?>';
var PROJECT_URL='<?php  if(isset($_SESSION["PROJECT_URL"])) { echo $_SESSION["PROJECT_URL"]; } ?>';

var USER_ACCOUNT_ID='<?php if(isset($_SESSION["USER_ACCOUNT_ID"])) { echo $_SESSION["USER_ACCOUNT_ID"]; } ?>';
</script>