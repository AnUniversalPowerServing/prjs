package anups.and.cmt.br;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.and.cmt.constants.BusinessConstants;
import anups.and.cmt.js.AppSessionManagement;
import anups.and.cmt.notify.ws.WSIntervalMinute;
import anups.and.cmt.util.AndroidLogger;
import anups.and.cmt.util.GPSTracker;
import anups.and.cmt.web.templates.URLGenerator;

public class BRIntervalMinute extends BroadcastReceiver {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(BRIntervalMinute.class);
	
 @Override
 public void onReceive(Context context, Intent intent) {
	 logger.info("Triggered BRIntervalMinute...");
	 
 }

 
}
