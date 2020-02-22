<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/api/bootstrap-advanced.css">
<link rel="stylesheet" href="styles/api/core-skeleton.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
<script type="text/javascript">
var PROJECT_URL='';
var USR_LANG='english';
</script>
<script src="js/api/bootstrap-advanced.js"></script>
<script src="js/api/core-skeleton.js"></script>
<script src="js/common/validations.js"></script>
<script src="js/auth/user-accounts-reg.js"></script>
<style>
body { background-color:purple;color:#fff; }
.mtop15p { margin-top:15px; }
.mtop65p { margin-top:65px; }
.mbot35p { margin-bottom:35px; }
/* Page Related CSS ::: Start */
.step-badges { height:40px;cursor:pointer;margin-top:15px; }
.step-badges>div>span.badge { font-size:30px;background-color:#fff;color:purple; }
.step-badges>div>span.badge.active { font-size:30px;background-color:#fff5c4;color:purple; }
.hide-block { display:none; }
/* Page Related CSS ::: End */
</style>

<script type="text/javascript">
$(document).ready(function(){
 trigger_userAccounts_auth();
});
</script>
</head>
<body>

<div class="container-fluid mtop65p">
<div class="row">
<div class="col-xs-12 col-md-2 col-sm-12"></div>
<div class="col-xs-12 col-md-4 col-sm-6">
 <?php include_once 'templates/auth/user-account-reg.php'; ?>
</div><!--/.col-xs-12 col-md-4 col-sm-4 -->
<div class="col-xs-12 col-md-4 col-sm-6">
 <?php include_once 'templates/auth/user-account-login.php'; ?>
</div><!--/.col-xs-12 col-md-4 col-sm-4 -->
<div class="col-xs-12 col-md-2 col-sm-12"></div>
</div><!--/.row -->
</div><!--/.container-fluid -->

</body>
</html>
