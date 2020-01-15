<script type="text/javascript">
$(document).ready(function(){
 $('#process_b2b_model01').change(function(){
  if($(this).prop('checked')){ 
    $('#process_b2b_model02,#process_b2b_model03,#process_b2b_model04').bootstrapToggle('off');
    var data = { nodes:[{id: 1, label: 'Single Market Store', color:'#f44336', font:{color:'#fff', size:12}, shape:'box' },
					    {id: 2, label: 'Inventory', color:'#f44336', font:{color:'#fff', size:12}, shape:'box'},
					    {id: 3, label: 'Whole-sale Buyers', color:'#f44336', font:{color:'#fff', size:12}, shape:'box'}],
			 edges:[{from: 1, to: 2, arrows:'to', dashes:true },
					{from: 2, to: 3, arrows:'to', dashes:true}]
			};
    processFlow(data,'processFlow');
  } else { document.getElementById("processFlow").innerHTML=''; }
 });
 $('#process_b2b_model02').change(function(){
  if($(this).prop('checked')){ 
    $('#process_b2b_model01,#process_b2b_model03,#process_b2b_model04').bootstrapToggle('off');
    var data = { nodes:[{id: 1, label: 'Multiple Market Store', color:'#f44336', font:{color:'#fff', size:12}, shape:'box' },
					    {id: 2, label: 'Inventory', color:'#f44336', font:{color:'#fff', size:12}, shape:'box'},
					    {id: 3, label: 'Whole-sale Buyers', color:'#f44336', font:{color:'#fff', size:12}, shape:'box'}],
			 edges:[{from: 1, to: 2, arrows:'to', dashes:true },
					{from: 2, to: 3, arrows:'to', dashes:true}]
			};
    processFlow(data,'processFlow');
  } else { document.getElementById("processFlow").innerHTML=''; }
 });
 $('#process_b2b_model03').change(function(){
  if($(this).prop('checked')){ 
    $('#process_b2b_model01,#process_b2b_model02,#process_b2b_model04').bootstrapToggle('off');
    var data = { nodes:[{id: 1, label: 'Single Market Store', color:'#f44336', font:{color:'#fff', size:12}, shape:'box' },
					    {id: 2, label: 'Whole-sale Buyers', color:'#f44336', font:{color:'#fff', size:12}, shape:'box'}],
			 edges:[{from: 1, to: 2, arrows:'to', dashes:true }]
			};
    processFlow(data,'processFlow');
  } else { document.getElementById("processFlow").innerHTML=''; }
 });
 $('#process_b2b_model04').change(function(){
  if($(this).prop('checked')){ 
    $('#process_b2b_model01,#process_b2b_model02,#process_b2b_model03').bootstrapToggle('off');
    var data = { nodes:[{id: 1, label: 'Multiple Market Store', color:'#f44336', font:{color:'#fff', size:12}, shape:'box' },
					    {id: 2, label: 'Whole-sale Buyers', color:'#f44336', font:{color:'#fff', size:12}, shape:'box'}],
			 edges:[{from: 1, to: 2, arrows:'to', dashes:true }]
			};
    processFlow(data,'processFlow');
  } else { document.getElementById("processFlow").innerHTML=''; }
 });
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
      options.nodes={ configurePhysics: false, allowedToMoveX: false, allowedToMoveY: false };
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
	  <b>Whole-sale Buyers :: Inventory :: Customers</b>
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
	  <b>Whole-sale Buyers :: Customers</b>
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
	  <b>Single Market Store :: Inventory :: Customers</b>
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
	  <b>Single Market Store :: Customers</b>
	</div>
	<!-- Model#4 ::: End -->
	
	<!-- Model#5 ::: Start -->
	<div class="process-bg">
	  <label class="checkbox-inline padLeft40">
	   <input id="process_b2b_model04" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" 
			  data-offstyle="danger" data-toggle="toggle" data-size="mini"
			  onchange=""> <b>Model # 5</b>
	  </label>
	</div><!--/.process-bg -->
			   
	<div class="pad10 fs12">
	  <b>Multiple Market Store :: Inventory :: Customers</b>
	</div>
	<!-- Model#5 ::: End -->
	
	<!-- Model#6 ::: Start -->
	<div class="process-bg">
	  <label class="checkbox-inline padLeft40">
	   <input id="process_b2b_model04" type="checkbox" data-on="Yes" data-off="No" data-onstyle="success" 
			  data-offstyle="danger" data-toggle="toggle" data-size="mini"
			  onchange=""> <b>Model # 6</b>
	  </label>
	</div><!--/.process-bg -->
			   
	<div class="pad10 fs12">
	  <b>Multiple Market Store :: Customers</b>
	</div>
	<!-- Model#6 ::: End -->
	
  </div><!--/.list-group-item -->
</div><!--/.list-group -->