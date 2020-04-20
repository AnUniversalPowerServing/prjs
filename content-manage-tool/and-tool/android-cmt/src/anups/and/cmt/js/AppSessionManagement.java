package anups.and.cmt.js;

import android.app.Activity;
import android.content.Context;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.webkit.JavascriptInterface;

public class AppSessionManagement extends Activity {
	@SuppressWarnings("unused")
	private Context mContext;
	SharedPreferences pref;
	Editor editor;
	public AppSessionManagement(Context c) { 
		 mContext = c;
		 pref = c.getSharedPreferences("MyPref", 0); // 0 - for private mode
		  editor = pref.edit();
	}
	
	@JavascriptInterface
	public void setAndroidSession(String key, String value) {
        editor.putString(key, value); // Storing string
        editor.commit(); 
    }
	
	@JavascriptInterface
	public String getAndroidSession(String key) {
        return pref.getString(key, null); // getting String
    }
	
	@JavascriptInterface
	public void deleteAndroidSession(String key) {
	  editor.remove(key); 
	  editor.commit(); 
	}
	
	@JavascriptInterface
	public void clearAndroidSession() {
	 editor.clear();
	 editor.commit(); 
	}

}
