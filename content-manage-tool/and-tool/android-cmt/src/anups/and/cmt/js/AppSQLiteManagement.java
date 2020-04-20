package anups.and.cmt.js;

import android.app.Activity;
import android.content.Context;
import android.database.Cursor;
import android.webkit.JavascriptInterface;
import android.widget.Toast;
import anups.and.cmt.db.DB;

public class AppSQLiteManagement extends Activity {
	Context mContext;
	public AppSQLiteManagement(Context c) {  mContext = c; }
	
	@JavascriptInterface
	public boolean insertIntoAppStatistics(String ipV4, String user_Id, String appOpen, String appClose){
		DB database = DB.getInstance(mContext);
		return database.insertIntoAppStatistics(ipV4, user_Id, appOpen, appClose);
	}
	
	@JavascriptInterface
	public String getAppStatistics(String appOpen, String appClose){
		StringBuilder sb =new StringBuilder();
		DB database = DB.getInstance(mContext);
		Cursor cursor = database.getAppStatisticsData(appOpen, appClose);
		Toast.makeText(mContext, "cursor: "+cursor, Toast.LENGTH_SHORT).show();
		while(cursor.moveToNext()){
		  String data = cursor.getString(cursor.getColumnIndexOrThrow("IPv4Address"));
		  sb.append("data: ").append(data);
		}
		cursor.close();
		return sb.toString();
	}
}
