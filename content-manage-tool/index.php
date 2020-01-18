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
  <script src="js/api/core-array.js"></script>
  <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<style>
.fs12 { font-size:12px; }
.mtopbot5p { margin-top:5px;margin-bottom:5px; }
.padRight0 { padding-right:0px; }
.padLeft0 { padding-left:0px; }
.padLeft10 { padding-left:10px; }
.padLeft40 { padding-left:40px; }
.pad0 { padding:0px; }
.pad10 { padding:10px; }
.mtop5p { margin-top:5px; }
.mtop10p { margin-top:10px; }
.mtop15p { margin-top:15px; }

.mbot0p { margin-bottom:0px; }
.hide-block { display:none; }
/* Page Related CSS ::: Start */
.process-bg { background-color:#eee;padding-top:5px;padding-bottom:5px; }
 #processFlow { height:400px; }
/* Page Related CSS ::: End */
</style>
<script type="text/javascript">
$(document).ready(function(){

});
     
</script>
</head>
<body>
  
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <!-- -->
	  <div align="center"><h5><b>E-Commerce Process Management</b></h5></div>
	  <div class="list-group">
	  
	    <div class="list-group-item" onclick="javascript:display_menu_list('process_b2b_options');">
		  <b>Business 2 Business</b><i class="fa fa-2x fa-angle-double-down pull-right"></i>
		</div><!--/.list-group-item -->
		<div id="process_b2b_options" class="collapse">
		  <div class="list-group-item"><?php include_once 'templates/ecom-process-b2b.php'; ?></div>
		</div>
		
		<div class="list-group-item" onclick="javascript:display_menu_list('process_b2c_options');">
		  <b>Business 2 Consumer</b><i class="fa fa-2x fa-angle-double-down pull-right"></i>
		</div><!--/.list-group-item -->
		<div id="process_b2c_options" class="collapse">
		  <div class="list-group-item"><?php include_once 'templates/ecom-process-b2c.php'; ?></div>
		</div>
		
		<div class="list-group-item" onclick="javascript:display_menu_list('process_c2c_options');">
		  <b>Consumer 2 Consumer</b><i class="fa fa-2x fa-angle-double-down pull-right"></i>
		</div><!--/.list-group-item -->
		<div id="process_c2c_options" class="collapse">
		  <div class="list-group-item"><?php include_once 'templates/ecom-process-c2c.php'; ?></div>
		</div>
		
		<div class="list-group-item" onclick="javascript:display_menu_list('process_other_features');">
		  <b>Other Features</b><i class="fa fa-2x fa-angle-double-down pull-right"></i>
		</div><!--/.list-group-item -->
		<div id="process_other_features" class="collapse">
		  <div class="list-group-item"><?php include_once 'templates/ecom-process-other-features.php'; ?></div>
		</div>
		
		<div align="right" class="list-group-item">
		  <button class="btn btn-success" onclick="javascript:generateFlow();"><b>Generate Flow</b></button>
		</div><!--/.list-group-item -->
		
	  </div><!--/.list-group -->
	  <!-- -->
	</div><!--/.col-sm-4 -->
	<div class="col-sm-4">
	  <!-- -->
	  <div align="center"><h5><b>E-Commerce Process Flow</b></h5></div>
	  <div class="list-group">
	    <div id="processFlow" class="list-group-item">
	  
	    </div><!--/.list-group-item -->
		<div id="processFlowDesc" class="list-group-item">
	  
	    </div><!--/.list-group-item -->
	  </div><!--/.list-group -->
	  <!-- -->
	</div>
	<div class="col-sm-4">
	  <!-- -->
	  <div align="center"><h5><b>E-Commerce Features Calculator</b></h5></div>
	  <div class="list-group">
	    <div class="list-group-item">
	     <!-- Single Market Store ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Single Market Store</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li>Employees and their Roles Management</li>
			 <li>Product Categories Management</li>
			 <li>Products Management</li>
			 <li>Whole-sale Buyers Quotations Management</li>
			 <li>Customers Quotations Management</li>
		   </ul>
		 </div>
		 <!-- Single Market Store ::: End -->
		 <!-- Multiple Market Store ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Multiple Market Store</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li>Multiple Market Stores Management</li>
			 <li>Employees and their Roles Management</li>
			 <li>Product Categories Management</li>
			 <li>Products Management</li>
			 <li>Whole-sale Buyers Quotations Management</li>
			 <li>Customers Quotations Management</li>
		   </ul>
		 </div>
		 <!-- Multiple Market Store ::: End -->
		 <!-- Inventory ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Inventory</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li>Inventory Address</li>
			 <li>Inventory Employee Management and their Roles</li>
			 <li>Products from Store to Inventory</li>
			 <li>Products from Inventory to Whole-sale Buyers</li>
			 <li>Products from Whole-sale Buyers to Inventory</li>
			 <li>Products from Inventory to Customers</li>
		   </ul>
		 </div>
		 <!-- Inventory ::: End -->
		 <!-- Whole-sale Buyers ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Whole-sale Buyers</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li>Whole-sale Buyers Accounts Management</li>
			 <li>Product Orders and Cart Management</li>
			 <li>Request for Product and Price Quotation</li>
		   </ul>
		 </div>
		 <!-- Whole-sale Buyers ::: End -->
		 <!-- Customers ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Customers</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li></li>
		   </ul>
		 </div>
		 <!-- Customers ::: End -->
		 <!-- Self-Delivery Management ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Self-Delivery Management</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li>Employees and their Roles Management</li>
			 <li>Employee Status : ON-DUTY / OFF-DUTY</li>
		   </ul>
		 </div>
		 <!-- Self-Delivery Management ::: End -->
		 <!-- Third-party Delivery Management ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Third-party Delivery Management</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li></li>
		   </ul>
		 </div>
		 <!-- Third-party Delivery Management ::: End -->
		 <!-- Secure Payment Service ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Secure Payment Service</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li><b><i>Whole-sale Buyers pay-to Platform:</i></b><br/> 
			 On Success of Product Transaction / Whole-sale Buyers Satisfaction, platform pay-to Store.
			 On Failure of Product Transaction / Whole-sale Buyers Satisfaction, platform pay-to Whole-sale Buyers</li>
			 <li><b><i>Customers pay-to Platform:</i></b><br/> 
			 On Success of Product Transaction / Customer Satisfaction, platform pay-to Store.
			 On Failure of Product Transaction / Customer Satisfaction, platform pay-to Customers</li>
		   </ul>
		 </div>
		 <!-- Secure Payment Service ::: End -->
		 <!-- General Payment Service ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>General Payment Service</b></div>
		 <div class="mtop15p">
		   <ul>
			 <li></li>
		   </ul>
		 </div>
		 <!-- General Payment Service ::: End -->
	    </div><!--/.list-group-item -->
	  </div><!--/.list-group -->
	  <!-- -->
	</div>
	
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
