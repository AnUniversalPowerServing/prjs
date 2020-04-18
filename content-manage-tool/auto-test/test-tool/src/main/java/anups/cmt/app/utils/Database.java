package anups.cmt.app.utils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

public class Database {
	public static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
	public static final String DB_URL = "jdbc:mysql://localhost/kv";
	public static final String USER = "root";
	public static final String PASS = "";
	
	public static void main(String[] args) {
	  Connection conn = null;
	  Statement stmt = null;
	  ResultSet rs = null;
	   try{
		 Class.forName(JDBC_DRIVER);
		 conn = DriverManager.getConnection(DB_URL,USER,PASS);
		 System.out.println("Connecting to database...");
		 System.out.println("Creating statement...");
	      stmt = conn.createStatement();
	      String sql;
	      sql = "SELECT * FROM user_accounts_sq;";
	      rs = stmt.executeQuery(sql);

	      //STEP 5: Extract data from result set
	      while(rs.next()){
	    	  System.out.println(rs.getString("sQ"));
	      }
	      
		} catch(Exception e) {
		    e.printStackTrace();
	    } finally {	
	    	if(rs!=null) { try { rs.close(); } catch(Exception e) { }  }
	    	if(stmt!=null) { try { stmt.close(); } catch(Exception e) { }  }
	    	if(conn!=null) { try { conn.close(); } catch(Exception e) { }  }
	    }
	 }
}
