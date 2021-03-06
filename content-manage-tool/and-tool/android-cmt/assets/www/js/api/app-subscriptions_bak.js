var SUBSCRIPTION_BUILDER = {};
var TOTALSUBSCRIPTIONCOUNTER = 0;
function subscribe_domain(domain_Id, subdomain_Id_List){
 console.log("domain_Id: "+domain_Id+" subdomain_Id_List: "+subdomain_Id_List);
 var subdomain_Ids = subdomain_Id_List.split(",");
 console.log("subdomain_Ids: "+subdomain_Ids);
 if($('#domain-subscribe-'+domain_Id).hasClass('fa-star')){
    $('#domain-subscribe-'+domain_Id).removeClass('fa-star');
	$('#domain-subscribe-'+domain_Id).addClass('fa-star-o');
	console.log("Removed Star");
	/* Remove */
	for(var index=0;index<subdomain_Ids.length;index++){
	 $('#subdomain-subscribe-'+subdomain_Ids[index]).removeClass('fa-star');
	 $('#subdomain-subscribe-'+subdomain_Ids[index]).addClass('fa-star-o');
	 delete SUBSCRIPTION_BUILDER[domain_Id+"|"+subdomain_Ids[index]];
	 TOTALSUBSCRIPTIONCOUNTER--;
	}
 } else {
	$('#domain-subscribe-'+domain_Id).addClass('fa-star');
	$('#domain-subscribe-'+domain_Id).removeClass('fa-star-o');
	/* Add */
	for(var index=0;index<subdomain_Ids.length;index++){
	 var subdomain_Id = subdomain_Ids[index];
	 $('#subdomain-subscribe-'+subdomain_Id).addClass('fa-star');
	 $('#subdomain-subscribe-'+subdomain_Id).removeClass('fa-star-o');
	 SUBSCRIPTION_BUILDER[domain_Id+"|"+subdomain_Id] = {"domain_Id":domain_Id,"subdomain_Id":subdomain_Id};
	 TOTALSUBSCRIPTIONCOUNTER++;
	}
	console.log("Add Star");
 }
 console.log(JSON.stringify(SUBSCRIPTION_BUILDER));
 validateAndDisplaySubscribeButton();
 console.log("TOTALSUBSCRIPTIONCOUNTER: "+TOTALSUBSCRIPTIONCOUNTER);
}
function subscribe_subdomain(domain_Id,subdomain_Id){
 if($('#subdomain-subscribe-'+subdomain_Id).hasClass('fa-star')){
    $('#subdomain-subscribe-'+subdomain_Id).removeClass('fa-star');
	$('#subdomain-subscribe-'+subdomain_Id).addClass('fa-star-o');
	console.log("Removed Star");
	delete SUBSCRIPTION_BUILDER[domain_Id+"|"+subdomain_Id];
	TOTALSUBSCRIPTIONCOUNTER--;
 }
 else {
	$('#subdomain-subscribe-'+subdomain_Id).addClass('fa-star');
	$('#subdomain-subscribe-'+subdomain_Id).removeClass('fa-star-o');
	console.log("Add Star");
	SUBSCRIPTION_BUILDER[domain_Id+"|"+subdomain_Id] = {"domain_Id":domain_Id,"subdomain_Id":subdomain_Id};
	TOTALSUBSCRIPTIONCOUNTER++;
 }
 console.log(JSON.stringify(SUBSCRIPTION_BUILDER));
 validateAndDisplaySubscribeButton();
 console.log("TOTALSUBSCRIPTIONCOUNTER: "+TOTALSUBSCRIPTIONCOUNTER);
}
function getListOfCategories(div_Id,user_Id,status){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.subscriptions.php',
 { action: 'GET_SESSION_DOMAINSUBSCRIPTION', user_Id:user_Id, projectURL:PROJECT_URL, usrLang:USR_LANG }, 
  function(response){
   console.log(response);
   var domainResponse=JSON.parse(response);
   var content='<div class="list-group">';
   for(var direct_domain_Id in domainResponse) {
    domainObject=domainResponse[direct_domain_Id];
	if(typeof(domainObject)==='object'){
	 var domain_Id = domainObject["domain_Id"]; 
	 var domainName = domainObject["domainName"];
	 var subdomainResponse = domainObject["subdomainInfo"];
	 var subdomain_Id_List = [];
	 var subscription_count = 0; // false
	 var subdomains_count = 0;
	 
	 if(typeof(subdomainResponse)==='object'){
	   var subcontent='<div id="domain-collapse-'+domain_Id+'" class="collapse">';
	   
	   for(var direct_subdomain_Id in subdomainResponse) {
	    var subdomainObject=subdomainResponse[direct_subdomain_Id];
		console.log("subdomainObject: " +JSON.stringify(subdomainObject));
		if(typeof(subdomainObject)==='object'){
		 var subdomain_Id = subdomainObject["subdomain_Id"]; 
		     subdomain_Id_List[subdomain_Id_List.length] = subdomain_Id;
		 var domain_Id = subdomainObject["domain_Id"]; 
		 var subdomainName = subdomainObject["subdomainName"]; 
		 var subscribed = "NO";
		 if(subdomainObject["subscribed"]!==undefined){ subscribed = subdomainObject["subscribed"]; } 
		 console.log("subdomain_Id: " +subdomain_Id+ " domain_Id: " +domain_Id+" subdomainName: "+subdomainName+" subscribed: "+subscribed);
		 subcontent+='<div class="list-group-item pad0">';
	     subcontent+='<div class="container-fluid pad0">';
	     subcontent+='<div class="col-xs-12 mtop10p mbot10p">';
	     subcontent+='<span><b>&nbsp;'+subdomainName+'</b></span>';
	     subcontent+='<i id="subdomain-subscribe-'+subdomain_Id+'" class="fa ';
		 if(subscribed==='YES'){ subcontent+='fa-star ';
		   SUBSCRIPTION_BUILDER[domain_Id+"|"+subdomain_Id] = {"domain_Id":domain_Id,"subdomain_Id":subdomain_Id};
		   subscription_count++;
		   TOTALSUBSCRIPTIONCOUNTER++;
		 }
		 else { subcontent+='fa-star-o '; }
		 subdomains_count++;
		 subcontent+='mtop5p pull-right" ';
	     subcontent+='aria-hidden="true" ';
		 if(status==='UPDATE'){
		   subcontent+='onclick="javascript:subscribe_subdomain(\''+domain_Id+'\', \''+subdomain_Id+'\');"';
		 }
		 subcontent+=' aria-hidden="true"></i>';
	     subcontent+='</div>';
	     subcontent+='</div>';
	     subcontent+='</div>';
		}
	   }
	   subcontent+='</div>';
	 }
	
	 content+='<div class="list-group-item pad0" style="background-color:#eee;border-bottom:3px solid #ccc;" ';
	 content+='data-toggle="collapse" data-target="#domain-collapse-'+domain_Id+'">';
	 content+='<div class="container-fluid pad0">';
	 content+='<div class="col-xs-12 mtop10p mbot10p">';
	 content+='<span style="color:'+CURRENT_DARK_COLOR+'"><b>&nbsp;'+domainName+' ('+subdomains_count+')'+'</b></span>';
	 content+='<i id="domain-subscribe-'+domain_Id+'" class="fa ';
	 if(subscription_count==subdomains_count && subdomains_count>0){ content+='fa-star'; }
	 else { content+='fa-star-o'; }
	 content+=' mtop5p pull-right" ';
	 if(status==='UPDATE'){
	 content+='onclick="javascript:subscribe_domain(\''+domain_Id+'\', \''+subdomain_Id_List+'\');"';
	 }
	 content+=' aria-hidden="true"></i>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+=subcontent;
	}
   }
   content+='</div>';
   
   content+='<div id="authSubscribeBtn" align="center" class="col-md-12 col-sm-12 col-xs-12 hide-block" ';
   content+='style="margin-bottom:65px;width:100%;height:auto;">';
   content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;" ';
   content+='onclick="javascript:subscribe();"><b>Subscribe</b></button>';
   content+='</div>';
	 
   document.getElementById(div_Id).innerHTML=content;
   validateAndDisplaySubscribeButton();
   console.log(JSON.stringify(SUBSCRIPTION_BUILDER));
 });
}
function validateAndDisplaySubscribeButton(){ // Display Subscription Button
   if(TOTALSUBSCRIPTIONCOUNTER>0){
     console.log("TOTALSUBSCRIPTIONCOUNTER: "+TOTALSUBSCRIPTIONCOUNTER);
     if($('#authSubscribeBtn').hasClass('hide-block')){ $('#authSubscribeBtn').removeClass('hide-block'); }
   } 
   else {
     console.log("TOTALSUBSCRIPTIONCOUNTER: "+TOTALSUBSCRIPTIONCOUNTER);
     if(!$('#authSubscribeBtn').hasClass('hide-block')){ $('#authSubscribeBtn').addClass('hide-block'); }
   }
}
function subscribe(){
 if(Object.keys(SUBSCRIPTION_BUILDER).length>0) {
   show_toggleMLHLoader('body');
   js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.subscriptions.php',
	{ action:'SET_USER_SUBSCRIPTION', user_Id:AUTH_USER_ID, subscriptions:SUBSCRIPTION_BUILDER }, function(response){
	     console.log(response);
		 hide_toggleMLHLoader('body');
		 try {
		    /* Set Session with AUTHENTICATION_STATUS = COMPLETED */
			var sessionJSON='{"session_set":[{"key":"AUTHENTICATION_STATUS","value":"COMPLETED"}],';
				sessionJSON+='"session_get":["AUTHENTICATION_STATUS"]}';
			js_session(sessionJSON,function(response){
			  console.log(response);
			});
			
			if(AndroidSession!==undefined){
		        AndroidSession.setAndroidSession('AUTH_USER_ID',AUTH_USER_ID);
				AndroidSession.setAndroidSession('AUTH_USER_USERNAME',AUTH_USER_USERNAME);
				AndroidSession.setAndroidSession('AUTH_USER_SURNAME',AUTH_USER_SURNAME);
				AndroidSession.setAndroidSession('AUTH_USER_FULLNAME',AUTH_USER_FULLNAME);
				AndroidSession.setAndroidSession('AUTH_USER_CURPHONENUMBER',AUTH_USER_CURPHONENUMBER);
				AndroidSession.setAndroidSession('AUTH_USER_PHONENUMBERS',AUTH_USER_PHONENUMBERS);
				AndroidSession.setAndroidSession('AUTH_USER_GENDER',AUTH_USER_GENDER);
				AndroidSession.setAndroidSession('AUTH_USER_DOB',AUTH_USER_DOB);
				AndroidSession.setAndroidSession('AUTH_USER_COUNTRY',AUTH_USER_COUNTRY);
				AndroidSession.setAndroidSession('AUTH_USER_STATE',AUTH_USER_STATE);
				AndroidSession.setAndroidSession('AUTH_USER_LOCATION',AUTH_USER_LOCATION);
				AndroidSession.setAndroidSession('AUTH_USER_LOCALITY',AUTH_USER_LOCALITY);
				AndroidSession.setAndroidSession('AUTH_USER_PROFILEPIC',AUTH_USER_PROFILEPIC);
				AndroidSession.setAndroidSession('AUTH_USER_TIMEZONE',AUTH_USER_TIMEZONE);
				AndroidSession.setAndroidSession('AUTH_USER_ISADMIN',AUTH_USER_ISADMIN);
				AndroidSession.setAndroidSession('AUTHENTICATION_STATUS','COMPLETED');
			  }
			  if(AndroidNotify!==undefined){
			    AndroidNotify.shutdownNotification_authReminder();
			  }
			  window.location.href=PROJECT_URL+'newsfeed/latest-news';
			} catch(err){ alert("AndroidNotify: "+err); }
			
			
	    }); 
 } else { alert_display_warning('W011'); }
}