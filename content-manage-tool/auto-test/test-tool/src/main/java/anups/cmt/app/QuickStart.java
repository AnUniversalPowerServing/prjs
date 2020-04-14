package anups.cmt.app;

import java.awt.AWTException;

import com.google.gson.Gson;

import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.utils.Xml;
import anups.cmt.module.auth.user.register.UserRegisterTest;

/**
 * Hello world!
 *
 */
public class QuickStart {
    public static void main( String[] args) throws InterruptedException, AWTException{
    	new UserRegisterTest();
    }
}
