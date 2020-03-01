package anups.cmt.app;

import com.google.gson.Gson;

import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.utils.Xml;

/**
 * Hello world!
 *
 */
public class QuickStart {
    public static void main( String[] args ){
    	 TestScenarios testScenarios = new Xml().getTestCase("2244671");
    	 Gson gson = new Gson();
    	 System.out.println(gson.toJson(testScenarios));
    }
}
