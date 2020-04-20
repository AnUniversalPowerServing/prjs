package anups.and.cmt.notify.ws.response;

import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import android.content.Context;
import anups.and.cmt.constants.BusinessConstants;
import anups.and.cmt.js.AppManagement;
import anups.and.cmt.js.AppSessionManagement;
import anups.and.cmt.notify.ws.util.Notifications;
import anups.and.cmt.util.AndroidLogger;
import anups.and.cmt.util.PushNotification;

public class WSRIntervalHour {
/*
 Response: 
 { "playStoreAppVersion" :"<playStoreAppVersion>" }
 */
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSRIntervalHour.class);
 private Context context;
 private String response;
	
 public WSRIntervalHour(Context context,String response){
  this.context=context;
  this.response=response;
 }
 
 public void funcTrigger_playStoreAppVersion(){
  JSONParser jsonParser = new JSONParser();
  try {
    JSONObject jsonObject = (JSONObject)jsonParser.parse(response.toString());
    String playStoreAppVersion=(String) jsonObject.get("playStoreAppVersion");
    String status=new AppManagement(context).checkPlayStoreUpdate(playStoreAppVersion);
    if(status.equalsIgnoreCase("APP_TO_UPDATE")){  
    	new Notifications(context).notify_show_versionStatus();
    }
  } 
  catch(Exception e){ logger.error("Exception funcTrigger_playStoreAppVersion: "+e.getMessage()); }
 }
 
}


