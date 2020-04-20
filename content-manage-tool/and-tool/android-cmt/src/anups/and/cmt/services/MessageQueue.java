package anups.and.cmt.services;

import android.annotation.SuppressLint;
import android.app.Service;
import android.content.Intent;
import android.os.IBinder;

@SuppressLint("NewApi")
public class MessageQueue extends Service {

	@Override
    public int onStartCommand(Intent intent, int flags, int startId) {
		return 0;
	}
	
	@Override
	public IBinder onBind(Intent intent) {
		return null;
	}
	
	@Override
	public void onTaskRemoved(Intent rootIntent) {
		super.onTaskRemoved(rootIntent);
	}

}
