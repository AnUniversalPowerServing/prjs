function js_ajax(method,url,data,fn_output){
 $.ajax({type: method, url: url,data:data, success: function(response) { fn_output(response); } }); 
}
function js_show(mode,div_Id){
 if($('#'+div_Id).hasClass('hide-block') && mode==='show'){ $('#'+div_Id).removeClass('hide-block'); }
 if(!$('#'+div_Id).hasClass('hide-block') && mode==='hide'){ $('#'+div_Id).addClass('hide-block'); }
}