package anups.and.cmt.notify.ws;

import android.app.ActivityManager;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import anups.and.cmt.notify.ws.response.WSRIntervalHour;
import anups.and.cmt.notify.ws.util.WSUtility;
import anups.and.cmt.services.BGServiceMinute;
import anups.and.cmt.services.StartupService;
import anups.and.cmt.util.AndroidLogger;

public class WSIntervalHour extends AsyncTask<String, String, String>{
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSIntervalHour.class);
  private Context context;
  
  public WSIntervalHour(Context context){ this.context=context; }
  
  @Override
  protected String doInBackground(String... params) {
	 WSUtility wsUtility = new WSUtility();
	 return wsUtility.HttpURLGETResponse(params[0]);
  }


  @Override  
  protected void onPostExecute(String response) {
	WSRIntervalHour wsrIntervalHour = new WSRIntervalHour(context,response);
	wsrIntervalHour.funcTrigger_playStoreAppVersion();
  }
 
}
