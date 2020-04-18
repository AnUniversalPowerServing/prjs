var AUTH_REG_ENDPOINT='backend/php/dac/controller.accounts.user.auth.php';

class AuthEndpoints {
  userAccounts_viewInfo_securityQ(respFunc){
    js_ajax('GET',AUTH_REG_ENDPOINT,{ action:'USER_AUTH_SECURITYQ' },function(response){
	 console.log(response);respFunc(response);
	});
  }
  userAccounts_autocomplete_surNames(respFunc){
   js_ajax('GET',AUTH_REG_ENDPOINT,{ action:'USER_AUTH_SURNAMES' },
   function(response){ console.log(response);respFunc(response); });
  }
  userAccounts_verify_mobileNumber(mobile,respFunc){
   js_ajax('GET',AUTH_REG_ENDPOINT,{ action:'USER_AUTH_VERIFYMOBILE', mobile:mobile },
   function(response){ console.log(response);respFunc(response); });
  }
  userAccounts_create_newAccount(inputData,respFunc){
   inputData.action='USER_AUTH_ADDNEWACCOUNT';
   js_ajax('POST',AUTH_REG_ENDPOINT,inputData,function(response){ console.log(response);respFunc(response); });
  }
  userAccounts_viewInfo_byMobileNumber(mobile,respFunc){
   js_ajax('GET',AUTH_REG_ENDPOINT,{ action:'USER_AUTH_BYMOBILE', mobile:mobile }, 
   function(response){ console.log(response);respFunc(response); });
  }
  userAccounts_updateInfo_accountById(updateData,respFunc){
   updateData.action='USER_AUTH_UPDATEACCOUNTINFO';
   js_ajax('POST',AUTH_REG_ENDPOINT,updateData,function(response){ console.log(response);respFunc(response); });
  }
  userAccounts_viewInfo_accountLogin(inputData,respFunc){
   inputData.action='USER_AUTH_LOGIN';
   js_ajax('POST',AUTH_REG_ENDPOINT,inputData,function(response){ console.log(response);respFunc(response); });
  }
}

var SESSION_ENDPOINT='backend/php/api/app.session.php';
class Session {
	set(data){
	  js_ajax('POST',SESSION_ENDPOINT,{ action:'SET_SESSION',sessionJson:data },function(response){ console.log(response); });
	}
	get(data,respFunc){
	  js_ajax('POST',SESSION_ENDPOINT,{ action:'GET_SESSION',sessionJson:data },function(response){ console.log(response); });
	}
	destroy(){
	  js_ajax('POST',SESSION_ENDPOINT,{action:'DestroySession'},function(response){ console.log(response); });
	}
}

var authEndpoints = new AuthEndpoints();
var session = new Session();