<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<style>
.fs12 { font-size:12px; }
.mtopbot5p { margin-top:5px;margin-bottom:5px; }
.padRight0 { padding-right:0px; }
.padLeft0 { padding-left:0px; }
.padLeft40 { padding-left:40px; }
.pad0 { padding:0px; }
.pad10 { padding:10px; }
.mbot0p { margin-bottom:0px; }
.hide-block { display:none; }
.process-bg { background-color:#eee;padding-top:5px;padding-bottom:5px; }
</style>
<script type="text/javascript">
$(document).ready(function(){
 setup_process_marketStore();
});
function setup_process_marketStore(){
 $('#process_marketStore').change(function() {
  if($(this).prop('checked')){
   if($('#process_marketStore_options').hasClass('hide-block')){ $('#process_marketStore_options').removeClass('hide-block'); }
  } else {
    if(!$('#process_marketStore_options').hasClass('hide-block')){ $('#process_marketStore_options').addClass('hide-block'); }
  }
 });
 $('#process_marketStore_single').change(function() {
  if($(this).prop('checked')){ $('#process_marketStore_multiple').bootstrapToggle('off'); } 
  else { $('#process_marketStore_multiple').bootstrapToggle('on'); }
 });
 $('#process_marketStore_multiple').change(function() {
  if($(this).prop('checked')){ $('#process_marketStore_single').bootstrapToggle('off'); } 
  else { $('#process_marketStore_single').bootstrapToggle('on'); }
 });
}
function setup_process(){
 var marketStore = document.getElementById("process_marketStore").checked;
 var marketStoreSingle = document.getElementById("process_marketStore_single").checked;
 var marketStoreMultiple = document.getElementById("process_marketStore_multiple").checked;
 var inventory = document.getElementById("process_inventory").checked;
 var wholesaleBuyers = document.getElementById("process_wholesaleBuyers").checked;
 var customers = document.getElementById("process_customers").checked;
 if(marketStore && inventory && process_wholesaleBuyers){ // B2B
 
 } else if(marketStore && inventory && customers){ // B2C
 
 } 
 else { // 
 
 }
}
     
</script>
</head>
<body>
  
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-4">
      <div align="center"><h5><b>E-Commerce Process Management</b></h5></div>
	</div><!--/.col-sm-4 -->
  </div><!--/.row -->
<style>
 #processFlow { width:600px;height:400px; }
</style>
  <div class="row">
    <div class="col-sm-4">
      <!-- -->
	  <div class="list-group">
	    <div class="list-group-item" data-toggle="collapse" data-target="#process_b2b_options">
		  <b>Business 2 Business</b><i class="fa fa-2x fa-angle-double-down pull-right"></i>
		</div><!--/.list-group-item -->
		<div id="process_b2b_options" class="collapse">
		  <div class="list-group-item"><?php include_once 'templates/ecom-process-b2b.php'; ?></div>
		</div>
		<div class="list-group-item" data-toggle="collapse" data-target="#process_b2c_options">
		  <b>Business 2 Consumer</b><i class="fa fa-2x fa-angle-double-down pull-right"></i>
		</div><!--/.list-group-item -->
		<div id="process_b2c_options" class="collapse">
		  <div class="list-group-item"><?php include_once 'templates/ecom-process-b2c.php'; ?></div>
		</div>
		<div class="list-group-item" data-toggle="collapse" data-target="#process_c2c_options">
		  <b>Consumer 2 Consumer</b><i class="fa fa-2x fa-angle-double-down pull-right"></i>
		</div><!--/.list-group-item -->
		<div id="process_c2c_options" class="collapse">
		  <div class="list-group-item"><?php include_once 'templates/ecom-process-c2c.php'; ?></div>
		</div>
		<div class="list-group-item" data-toggle="collapse" data-target="#process_other_features">
		  <b>Other Features</b><i class="fa fa-2x fa-angle-double-down pull-right"></i>
		</div><!--/.list-group-item -->
		<div id="process_other_features" class="collapse">
		  <div class="list-group-item"><?php include_once 'templates/ecom-process-other-features.php'; ?></div>
		</div>
	  </div><!--/.list-group -->
	  <!-- -->
	</div><!--/.col-sm-4 -->
	<div id="processFlow" class="col-sm-8"></div>
  </div><!--/.row -->
  
  
  
  <div class="row">
    <div class="col-sm-4">
      <div class="list-group">
	    <div class="list-group-item mbot0p">
	     <!-- -->
		 <div class="container-fluid">
		 
		 <div class="row">
		   <div class="col-sm-12 mtopbot5p process-bg">
			  <label class="checkbox-inline">
			   <input id="process_marketStore" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"
			   data-toggle="toggle" data-size="mini" onchange="javascript:setup_process();setup_process_marketStore();"> Market Store
			  </label>
		   </div>
		 </div>
		 
		 <div id="process_marketStore_options" class="hide-block">
		  <div class="row">
		  
		   <div align="right" class="col-sm-6 mtopbot5p">
			  <label class="checkbox-inline">
			   <input id="process_marketStore_single" checked type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"
			   data-toggle="toggle" data-size="mini" onclick="javascript:setup_process();"> Single Market Store
			  </label>
		   </div>
		   <div align="right" class="col-sm-6 mtopbot5p">
			  <label class="checkbox-inline">
			   <input id="process_marketStore_multiple" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"
			   data-toggle="toggle" data-size="mini" onclick="javascript:setup_process();"> Multi Market Store
			  </label>
		   </div>
		   
		   </div><!--/.row -->
		 </div>
		 
		 <div class="row">
		   <div class="col-sm-12 mtopbot5p process-bg">
			  <label class="checkbox-inline">
			   <input id="process_inventory" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"
			   data-toggle="toggle" data-size="mini" onclick="javascript:setup_process();"> Inventory
			  </label>
		   </div>
		 </div>
		 <div class="row">
		   <div class="col-sm-12 mtopbot5p process-bg">
			  <label class="checkbox-inline">
			   <input id="process_wholesaleBuyers" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"
			   data-toggle="toggle" data-size="mini" onclick="javascript:setup_process();"> Whole-sale Buyers
			  </label>
		   </div>
		 </div>
		 <div class="row">
		   <div class="col-sm-12 mtopbot5p process-bg">
			  <label class="checkbox-inline">
			   <input id="process_customers" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"
			   data-toggle="toggle" data-size="mini" onclick="javascript:setup_process();"> Customers
			  </label>
		   </div>
		 </div> 
		 <div class="row">
		 <div class="col-sm-6">
		   defffrfer
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- -->
		</div><!--/.list-group -->
	  </div><!--/.list-group -->
    </div>
    <div class="col-sm-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>

</body>
</html>
