package anups.and.cmt.startup.db;

import android.database.sqlite.SQLiteDatabase;

public class Mq {

  public static class DbSchema {
	
    private SQLiteDatabase db;
	public DbSchema(SQLiteDatabase db){ this.db = db;  }
	  
    public void tbl_channels(){
	  StringBuilder sb = new StringBuilder();
	     sb.append("create table channels (");
	     sb.append("channelId INTEGER PRIMARY KEY AUTOINCREMENT,");
	     sb.append("channelName text,");
	     sb.append("channelType text");
	     sb.append(");");
	  db.execSQL(sb.toString());
    }
  
    public void tbl_messages(){
      StringBuilder sb = new StringBuilder();
	     sb.append("create table messages (");
	     sb.append("messageId INTEGER PRIMARY KEY AUTOINCREMENT,");
	     sb.append("channelId INTEGER NOT NULL,");
	     sb.append("message text,");
	     sb.append("FOREIGN KEY (channelId) REFERENCES channels (channelId)");
	     sb.append(");");
	  db.execSQL(sb.toString());
    }
    
    public void execute(){
    	tbl_channels();
    	tbl_messages();
    }
    
  }
  
  
  
}
