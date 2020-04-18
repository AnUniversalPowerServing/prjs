package anups.cmt.module.auth.user.register.sq;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;

import anups.cmt.module.auth.user.register.UserRegisterTestData;

public class SqModuleDatabase {
	public static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
	public static final String DB_URL = "jdbc:mysql://localhost/kv";
	public static final String USER = "root";
	public static final String PASS = "";
	
	public ArrayList<String> getListOfSQfromDatabse(){
	  Connection conn = null;
	  Statement stmt = null;
	  ResultSet rs = null;
	  ArrayList<String> sQ = new ArrayList<String>();
	   try{
		 Class.forName(JDBC_DRIVER);
		 conn = DriverManager.getConnection(DB_URL,USER,PASS);
		 System.out.println("Connecting to database...");
		 System.out.println("Creating statement...");
	      stmt = conn.createStatement();
	      String sql;
	      sql = "SELECT * FROM user_accounts_sq ORDER BY sQ_Id;";
	      rs = stmt.executeQuery(sql);
	      while(rs.next()){
	    	  sQ.add(rs.getString("sQ"));
	      }
	      
		} catch(Exception e) {
		    e.printStackTrace();
	    } finally {	
	    	if(rs!=null) { try { rs.close(); } catch(Exception e) { }  }
	    	if(stmt!=null) { try { stmt.close(); } catch(Exception e) { }  }
	    	if(conn!=null) { try { conn.close(); } catch(Exception e) { }  }
	    }
	   return sQ;
	 }
	
	public ArrayList<String> deleteDataStoresinDatabase(){
		  Connection conn = null;
		  Statement stmt = null;
		  ResultSet rs = null;
		  ArrayList<String> sQ = new ArrayList<String>();
		   try{
			 Class.forName(JDBC_DRIVER);
			 conn = DriverManager.getConnection(DB_URL,USER,PASS);
			 System.out.println("Connecting to database...");
			 System.out.println("Creating statement...");
		      stmt = conn.createStatement();
		      String sql1 = "SELECT count(*) FROM user_accounts_auth WHERE mobile='"+UserRegisterTestData.DATA_VALID_MOBILE_NEW+"';";
		      rs = stmt.executeQuery(sql1);
		      if(rs.next()){
		    	  String sql2 = "DELETE FROM user_accounts_auth WHERE mobile='"+UserRegisterTestData.DATA_VALID_MOBILE_NEW+"';";
		    	  stmt.executeUpdate(sql2);
		      }
		      
			} catch(Exception e) {
			    e.printStackTrace();
		    } finally {	
		    	if(rs!=null) { try { rs.close(); } catch(Exception e) { }  }
		    	if(stmt!=null) { try { stmt.close(); } catch(Exception e) { }  }
		    	if(conn!=null) { try { conn.close(); } catch(Exception e) { }  }
		    }
		   return sQ;
		 }
}
