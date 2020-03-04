var AUTH_REG_ENDPOINT='backend/php/dac/controller.accounts.user.auth.php';

class AuthEndpoints {
  userAccounts_autocomplete_surNames(respFunc){
   js_ajax('GET',AUTH_REG_ENDPOINT,{ action:'USER_AUTH_SURNAMES' },
    function(response){ console.log(response);respFunc(); });
  }
  userAccounts_verify_mobileNumber(mobile,respFunc){
   js_ajax('GET',AUTH_REG_ENDPOINT,{ action:'USER_AUTH_VERIFYMOBILE', mobile:mobile },
   function(response){ console.log(response);respFunc(); });
  }
  userAccounts_create_newAccount(inputData,respFunc){
   inputData.action='USER_AUTH_ADDNEWACCOUNT';
   js_ajax('POST',AUTH_REG_ENDPOINT,inputData,function(response){ console.log(response);respFunc(); });
  }
  userAccounts_viewInfo_byMobileNumber(mobile,respFunc){
   js_ajax('GET','backend/php/dac/controller.accounts.user.auth.php',{ action:'USER_AUTH_LOGIN', mobile:mobile }, 
   function(response){ console.log(response);respFunc(); });
  }
}

var authEndpoints = new AuthEndpoints();