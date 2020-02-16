<script type="text/javascript">
var quote_ecom_b2b;
var quote_ecom_b2c;
function setup_process_b2b(){
$('#process_b2b_model01').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2b='process_b2b_model01';
    $('#process_b2b_model02,#process_b2b_model03,#process_b2b_model04').bootstrapToggle('off');
  }
 });
 $('#process_b2b_model02').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2b='process_b2b_model02';
    $('#process_b2b_model01,#process_b2b_model03,#process_b2b_model04').bootstrapToggle('off');
  }
 });
 $('#process_b2b_model03').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2b='process_b2b_model03';
    $('#process_b2b_model01,#process_b2b_model02,#process_b2b_model04').bootstrapToggle('off');
  }
 });
 $('#process_b2b_model04').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2b='process_b2b_model04';
    $('#process_b2b_model01,#process_b2b_model02,#process_b2b_model03').bootstrapToggle('off');
  }
 });
}
function setup_process_b2c(){
 $('#process_b2c_model01').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2c='process_b2c_model01';
    $('#process_b2c_model02,#process_b2c_model03,#process_b2c_model04,#process_b2c_model05,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model02').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2c='process_b2c_model02';
    $('#process_b2c_model01,#process_b2c_model03,#process_b2c_model04,#process_b2c_model05,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model03').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2c='process_b2c_model03';
    $('#process_b2c_model01,#process_b2c_model02,#process_b2c_model04,#process_b2c_model05,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model04').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2c='process_b2c_model04';
    $('#process_b2c_model01,#process_b2c_model02,#process_b2c_model03,#process_b2c_model05,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model05').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2c='process_b2c_model05';
    $('#process_b2c_model01,#process_b2c_model02,#process_b2c_model03,#process_b2c_model04,#process_b2c_model06').bootstrapToggle('off');
  }
 });
 $('#process_b2c_model06').change(function(){
  if($(this).prop('checked')){ quote_ecom_b2c='process_b2c_model06';
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