package anups.and.cmt.br;

import android.app.ActivityManager;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Handler;
import android.os.Looper;
import android.widget.Toast;
import anups.and.cmt.js.AppSessionManagement;
import anups.and.cmt.notify.ws.WSIntervalHour;
import anups.and.cmt.notify.ws.util.Notifications;
import anups.and.cmt.services.BGServiceHour;
import anups.and.cmt.services.BGServiceMinute;
import anups.and.cmt.util.AndroidLogger;
import anups.and.cmt.web.templates.URLGenerator;

public class BRIntervalHour  extends BroadcastReceiver{
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(BRIntervalHour.class);

 
 
 @Override
 public void onReceive(Context context, Intent intent) {
	 logger.info("BRIntervalHour Started...");
    
	  // AlarmOnceTrigger.getInstance(context);
   
   
  
  }
 }
