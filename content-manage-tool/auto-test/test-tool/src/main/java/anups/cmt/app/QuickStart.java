package anups.cmt.app;

import java.awt.AWTException;

import com.google.gson.Gson;

import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.utils.Xml;
import anups.cmt.module.auth.user.register.geninfo.GeneralInfoModuleTest;

/**
 * Hello world!
 *
 */
public class QuickStart {
    public static void main( String[] args) throws InterruptedException, AWTException{
    	new GeneralInfoModuleTest();
    	/*
    	 TestScenarios testScenarios = new Xml().getTestCase("00001");
    	 Gson gson = new Gson();
    	 System.out.println(gson.toJson(testScenarios));
    	 */
    	 
    }
}
