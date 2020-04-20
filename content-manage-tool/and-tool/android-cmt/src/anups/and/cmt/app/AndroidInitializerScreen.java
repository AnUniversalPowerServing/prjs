package anups.and.cmt.app;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.webkit.WebSettings;
import android.webkit.WebView;
import anups.and.cmt.constants.BusinessConstants;
import anups.and.cmt.js.AppManagement;
import anups.and.cmt.js.AppNotifyManagement;
import anups.and.cmt.js.AppSQLiteManagement;
import anups.and.cmt.js.AppSessionManagement;
import anups.and.cmt.util.AndroidLogger;
import anups.and.cmt.util.NetworkUtility;
import anups.and.cmt.app.R;
import anups.and.cmt.br.OnBootBroadcastReceiver;

@SuppressLint({ "NewApi", "SetJavaScriptEnabled" })
public class AndroidInitializerScreen extends Activity {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidInitializerScreen.class);
	public WebView webView;
    public WebSettings webSettings;

    @SuppressLint("SetJavaScriptEnabled")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
    	logger.info("onCreate AndroidInitializerScreen");
    	super.onCreate(savedInstanceState);
    	requestWindowFeature(Window.FEATURE_NO_TITLE);
    	setTitle(R.string.app_name);
    	setContentView(R.layout.activity_androidinitializer);
    	
        sendBroadcast(new Intent().setClass(this, OnBootBroadcastReceiver.class));
    }

    @Override
    public void onStart(){
    	logger.info("onStart AndroidInitializerScreen");
    	super.onStart();
    	
    	// initializer();
    }
    
    @Override
    public void onStop(){
    	logger.info("onStop AndroidInitializerScreen");
    	super.onStop();
    }
    
    @Override
    public void onPause(){
    	logger.info("onPause AndroidInitializerScreen");
    	super.onPause();
    	// initializer();
    }
    
    @Override
    public void onRestart(){
    	logger.info("onRestart AndroidInitializerScreen");
    	super.onRestart();
    	initializer();
    }
    
    @Override
    public void onResume(){
    	logger.info("onResume AndroidInitializerScreen");
    	super.onResume();
    	initializer();
    }

    @Override
    public void onDestroy() {
      logger.info("onDestroy AndroidInitializerScreen");
      super.onDestroy();
      AppSessionManagement appSessionManagement = new AppSessionManagement(this);
      appSessionManagement.setAndroidSession(BusinessConstants.ANDROID_CURRENT_ACTIVITY, "NO_ACTIVITY");
    }
    
    public void initializer(){ 
        logger.info("initializer AndroidInitializerScreen");
        AppManagement appManagement = new AppManagement(this);
    	  AppNotifyManagement appNotifyManagement = new AppNotifyManagement(this);
    	  AppSessionManagement appSessionManagement = new AppSessionManagement(this);
    	  AppSQLiteManagement appSQLiteManagement = new AppSQLiteManagement(this);
    	
    	  appSessionManagement.setAndroidSession(BusinessConstants.ANDROID_CURRENT_ACTIVITY, "ANDROIDINITIALIZERSCREEN");
    	    
    	  webView = (WebView) findViewById(R.id.webView);
        webView.clearCache(true);
        webView.clearHistory();
          
        webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        webSettings.setJavaScriptCanOpenWindowsAutomatically(true);
        webSettings.setDomStorageEnabled(true);
        
        webView.addJavascriptInterface(appManagement, "Android"); 
        webView.addJavascriptInterface(appNotifyManagement, "AndroidNotify");
        webView.addJavascriptInterface(appSessionManagement, "AndroidSession"); 
        webView.addJavascriptInterface(appSQLiteManagement, "AndroidDatabase"); 
      
        webView.setWebViewClient(new AndroidInitializerViewClient(this));
        webView.setWebChromeClient(new AndroidInitializerChromeClient(this));
        
        if (Build.VERSION.SDK_INT >= 19) { webView.setLayerType(View.LAYER_TYPE_HARDWARE, null); }
        else if (Build.VERSION.SDK_INT >= 11 && Build.VERSION.SDK_INT < 19) {
            webView.setLayerType(View.LAYER_TYPE_SOFTWARE, null);
        }
        
    	  try {
           NetworkUtility networkUtility=new NetworkUtility(this);
  		 if(networkUtility.checkInternetConnection()) {
  			/* Show SignIn/Register Popup Notification */
  			String USER_ID=appSessionManagement.getAndroidSession(BusinessConstants.AUTH_USER_ID);
  			logger.info("USER_ID: "+USER_ID);
  			if(USER_ID==null){
  		     // new Notifications(this.getApplicationContext()).notify_show_signInRegister();
  			}
  			webView.loadUrl("file:///android_asset/www/app-init-default.html");
  		 }
  		 else{  webView.loadUrl("file:///android_asset/www/network_state.html");  }
        } catch(Exception e){  logger.info("Exception: "+e); }
    }
    
    
    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
    	logger.info("AndroidInitializerScreen(onActivityResult): "+requestCode+" "+resultCode+" "+data);
    }

}
