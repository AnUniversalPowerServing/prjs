package anups.and.cmt.js;

import android.app.Activity;
import android.content.Context;
import android.webkit.JavascriptInterface;
import anups.and.cmt.app.AndroidWebScreen;
import anups.and.cmt.util.AndroidLogger;

public class AppPermissions extends Activity {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppPermissions.class);
  Context mContext;
  public AppPermissions(Context c) {  mContext = c; }
	
  @JavascriptInterface
  public boolean doesPermissionExist(String permission){ 
   return ((AndroidWebScreen) mContext).doesPermissionExist(permission);
  }
	
  @JavascriptInterface
  public void makeAPermission(String permissions){
	  String[] perm = permissions.split(",");
	  ((AndroidWebScreen) mContext).makeAPermission(perm);
	}
  
  
}
