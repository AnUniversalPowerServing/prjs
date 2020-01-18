<script type="text/javascript">
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
 if($('#process_b2b_model01').prop('checked')){ 
   createAndConnectNodes(title_b2b, data, [processFlowIds.singleMarketStore, processFlowIds.inventory, processFlowIds.wholeSaleBuyers],
							   [{ from: processFlowIds.singleMarketStore, to: processFlowIds.inventory },
						        { from: processFlowIds.inventory, to: processFlowIds.wholeSaleBuyers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.singleMarketStore.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.singleMarketStore.nodeName+'|'+processFlowIds.wholeSaleBuyers.nodeName, 
		processFlowIds.wholeSaleBuyers.nodeName]);
 }
 if($('#process_b2b_model02').prop('checked')){ 
   createAndConnectNodes(title_b2b, data, [processFlowIds.multipleMarketStore, processFlowIds.inventory, processFlowIds.wholeSaleBuyers],
							   [{ from: processFlowIds.multipleMarketStore, to: processFlowIds.inventory },
						        { from: processFlowIds.inventory, to: processFlowIds.wholeSaleBuyers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.multipleMarketStore.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.multipleMarketStore.nodeName+'|'+processFlowIds.wholeSaleBuyers.nodeName, 
		processFlowIds.wholeSaleBuyers.nodeName]);
 }
 if($('#process_b2b_model03').prop('checked')){
   createAndConnectNodes(title_b2b, data, [processFlowIds.singleMarketStore, processFlowIds.wholeSaleBuyers],
							   [{ from: processFlowIds.singleMarketStore, to: processFlowIds.wholeSaleBuyers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.singleMarketStore.nodeName,
		processFlowIds.wholeSaleBuyers.nodeName]);
 }
 if($('#process_b2b_model04').prop('checked')){ 
   createAndConnectNodes(title_b2b, data, [processFlowIds.multipleMarketStore, processFlowIds.wholeSaleBuyers],
							   [{ from: processFlowIds.multipleMarketStore, to: processFlowIds.wholeSaleBuyers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.multipleMarketStore.nodeName,
		processFlowIds.wholeSaleBuyers.nodeName]);
 }
 /* Business 2 Business Process ::: End */
 /* Business 2 Customer Process ::: Start */
 if($('#process_b2c_model01').prop('checked')){ 
   createAndConnectNodes(title_b2c, data, [processFlowIds.wholeSaleBuyers, processFlowIds.inventory, processFlowIds.customers],
							   [{ from: processFlowIds.wholeSaleBuyers, to: processFlowIds.inventory },
							    { from: processFlowIds.inventory, to: processFlowIds.customers }]);
   coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.wholeSaleBuyers.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.wholeSaleBuyers.nodeName+'|'+processFlowIds.customers.nodeName, 
		processFlowIds.customers.nodeName]);
 }
 if($('#process_b2c_model02').prop('checked')){ 
  createAndConnectNodes(title_b2c, data, [processFlowIds.wholeSaleBuyers, processFlowIds.customers],
							   [{ from: processFlowIds.wholeSaleBuyers, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.wholeSaleBuyers.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.wholeSaleBuyers.nodeName+'|'+processFlowIds.customers.nodeName, 
		processFlowIds.customers.nodeName]);
 }
 if($('#process_b2c_model03').prop('checked')){ 
  createAndConnectNodes(title_b2c, data, [processFlowIds.singleMarketStore, processFlowIds.inventory, processFlowIds.customers],
							   [{ from: processFlowIds.singleMarketStore, to: processFlowIds.inventory },
							    { from: processFlowIds.inventory, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.singleMarketStore.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.singleMarketStore.nodeName+'|'+processFlowIds.customers.nodeName, 
		processFlowIds.customers.nodeName]);
 }
 if($('#process_b2c_model04').prop('checked')){ 
  createAndConnectNodes(title_b2c, data, [processFlowIds.singleMarketStore, processFlowIds.customers],
							   [{ from: processFlowIds.singleMarketStore, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.singleMarketStore.nodeName,
		processFlowIds.customers.nodeName]);
 }
 if($('#process_b2c_model05').prop('checked')){ 
  createAndConnectNodes(title_b2c, data, [processFlowIds.multipleMarketStore, processFlowIds.inventory, processFlowIds.customers],
							   [{ from: processFlowIds.multipleMarketStore, to: processFlowIds.inventory },
							    { from: processFlowIds.inventory, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.multipleMarketStore.nodeName,
		processFlowIds.inventory.nodeName+':'+processFlowIds.multipleMarketStore.nodeName+'|'+processFlowIds.customers.nodeName, 
		processFlowIds.customers.nodeName]);
 }
 if($('#process_b2c_model06').prop('checked')){ 
  createAndConnectNodes(title_b2c, data, [processFlowIds.multipleMarketStore, processFlowIds.customers],
							   [{ from: processFlowIds.multipleMarketStore, to: processFlowIds.customers }]);
  coreArray.uniqueDataStorage(ecomFeatureModules,[processFlowIds.multipleMarketStore.nodeName,
		processFlowIds.customers.nodeName]);
 }
 console.log(JSON.stringify(data));
 console.log("ecomFeatureModules: "+ecomFeatureModules);
 processFlow(data,'processFlow');
}
function setup_process_b2b(){
$('#process_b2b_model01').change(function(){
  if($(this).prop('checked')){
    $('#process_b2b_model02,#process_b2b_model03,#process_b2b_model04').bootstrapToggle('off');
  }
 });
 $('#process_b2b_model02').change(function(){
  if($(this).prop('checked')){ 
    $('#process_b2b_model01,#process_b2b_model03,#process_b2b_model04').bootstrapToggle('off');
  }
 });
 $('#process_b2b_model03').change(function(){
  if($(this).prop('checked')){ 
    $('#process_b2b_model01,#process_b2b_model02,#process_b2b_model04').bootstrapToggle('off');
  }
 });
 $('#process_b2b_model04').change(function(){
  if($(this).prop('checked')){ 
    $('#process_b2b_model01,#process_b2b_model02,#process_b2b_model03').bootstrapToggle('off');
  }
 });
}
function setup_process_b2c(){
 $('#process_b2c_model01').change(function(){
  if($(this).prop('checked')){
    $('#process_b2c_model02,#process_b2c_model03,#process_b2c_model04,#process_b2c_model05,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model02').change(function(){
  if($(this).prop('checked')){
    $('#process_b2c_model01,#process_b2c_model03,#process_b2c_model04,#process_b2c_model05,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model03').change(function(){
  if($(this).prop('checked')){
    $('#process_b2c_model01,#process_b2c_model02,#process_b2c_model04,#process_b2c_model05,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model04').change(function(){
  if($(this).prop('checked')){
    $('#process_b2c_model01,#process_b2c_model02,#process_b2c_model03,#process_b2c_model05,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model05').change(function(){
  if($(this).prop('checked')){
    $('#process_b2c_model01,#process_b2c_model02,#process_b2c_model03,#process_b2c_model04,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model06').change(function(){
  if($(this).prop('checked')){
    $('#process_b2c_model01,#process_b2c_model02,#process_b2c_model03,#process_b2c_model04,#process_b2c_model05').bootstrapToggle('off');
  }
 });
}
function display_menu_list(id){ 
 var ids = ['process_b2b_options','process_b2c_options','process_c2c_options','process_other_features'];
 for(var index=0;index<ids.length;index++){
    if(ids[index]===id){ $('#'+ids[index]).collapse("show"); }
	else { $('#'+ids[index]).collapse("hide"); }	
 }
}

$(document).ready(function(){
  setup_process_b2b();
  setup_process_b2c();
});  
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
<div class="list-group mbot0p">
  <div class="list-group-item pad0">
	<!-- Model#1 ::: Start -->
	<div class="process-bg">
	  <label class="checkbox-inline padLeft40">
	   <input id="process_b2b_model01" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" 
			  data-offstyle="danger" data-toggle="toggle" data-size="mini"
			  onchange=""> <b>Model # 1</b>
	  </label>
	</div><!--/.process-bg -->
			   
	<div class="pad10 fs12">
	  <b>Single Market Store :: Inventory :: Whole-sale Buyers</b>
	</div>
	<!-- Model#1 ::: End -->
	
	<!-- Model#2 ::: Start -->
	<div class="process-bg">
	  <label class="checkbox-inline padLeft40">
	   <input id="process_b2b_model02" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" 
			  data-offstyle="danger" data-toggle="toggle" data-size="mini"
			  onchange=""> <b>Model # 2</b>
	  </label>
	</div><!--/.process-bg -->
			   
	<div class="pad10 fs12">
	  <b>Multiple Market Store :: Inventory :: Whole-sale Buyers</b>
	</div>
	<!-- Model#2 ::: End -->
	
	<!-- Model#3 ::: Start -->
	<div class="process-bg">
	  <label class="checkbox-inline padLeft40">
	   <input id="process_b2b_model03" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" 
			  data-offstyle="danger" data-toggle="toggle" data-size="mini"
			  onchange=""> <b>Model # 3</b>
	  </label>
	</div><!--/.process-bg -->
			   
	<div class="pad10 fs12">
	  <b>Single Market Store :: Whole-sale Buyers</b>
	</div>
	<!-- Model#3 ::: End -->
	
	<!-- Model#4 ::: Start -->
	<div class="process-bg">
	  <label class="checkbox-inline padLeft40">
	   <input id="process_b2b_model04" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" 
			  data-offstyle="danger" data-toggle="toggle" data-size="mini"
			  onchange=""> <b>Model # 4</b>
	  </label>
	</div><!--/.process-bg -->
			   
	<div class="pad10 fs12">
	  <b>Multiple Market Store :: Whole-sale Buyers</b>
	</div>
	<!-- Model#4 ::: End -->
	
  </div><!--/.list-group-item -->
</div><!--/.list-group -->