package anups.and.cmt.services;

import android.annotation.SuppressLint;
import android.app.Service;
import android.content.ComponentName;
import android.content.Context;
import android.content.Intent;
import android.content.ServiceConnection;
import android.os.Binder;
import android.os.IBinder;
import anups.and.cmt.util.AndroidLogger;

@SuppressLint("NewApi")
public class BackgroundService extends Service {

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(BackgroundService.class);
	
	private Binder binder = new LocalBinder();

	BackgroundService myService;
	
	boolean isBound=false; 
	
	private class LocalBinder extends Binder {
	  BackgroundService getService() {
	    return BackgroundService.this;
	  }
	}

	private ServiceConnection MyConnection=new ServiceConnection() {
		@Override
		public void onServiceConnected(ComponentName name, IBinder service) {
		 BackgroundService.LocalBinder binder=(BackgroundService.LocalBinder)service;
	      myService=binder.getService();
		  isBound=true;
		}

		@Override
		public void onServiceDisconnected(ComponentName name) {
		  isBound=false;
		}
	};
	
	@Override
	public void onCreate() {
	  /* Write My Service logic here */
	}
	
	@Override
	public void onDestroy() {
	  bindService(new Intent(this, BackgroundService.class),MyConnection,Context.BIND_AUTO_CREATE); 
	}
	
	@Override
    public int onStartCommand(Intent intent, int flags, int startId) {
		logger.info("onStartCommand: ");
		logger.info("intent: "+intent+"  flags: "+flags+"  startId: "+startId);
		return START_STICKY;
	}
	
	@Override
	public IBinder onBind(Intent intent) {
		return binder;
	}
	
	@Override
	public void onTaskRemoved(Intent rootIntent) {
		super.onTaskRemoved(rootIntent);
		logger.info("onTaskRemoved: ");
		logger.info("rootIntent: "+rootIntent);
	}

}