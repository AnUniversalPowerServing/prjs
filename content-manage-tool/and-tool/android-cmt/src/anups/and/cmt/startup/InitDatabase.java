package anups.and.cmt.startup;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import anups.and.cmt.util.AndroidLogger;
import anups.and.cmt.app.AndroidWebScreen;
import anups.and.cmt.startup.db.*;

public class InitDatabase extends SQLiteOpenHelper {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidWebScreen.class);
	
	private static final String DATABASE_NAME = "mq.db";
	public InitDatabase(Context context, int versionNumber) {
		super(context, DATABASE_NAME, null, versionNumber);
		logger.info("SQLiteDatabase: "+context.getDatabasePath(DATABASE_NAME));
	}
	

	@Override
	public void onCreate(SQLiteDatabase db) {
		logger.info("onCreate Method invoked");
		new Mq.DbSchema(db).execute();
	}

	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		logger.info("onUpgrade Method invoked");
	}
	
	@Override
	public void onDowngrade(SQLiteDatabase db, int oldVersion, int newVersion){
		logger.info("onDowngrade Method invoked");
	}

	public void onDrop(SQLiteDatabase db){
		logger.info("onDrop Method invoked"); // DROP QUERY
	}
}
