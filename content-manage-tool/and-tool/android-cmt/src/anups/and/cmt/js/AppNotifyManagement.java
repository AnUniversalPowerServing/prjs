package anups.and.cmt.js;

import android.app.Activity;
import android.content.Context;
import android.webkit.JavascriptInterface;
import anups.and.cmt.notify.ws.util.Notifications;

public class AppNotifyManagement extends Activity {
	Context mContext;
	public AppNotifyManagement(Context c) {  mContext = c; }
	@JavascriptInterface
	public void shutdownNotification_versionUpgrade() {
		new Notifications(mContext).notify_hide_versionStatus();
    }
	@JavascriptInterface
	public void startNotification_authReminder() {
		new Notifications(mContext).notify_show_signInRegister();
    }
	@JavascriptInterface
	public void shutdownNotification_authReminder() {
		new Notifications(mContext).notify_hide_signInRegister();
    }
	
}
