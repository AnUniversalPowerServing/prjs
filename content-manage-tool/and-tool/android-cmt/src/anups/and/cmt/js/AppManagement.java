package anups.and.cmt.js;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.Reader;
import java.io.StringWriter;
import java.io.Writer;
import java.util.Arrays;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.ContentResolver;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.content.res.AssetManager;
import android.database.sqlite.SQLiteDatabase;
import android.net.Uri;
import android.provider.Settings;
import android.webkit.JavascriptInterface;
import android.widget.Toast;
import anups.and.cmt.app.AndroidWebScreen;
import anups.and.cmt.constants.BusinessConstants;
import anups.and.cmt.media.AndroidWebScreenVideo;
import anups.and.cmt.notify.ws.FilesTransactionService;
import anups.and.cmt.startup.InitDatabase;
import anups.and.cmt.util.AndroidLogger;
import anups.and.cmt.util.CRUDContacts;
import anups.and.cmt.util.FilesTransactionUtility;
import anups.and.cmt.util.GPSTracker;
import anups.and.cmt.util.Masking;
import anups.and.cmt.util.NewGPSTracker;
import anups.and.cmt.util.PropertyUtility;
import anups.and.cmt.web.templates.URLGenerator;

public class AppManagement {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppManagement.class);
	Context mContext;
	public AppManagement(Context c) {  mContext = c; }

	@JavascriptInterface
	public void dbLogic(int version){
		InitDatabase initDatabase = new InitDatabase(mContext,version);
		SQLiteDatabase sqliteDatabase = initDatabase.getWritableDatabase(); // invokes
		// sqliteDatabase.getVersion();
		logger.info("DatabaseName: "+sqliteDatabase.getVersion());
	}
	
	@JavascriptInterface
	public void loadProjectPropertiesFile(){
	  logger.info("loadProjectPropertiesFile (Javascript)...");
	  try {
        AppSessionManagement appSessionManagement = new AppSessionManagement(mContext);
	    PropertyUtility propertyUtility = new PropertyUtility(mContext);
	    String propertyFile = propertyUtility.initializePropertyFile(appSessionManagement);
		       propertyUtility.readPropertyFile(appSessionManagement, propertyFile);
      } catch(Exception e){
		 logger.error("Exception: "+e);
	  }
	}
	
	@JavascriptInterface
	public String getProjectURL() {
	  AppSessionManagement appSessionManagement = new AppSessionManagement(mContext);
      return appSessionManagement.getAndroidSession("PROPERTY_PROJECT_URL"); 
    }
	
	@JavascriptInterface
	public String getVersionNumber() {
	  AppSessionManagement appSessionManagement = new AppSessionManagement(mContext);
      return appSessionManagement.getAndroidSession("PROJECT_VERSION_NUMBER"); 
    }
	
	@JavascriptInterface
	public String getDefaultPage() {
      return new URLGenerator(mContext).defaultPage();
    }
	
	@JavascriptInterface
	public String getHomePage(String projectURL) {
      return new URLGenerator(mContext).latestNews(projectURL);
    }
	
	@JavascriptInterface
	public String checkPlayStoreUpdate(String playstoreversion) {
	String status="UP-TO-DATE";
	if(!playstoreversion.equals("0.0.0")){
	 try {
    	   PackageInfo packageInfo = mContext.getPackageManager().getPackageInfo(mContext.getPackageName(), 0);
    	   String versionName = packageInfo.versionName;
    	   String arry_psversion[]=playstoreversion.split("\\.");
     	   String arry_version[]=versionName.split("\\.");
     	   int psversionNumber=Integer.parseInt(arry_psversion[0]+"00")+Integer.parseInt(arry_psversion[1]+"0")+Integer.parseInt(arry_psversion[2]);
     	   int versionNumber=Integer.parseInt(arry_version[0]+"00")+Integer.parseInt(arry_version[1]+"0")+Integer.parseInt(arry_version[2]);
           if(psversionNumber>versionNumber){
        	   status="APP_TO_UPDATE";
           }
    	   
    	 } catch (PackageManager.NameNotFoundException e) {
    		 status="UP-TO-DATE";
    	 }
	}
	 return status;
    }
	
	@JavascriptInterface
	public String getTemplateAndLoad(String fileName) {
	    AssetManager mgr = mContext.getAssets();
		StringBuilder text = new StringBuilder();
		try {
		 InputStream in = mgr.open(BusinessConstants.ASSETS_WWW_FOLDER+fileName, AssetManager.ACCESS_BUFFER);
		BufferedReader br = new BufferedReader(new InputStreamReader(in));
		 String line;
         while ((line = br.readLine()) != null) {
		         text.append(line).append('\n');
		     }
		     br.close();
		} catch(Exception e) {  logger.error("Exception : "+e.getMessage()); }	
		return text.toString();
    }
	
	private FilesTransactionUtility filesTransactionUtility;
	
	@JavascriptInterface
	public void fileTransaction(String downloadFrom, String downloadTo, String fileName, 
			String transactionMode, String transactionFormat){
    /* =======================================
     * FUNCTION DESCRIPTION :
     * =======================================
     *  This Function is used from Javascript to transfer Data from Device to Server and from
     *  Server to Device.
     * =======================================
     * FUNCTION PARAMETERS :
     * =======================================
     * 1) downloadFromURL
     * 2) downloadToPath
     * 3) fileName
     * 4) transactionMode (SERVER_TO_CLIENT/CLIENT_TO_SERVER)
     *    a) SERVER_TO_CLIENT - Transfers Files from Server to Client
     *    b) CLIENT_TO_SERVER - Transfers Files from Client to Server
     * 5) transactionFormat (DELETE_BEFORE_UPLOAD/EXISTS_NO_UPLOAD)
     *    a) DELETE_BEFORE_UPLOAD - Deletes currently exists File before Upload
     *    b) EXISTS_NO_UPLOAD - Checks File exists or not, If Exists File will not upload
     */
	 filesTransactionUtility = new FilesTransactionUtility();
	 FilesTransactionService filesTransactionService = new FilesTransactionService(mContext,filesTransactionUtility);
	 filesTransactionService.execute(new String[]{downloadFrom, downloadTo, fileName, transactionMode, transactionFormat});
	}
	
	@JavascriptInterface
	public float fileTransactionProgress(){
	 return filesTransactionUtility.getProgressBar();
	}
	
	@JavascriptInterface
	public void showToast(String toast) {
        Toast.makeText(mContext, toast, Toast.LENGTH_SHORT).show();
    }

	@JavascriptInterface
	public void showVideo(String videoURL) {
		Intent intent = new Intent(mContext, AndroidWebScreenVideo.class);
		intent.putExtra("VIDEO_URL", videoURL);
		intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
		mContext.getApplicationContext().startActivity(intent);
	}
	
	@JavascriptInterface
	public void goToAppPermissions(){
		Intent intent = new Intent(Settings.ACTION_APPLICATION_DETAILS_SETTINGS, 
			      Uri.parse("package:" + mContext.getPackageName()));
		intent.addCategory(Intent.CATEGORY_DEFAULT);
	    intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
	    try {
	    mContext.startActivity(intent);
	    } catch(Exception e) { Toast.makeText(mContext, e.getMessage(), Toast.LENGTH_SHORT).show(); }
	}
	
	@JavascriptInterface
	public String listOfContacts(){
		ContentResolver contentResolver = mContext.getContentResolver();
	    CRUDContacts crudContacts = new CRUDContacts();
	    return crudContacts.fetchContacts(contentResolver);
	}
	
	@JavascriptInterface
	public void loadAndroidWebScreen(String directURL, String activityColor){
		try {
		Intent intent = new Intent(mContext, AndroidWebScreen.class);
		 //  intent.setData(Uri.parse(directURL));
		   intent.putExtra("COLOR", activityColor);
		   intent.putExtra("URL",directURL);
		   intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
		mContext.startActivity(intent);
		} catch(Exception e){ }
	}
	
	@JavascriptInterface
	public int getAndroidVersion(){
	  return android.os.Build.VERSION.SDK_INT;
	}
	
	@JavascriptInterface
	public String getUserMobileGPSPosition(){
		GPSTracker gpsTracker = new GPSTracker(mContext);
		StringBuilder jsonData = new StringBuilder();
		double lat = gpsTracker.getLatitude();
		double lng = gpsTracker.getLongitude();
		jsonData.append("{").append("\"lat\":").append(lat).append(",");
		jsonData.append("\"lng\":").append(lng).append("}");
	  logger.info("mylatlng : "+jsonData.toString());
	  return jsonData.toString();
	}

	@JavascriptInterface
	public String chatMasking_encryption(String plainMsg, String timestamp){
		String encryption = null;
		try {
			encryption = Masking.encryptMsg(timestamp,plainMsg);
		} catch(Exception e){ }
		return encryption;
	}
	
	@JavascriptInterface
	public String chatMasking_decryption(String encryptMsg, String timestamp){
		String decryption = null;
		try {
			decryption = Masking.decryptMsg(timestamp, encryptMsg);
		} catch(Exception e){}
		return decryption;
	}
}
