package anups.and.cmt.br;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.and.cmt.services.BackgroundService;
import anups.and.cmt.util.AndroidLogger;

public class OnBootBroadcastReceiver extends BroadcastReceiver {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(OnBootBroadcastReceiver.class);
	
	@Override
	public void onReceive(Context context, Intent intent) {
		logger.info("onReceive OnBootBroadcastReceiver");
		// Starts Running a Background-Service
		try {
		  context.startService(new Intent(context, BackgroundService.class)); 
		} catch(Exception e){ logger.info("Error: "+e.getMessage()); }
	}

}
