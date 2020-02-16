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
  <link rel="stylesheet" href="styles/api/core-skeleton.css"/>
<style>
#processFlow { height:400px; }
.process-bg { background-color:#eee;padding-top:5px;padding-bottom:5px; }
.mtop8p { margin-top:8px; }
</style>
<script type="text/javascript">
var quote_ecom_b2b='<?php echo $_GET["quote_ecom_b2b"] ?>';
var quote_ecom_b2c='<?php echo $_GET["quote_ecom_b2c"] ?>';
$(document).ready(function(){
 generateFlow();
});
/* Constants and Variables ::: Start */
var processFlowIds = { singleMarketStore: { id:1111, nodeName:'singleMarketStore', label:'Single Market Store' }, 
					   multipleMarketStore: { id:1112, nodeName:'multipleMarketStore', label:'Multiple Market Store' }, 
					   inventory: { id:1113, nodeName:'inventory', label:'Inventory' }, 
					   wholeSaleBuyers: { id:1114, nodeName:'wholeSaleBuyers',  label:'Whole-sale Buyers' }, 
					   customers: { id:1115 , nodeName:'customers',  label:'Customers' } };
var processFlowDesc = '';
var ecomFeatureModules = [];
/* Constants and Variables ::: End */

/* Core Function ::: Start */
function createAndConnectNodes(title,arry, nodeData, edgeData){
 processFlowDesc+='<h5><u><b>'+title+':</u></b></h5>';
 processFlowDesc+='<span class="fs12"><b>'
 for(var index=0;index<nodeData.length;index++){
    if(arry.nodes.indexOf(nodeData[index]) === -1){ arry.nodes.push(nodeData[index]); } 
	processFlowDesc+=nodeData[index].label+' :: ';
 }
 processFlowDesc=processFlowDesc.substring(0, processFlowDesc.length - 4);
 processFlowDesc+='</b></span>';
 arry.nodes.map(i=>{ i['color']='#f44336';i['font']={color:'#fff', size:12};i['shape']='box'; });
 for(var index=0;index<edgeData.length;index++){
  if(arry.edges.indexOf(edgeData[index]) === -1){ arry.edges.push({from:edgeData[index].from.id,to:edgeData[index].to.id, arrows:'to', dashes:true}); }
 }
 document.getElementById("processFlowDesc").innerHTML=processFlowDesc;
}
/* Core Function ::: End */

function generateFlow(){
 var data = { nodes:[],edges:[] };
 processFlowDesc='';
 ecomFeatureModules = [];
 var title_b2b='Business 2 Business', title_b2c= 'Business 2 Customer';
 /* Business 2 Business Process ::: Start */
 // quote_ecom_b2b
// quote_ecom_b2c
// , process_b2b_model02, process_b2b_model03, process_b2b_model04
// process_b2c_model01, process_b2c_model02, process_b2c_model03, process_b2c_model04, process_b2c_model05, process_b2c_model06

 if(quote_ecom_b2b==='process_b2b_model01'){ 
   title_b2b+=' (Model#1)';
   createAndConnectNodes(title_b2b, data, [processFlowIds.singleMarketStore, processFlowIds.inventory, processFlowIds.wholeSaleBuyers],
							   [{ from: processFlowIds.singleMarketStore, to: processFlowIds.inventory },
						        { from: processFlowIds.inventory, to: processFlowIds.wholeSaleBuyers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.singleMarketStore.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.singleMarketStore.nodeName+'|'+processFlowIds.wholeSaleBuyers.nodeName, 
		processFlowIds.wholeSaleBuyers.nodeName]);
 } else if(quote_ecom_b2b==='process_b2b_model02'){ 
   title_b2b+=' (Model#2)';
   createAndConnectNodes(title_b2b, data, [processFlowIds.multipleMarketStore, processFlowIds.inventory, processFlowIds.wholeSaleBuyers],
							   [{ from: processFlowIds.multipleMarketStore, to: processFlowIds.inventory },
						        { from: processFlowIds.inventory, to: processFlowIds.wholeSaleBuyers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.multipleMarketStore.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.multipleMarketStore.nodeName+'|'+processFlowIds.wholeSaleBuyers.nodeName, 
		processFlowIds.wholeSaleBuyers.nodeName]);
 } else if(quote_ecom_b2b==='process_b2b_model03'){
   title_b2b+=' (Model#3)';
   createAndConnectNodes(title_b2b, data, [processFlowIds.singleMarketStore, processFlowIds.wholeSaleBuyers],
							   [{ from: processFlowIds.singleMarketStore, to: processFlowIds.wholeSaleBuyers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.singleMarketStore.nodeName,
		processFlowIds.wholeSaleBuyers.nodeName]);
 } else if(quote_ecom_b2b==='process_b2b_model04'){ 
   title_b2b+=' (Model#4)';
   createAndConnectNodes(title_b2b, data, [processFlowIds.multipleMarketStore, processFlowIds.wholeSaleBuyers],
							   [{ from: processFlowIds.multipleMarketStore, to: processFlowIds.wholeSaleBuyers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.multipleMarketStore.nodeName,
		processFlowIds.wholeSaleBuyers.nodeName]);
 }
 /* Business 2 Business Process ::: End */
 /* Business 2 Customer Process ::: Start */
 if(quote_ecom_b2c==='process_b2c_model01'){ 
   title_b2c+=' (Model#1)';
   createAndConnectNodes(title_b2c, data, [processFlowIds.wholeSaleBuyers, processFlowIds.inventory, processFlowIds.customers],
							   [{ from: processFlowIds.wholeSaleBuyers, to: processFlowIds.inventory },
							    { from: processFlowIds.inventory, to: processFlowIds.customers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.wholeSaleBuyers.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.wholeSaleBuyers.nodeName+'|'+processFlowIds.customers.nodeName, 
		processFlowIds.customers.nodeName]);
 } else if(quote_ecom_b2c==='process_b2c_model02'){ 
  title_b2c+=' (Model#2)';
  createAndConnectNodes(title_b2c, data, [processFlowIds.wholeSaleBuyers, processFlowIds.customers],
							   [{ from: processFlowIds.wholeSaleBuyers, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.wholeSaleBuyers.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.wholeSaleBuyers.nodeName+'|'+processFlowIds.customers.nodeName, 
		processFlowIds.customers.nodeName]);
 } else if(quote_ecom_b2c==='process_b2c_model03'){ 
  title_b2c+=' (Model#3)';
  createAndConnectNodes(title_b2c, data, [processFlowIds.singleMarketStore, processFlowIds.inventory, processFlowIds.customers],
							   [{ from: processFlowIds.singleMarketStore, to: processFlowIds.inventory },
							    { from: processFlowIds.inventory, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.singleMarketStore.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.singleMarketStore.nodeName+'|'+processFlowIds.customers.nodeName, 
		processFlowIds.customers.nodeName]);
 } else if(quote_ecom_b2c==='process_b2c_model04'){ 
  title_b2c+=' (Model#4)';
  createAndConnectNodes(title_b2c, data, [processFlowIds.singleMarketStore, processFlowIds.customers],
							   [{ from: processFlowIds.singleMarketStore, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.singleMarketStore.nodeName,
		processFlowIds.customers.nodeName]);
 } else if(quote_ecom_b2c==='process_b2c_model05'){ 
  title_b2c+=' (Model#5)';
  createAndConnectNodes(title_b2c, data, [processFlowIds.multipleMarketStore, processFlowIds.inventory, processFlowIds.customers],
							   [{ from: processFlowIds.multipleMarketStore, to: processFlowIds.inventory },
							    { from: processFlowIds.inventory, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.multipleMarketStore.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.multipleMarketStore.nodeName+'|'+processFlowIds.customers.nodeName, 
		processFlowIds.customers.nodeName]);
 } else if(quote_ecom_b2c==='process_b2c_model06'){
  title_b2c+=' (Model#6)';
  createAndConnectNodes(title_b2c, data, [processFlowIds.multipleMarketStore, processFlowIds.customers],
							   [{ from: processFlowIds.multipleMarketStore, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.multipleMarketStore.nodeName,
		processFlowIds.customers.nodeName]);
 }
 console.log(JSON.stringify(data));
 console.log("ecomFeatureModules: "+ecomFeatureModules);
 processFlow(data,'processFlow');
}
function processFlow(data,display){
  // create an array with nodes
  var nodes = new vis.DataSet(data.nodes);
  // create an array with edges
  var edges = new vis.DataSet(data.edges);
  // create a network
  var container = document.getElementById(display);
  var data = { nodes: nodes, edges: edges };  
  var options = {};
  var network = new vis.Network(container, data, options);
}
</script>
</head>
<body>
 <div class="container-fluid">
  <div class="row">
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
	</div><!--/.col-sm-4 -->
	<div class="col-sm-8">
	  <!-- -->
	  <div align="center"><h5><b>E-Commerce Features Calculator</b></h5></div>
	  <div class="list-group">
	    <div class="list-group-item">
	     <!-- Single Market Store ::: Start -->
		 <!-- -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Single Market Store</b></div>
		 
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Employees and their Roles Management</b></div>
			 <div>
			  <ul>
			   <li>Able to add, view, update and delete Employees</li>
			   <li>Able to add, view, update and delete Roles</li>
			   <li>Able to add, view, update and delete access permissions to the Roles</li>
			  </ul>
			 </div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Product Categories Management</b></div>
			 <div>
		       <ul>
		         <li>Able to view, add, update and delete categories and sub-categories</li>
				 <li>Able to add and remove products to sub-categories</li>
			   </ul>
		     </div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Products Management</b></div>
			 <div>
		       <ul>
		         <li>Able to add, view, update and delete product information available in the Store</li>
				 <li>Able to update product price and discounts to attract Customers</li>
			   </ul>
		     </div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Whole-sale Buyers Quotations Management</b></div>
			 <div>
			  <ul>
			   <li>Whole-sale Buyers able to send Product Quotations to the Store with option of one buying, frequent buying</li>
			   <li>Store can able to set Prices and Discounts and make a deal with whole-sale Buyers</li>
			  </ul>
			 </div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Customers Quotations Management</b></div>
			 <div>
			  <ul>
			   <li>Customers able to send Product Quotations to the Store with option of one buying, frequent buying</li>
			   <li>Store can able to set Prices and Discounts and make a deal with Customers</li>
			  </ul>
			 </div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6"></div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- -->
		 <!-- Single Market Store ::: End -->
		 <!-- Multiple Market Store ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Multiple Market Store</b></div>
		 
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		    <div><b>Multiple Market Stores Management</b></div>
			<div>
			 <ul>
			  <li>Able to add, view, update and delete Store</li>
			 </ul>
			</div>
			<div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Employees and their Roles Management</b></div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Product Categories Management</b></div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Products Management</b></div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Whole-sale Buyers Quotations Management</b></div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		     <div><b>Customers Quotations Management</b></div>
			 <div align="right">
		      <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			  </label>
		     </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- Multiple Market Store ::: End -->
		 <!-- Inventory ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Inventory</b></div>
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Inventory details</b></div>
		   <div>
			 <ul>
			  <li>Able to add, view, update and delete Inventory details</li>
			 </ul>
			</div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 	
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Inventory Employee Management and their Roles</b></div>
		   <div>
		     <ul>
			   <li>Able to add, view, update and delete Employees</li>
			   <li>Able to add, view, update and delete Roles</li>
			   <li>Able to add, view, update and delete access permissions to the Roles</li>
			 </ul>
		   </div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Products from Store to Inventory</b></div>
		   <div>
		     <ul>
			   <li>Able to add, view, update and delete Products received from Store</li>
			 </ul>
		   </div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			</label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Products from Inventory to Whole-sale Buyers</b></div>
		   <div>
		     <ul>
			   <li>Able to add, view, update and delete Products sent to Whole-sale Buyers</li>
			   <li></li>
			 </ul>
		   </div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90">
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Products from Whole-sale Buyers to Inventory</b></div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Products from Inventory to Customers</b></div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- Inventory ::: End -->
		 <!-- Whole-sale Buyers ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Whole-sale Buyers</b></div>
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Whole-sale Buyers Accounts Management</b></div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90">
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Product Orders and Cart Management</b></div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Request for Product and Price Quotation</b></div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- Whole-sale Buyers ::: End -->
		 <!-- Customers ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Customers</b></div>
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- Customers ::: End -->
		 <!-- Self-Delivery Management ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Self-Delivery Management</b></div>
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Employees and their Roles Management</b></div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Employee Status : ON-DUTY / OFF-DUTY</b></div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- Self-Delivery Management ::: End -->
		 <!-- Third-party Delivery Management ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Third-party Delivery Management</b></div>
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- Third-party Delivery Management ::: End -->
		 <!-- Secure Payment Service ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>Secure Payment Service</b></div>
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Whole-sale Buyers pay-to Platform</b></div>
		   <div>
		     <ul>
		     <li>On Success of Product Transaction / Whole-sale Buyers Satisfaction, platform pay-to Store</li>
			 <li>On Failure of Product Transaction / Whole-sale Buyers Satisfaction, platform pay-to Whole-sale Buyers</li>
			 </ul>
		   </div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div class="list-group">
		   <div class="list-group-item">
		   <!-- -->
		   <div><b>Customers pay-to Platform</b></div>
		   <div>
		     <ul>
		     <li>On Success of Product Transaction / Customer Satisfaction, platform pay-to Store</li>
			 <li>On Failure of Product Transaction / Customer Satisfaction, platform pay-to Customers</li>
			 </ul>
		   </div>
		   <div align="right">
		     <label class="checkbox-inline padLeft40">
			   <input id="process_b2b_model01" type="checkbox" data-on="In-Cart" data-off="Add-to-Cart" data-onstyle="success" 
			    data-offstyle="danger" data-toggle="toggle" data-size="mini" data-width="90"> 
			 </label>
		   </div>
		   <!-- -->
		   </div><!--/.list-group -->
		   </div><!--/.list-group-item -->
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <!-- Secure Payment Service ::: End -->
		 <!-- General Payment Service ::: Start -->
		 <div class="process-bg mtopbot5p padLeft10"><b>General Payment Service</b></div>
		 <div class="container-fluid">
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 <div class="row mtop8p">
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 <div class="col-sm-6">
		   <div><b></b></div>
		 </div><!--/.col-sm-6 -->
		 </div><!--/.row -->
		 </div><!--/.container-fluid -->
		 <div class="mtop15p">
		   <ul>
			 <li></li>
		   </ul>
		 </div>
		 <!-- General Payment Service ::: End -->
	    </div><!--/.list-group-item -->
	  </div><!--/.list-group -->
	  <!-- -->
	</div><!--/.col-sm-8 -->
  </div><!--/.row -->
 </div><!--/.container-fluid -->
</body>
</html>
