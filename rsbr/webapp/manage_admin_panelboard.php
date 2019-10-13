<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Success Book of Records</title>
  <?php include_once 'templates/api-params.php'; ?>
  
</head>
<body>
<style>
html { overflow-x:hidden;overflow-y:scroll; }
.heading { font-family:longdoosi-regular;font-size:28px;color:#fff; }
</style>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
<style>
.bb1grey { border-bottom:1px solid #ddd; }

.page-header-bg { background-color:dodgerBlue;color:#fff; }
.hide-block { display:none; }

/* Panel-Board Images */
.panel-board-user { border:0px; }
.panel-board-img { width:150px;height:150px;background-color:#ccc;border-radius:50%; }

.panel-bg-colorsuit { width:50px;height:50px;border-radius:50%; }
.panel-bg-colorsuit-selected { width:30px;height:30px;margin:10px; }

.bg-red { background-color:#f44336;color:#fff; }
.bg-pink { background-color:#e91e63;color:#fff; }
.bg-dodgerBlue { background-color:dodgerBlue;color:#fff; }
.bg-tomato { background-color:tomato;color:#fff; }
.bg-orange { background-color:orange;color:#fff; }
.bg-mediumSeaGreen { background-color:MediumSeaGreen;color:#fff; }
.bg-gray { background-color:gray;color:#fff; }
.bg-slateBlue { background-color:SlateBlue;color:#fff; }
.bg-parrotGreen { background-color:#8bc34a;color:#fff; }


</style>
<script type="text/javascript">
var user = '<?php echo $_GET["user"]; ?>';
var ADD_PB_CSS;
function sel_panel_bgcolor(sel_Id,css){
 var ids=["add_pb_bgred","add_pb_bgpink","add_pb_bgdodgerblue","add_pb_bgtomato","add_pb_bgorange",
 "add_pb_bgmediumseagreen","add_pb_bggray","add_pb_bgslateblue","add_pb_bgparrotgreen"];
 ADD_PB_CSS=css;
 for(var index=0;index<ids.length;index++){
   if(sel_Id===ids[index]){
     if($('#'+ids[index]).hasClass('hide-block')){ $('#'+ids[index]).removeClass('hide-block'); }
   } else { $('#'+ids[index]).addClass('hide-block'); }
 }
}

      
				         
function add_panel_members(){
var add_pb_name = document.getElementById("add_pb_name").value;
var add_pb_role = document.getElementById("add_pb_role").value;
var add_pb_desc = document.getElementById("add_pb_desc").value;
if(FILENAME!==undefined){
if(add_pb_name.length>0){
if(add_pb_role.length>0){
if(add_pb_desc.length>0){
if(ADD_PB_CSS!==undefined){
  console.log("FILENAME: "+FILENAME);
  console.log("add_pb_name: "+add_pb_name);
  console.log("add_pb_role: "+add_pb_role);
  console.log("add_pb_desc: "+add_pb_desc);
  console.log("ADD_PB_CSS: "+ADD_PB_CSS);
  
  $('#addNewPanelMembersModal').modal("hide");
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.panel.board.members.php',
  { action:'ADD_PANEL_MEMBERS', profile_pic:FILENAME, name:add_pb_name, 
  role:add_pb_role, description:add_pb_desc, bgcss:ADD_PB_CSS },function(response){
    console.log(response);
	view_panel_members();
  });
  
} else { div_display_warning('add_pb_alert','W005'); }
} else { div_display_warning('add_pb_alert','W004'); }
} else { div_display_warning('add_pb_alert','W003'); }
} else { div_display_warning('add_pb_alert','W002'); }
} else { div_display_warning('add_pb_alert','W001'); }
}

function view_panel_members(){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.panel.board.members.php',
  { action:'VIEW_PANEL_MEMBERS' },function(response){
    console.log(response);
	response=JSON.parse(response);
	
	var content='';
	for(var index=0;index<response.length;index++){
	
	 var member_Id=response[index].member_Id;
	 var profile_pic = response[index].profile_pic;
	 var name = response[index].name;
	 var role = response[index].role;
	 var description = response[index].description;
	 var bgcss = response[index].bgcss;
		content+='<div align="center" class="col-xs-12 col-md-3 col-sm-3">';
		content+='<div class="list-group panel-board-user">';
		content+='<div class="list-group-item '+bgcss+'">';
		content+='<img src="'+profile_pic+'" class="panel-board-img"/>';
		content+='<div align="center" class="font-white">';
		content+='<h5 style="line-height:26px;text-transform:uppercase;letter-spacing:1px;">';
		content+='<b>'+name+'</b></h5>';
		content+='</div>';
		content+='</div>';
		content+='<div class="list-group-item '+bgcss+'">';
		content+='<div align="center" class="font-white">';
		content+='<b>'+role+'</b>';
		content+='</div>';
		content+='</div>';
		content+='<div class="list-group-item '+bgcss+'">';
		content+='<div align="justify" class="font-white">'+description+'</div>';
		if(user==='N'){
		content+='<div align="center" class="mtop15p">';
		content+='<button class="btn btn-default" ';
		content+='onclick="javascript:delete_panel_member_confirm(\''+member_Id+'\');"><b>Delete</b></button>';
		content+='</div>';
		}
		content+='</div>';
		
		
		content+='</div>';
		content+='</div>';
	}
	document.getElementById("rsbr_view_panelMemberslist").innerHTML=content;
		
  });
}
function delete_panel_member(member_Id){
  
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.panel.board.members.php',
  { action:'DELETE_PANEL_MEMBERS', member_Id:member_Id },function(response){
   console.log(response);
   view_panel_members();
   $('#deletePanelMemberConfirm').modal('hide');
  });
}

function delete_panel_member_confirm(member_Id){
var content='<div class="modal-dialog">';
    content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
	content+='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>';
    content+='<div><strong>Are you sure to delete Panel Board Member?</strong></div>';
	content+='<div align="right">';
	content+='<div class="btn-group">';
	content+='<button class="btn btn-danger" ';
	content+='onclick="javascript:delete_panel_member(\''+member_Id+'\');"><b>Yes</b></button>';
	content+='<button class="btn btn-success" ';
	content+='onclick="javascript:$(\'#deletePanelMemberConfirm\').modal(\'hide\');"><b>No</b></button>';
	content+='</div>';
	content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
 document.getElementById("deletePanelMemberConfirm").innerHTML=content;
 $('#deletePanelMemberConfirm').modal();
}
$(document).ready(function(){
 view_panel_members();
});
</script>
<div id="deletePanelMemberConfirm" class="modal fade" role="dialog"></div>
	<div id="page-content-wrapper">
	   <?php include_once 'templates/top-header.php';?>
	   
	   <div class="container-fluid" style="background-color:#4caf50;">
	    <div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <span class="heading">Manage Panel Board Members</span>
		 </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		</div>
	   </div>
	   
	   <div class="container-fluid" style="background-color:#59c75e;">
	    <!--/.row -->
		<div class="row mtop50p mbot50p">
		 <div align="center" class="col-md-4 col-sm-4 col-xs-12 mbot15p">
		  <img src="http://www.safetytechnology.co.uk/wp-content/uploads/2019/01/o-SKYDIVER-facebook.jpg"
		   style="width:300px;height:230px;border:2px solid #fff;"/>
		 </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		 <div class="col-md-8 col-sm-8 col-xs-12 mtop15p">
		   <div style="font-family:longdoosi-regular;font-size:28px;color:#fff;">We are</div>
		   <div style="font-family:longdoosi-regular;font-size:28px;color:#fff;margin-top:15px;">
			Our boards and panels are comprised of a groupwho play a 
			key role in delivering  objectives across the portfolio.  The boards hold their own budgets and review 
			and manage activity within their specialist areas.
		   </div>
		 </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
		</div>
	   </div>


	   
<!-- Modal ::: Start -->
<div id="addNewPanelMembersModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Add New Panel Member</b></h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<!-- -->
				<div class="container-fluid">
				<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12">
			    <!-- -->
				<div id="add_pb_alert" class="form-group">
				
				</div>
<script type="text/javascript">
function uploadPanelBoardForm(){ 
 pictureUpload('add_pb_profilepic',{ folderName: 'panelBoard' },
 function(){ return true; },
 function(){ });
}
</script> 					
				<div class="form-group">
				 <div align="center">

				   <form name="fileuploadForm" id="fileuploadForm" action="#" method="POST" enctype="multipart/form-data">
					  <input type="file" name="uploadpic" id="uploadpic" accept="image/*"  
				      onchange="javascript:uploadPanelBoardForm();" style="visibility:hidden;"/>
					  <img id="add_pb_profilepic" src="images/profile-pic.jpg" class="panel-board-img" 
					  onclick="javascript:pictureUploadClick();"/>
					</form>
				 
				 </div>
				</div>
				
				<div class="form-group">
				  <label>Member Name</label>
				  <input type="text" id="add_pb_name" class="form-control" placeholder="Enter Member Name"/>
				</div>
				
				<div class="form-group">
				  <label>Member Role</label>
				  <input type="text"  id="add_pb_role" class="form-control" placeholder="Enter Member Role"/>
				</div>
				
				<div class="form-group">
				  <label>Description</label>
				  <textarea class="form-control"  id="add_pb_desc" placeholder="Mention Briefly about Member"></textarea>
				</div>
				
				<div class="form-group">
				  <label>Choose Background Color</label>
				  <div>
				   <!-- -->

                   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-red" onclick="javascript:sel_panel_bgcolor('add_pb_bgred','bg-red');">
				       <img id="add_pb_bgred" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   
				   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-pink" onclick="javascript:sel_panel_bgcolor('add_pb_bgpink','bg-pink');">
				        <img id="add_pb_bgpink" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   
				   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-dodgerBlue" onclick="javascript:sel_panel_bgcolor('add_pb_bgdodgerblue','bg-dodgerBlue');">
				       <img id="add_pb_bgdodgerblue" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   
				   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-tomato" onclick="javascript:sel_panel_bgcolor('add_pb_bgtomato','bg-tomato');">
				       <img id="add_pb_bgtomato" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   
				   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-orange" onclick="javascript:sel_panel_bgcolor('add_pb_bgorange','bg-orange');">
				       <img id="add_pb_bgorange" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   
				   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-mediumSeaGreen" onclick="javascript:sel_panel_bgcolor('add_pb_bgmediumseagreen','bg-mediumSeaGreen');">
				       <img id="add_pb_bgmediumseagreen" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   
				   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-gray" onclick="javascript:sel_panel_bgcolor('add_pb_bggray','bg-gray');">
				        <img id="add_pb_bggray" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   
				   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-slateBlue" onclick="javascript:sel_panel_bgcolor('add_pb_bgslateblue','bg-slateBlue');">
				       <img id="add_pb_bgslateblue" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   
				   <div class="col-xs-4 col-md-2 col-sm-2 mtop15p">
				     <div class="panel-bg-colorsuit bg-parrotGreen" onclick="javascript:sel_panel_bgcolor('add_pb_bgparrotgreen','bg-parrotGreen');">
				       <img id="add_pb_bgparrotgreen" class="panel-bg-colorsuit-selected hide-block" src="images/selected.png"/>
				     </div>
				   </div>
				   <!-- -->
				  </div>
				</div>
				
				<div class="form-group">
				 <!-- -->
				 <button class="btn btn-primary mtop15p form-control" onclick="javascript:add_panel_members();"><b>Add Member</b></button>
				 <!-- -->
				</div>
				
				<!-- -->
				</div><!--/.col-xs-12 col-md-12 col-sm-12 -->
				</div><!--/.row -->
				</div><!--/.container-fluid -->
				<!-- -->
		<!-- -->
      </div>
    </div>

  </div>
</div>   
<!-- Modal ::: End -->

	   <div class="container-fluid mtop15p">
	    
	    <div class="row">
		  <!-- Panel Board List ::: Start -->
		  <div align="center" class="col-xs-12 col-md-12 col-sm-12">
		   <div>
		     <h4 style="font-family:longdoosi-regular;font-size:28px;">Our Panel Board List</h4>
		   </div>
		   <?php if(isset($_GET["user"]) && $_GET["user"]=='N'){ ?>
		   <div align="right">
		     <button class="btn btn-default" data-toggle="modal" data-target="#addNewPanelMembersModal" data-backdrop="static"><b>Add New Panel Member</b></button>
		   </div>
		   <?php } ?>
		   <div id="rsbr_view_panelMemberslist">
		       
		   
		   </div>
		   
		  </div><!--/.col-xs-12 col-md-12 col-sm-12 -->
		  <!-- Panel Board List ::: End -->

		</div><!--/.row -->
		
	   </div><!--/.container-fluid -->
	   
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
	
</div>
</body>
</html>