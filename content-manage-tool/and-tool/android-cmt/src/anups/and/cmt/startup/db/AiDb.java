package anups.and.cmt.startup.db;

import android.database.sqlite.SQLiteDatabase;

public class AiDb {
	static class DbSchema {
		
	    private SQLiteDatabase db;
		DbSchema(SQLiteDatabase db){ this.db = db;  }
		  
	    public void tbl_appDbInfo(){
		  StringBuilder sb = new StringBuilder();
		     sb.append("create table app_db_info (");
		     sb.append("database text PRIMARY KEY,");
		     sb.append("version INTEGER,");
		     sb.append("updatedOn TIMESTAMP");
		     sb.append(");");
		  db.execSQL(sb.toString());
	    }
	    
	}
}
