package anups.cmt.module.auth.user.register;

import java.awt.AWTException;
import java.util.LinkedHashMap;
import java.util.List;

import com.google.gson.Gson;

import anups.cmt.automation.app.AutomationReport;
import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.pojos.TestSteps;
import anups.cmt.core.utils.Xml;

public class UserRegisterFormTest {

	private UserRegisterFormUtils userRegisterFormUtils;
	
	private AutomationReport automationReport;
	
	public UserRegisterFormTest() throws InterruptedException, AWTException {
	    userRegisterFormUtils = new UserRegisterFormUtils();
	    automationReport =  new AutomationReport("authentication-report");
		testCase01();
	}
	public void testCase01() throws InterruptedException, AWTException {
		TestScenarios testScenario = new Xml().getTestCase("00001");
		LinkedHashMap<String, Boolean> badgeResponse = userRegisterFormUtils.checkBadgeResponse();
		List<TestSteps> testSteps = testScenario.getTestCases().getTestSteps();
		if(badgeResponse.get("BADGE_GENINFO_RESPONSE")==true) {
			testSteps.get(0).setTestStepStatus("PASSED");
		}
		if(badgeResponse.get("BADGE_SETPWD_RESPONSE")==false) {
			testSteps.get(1).setTestStepStatus("PASSED");
		}
		if(badgeResponse.get("BADGE_SECURITYQ_RESPONSE")==false) {
			testSteps.get(2).setTestStepStatus("PASSED");
		}
		
		System.out.println("badgeResponse: "+new Gson().toJson(badgeResponse));
		System.out.println("testScenario: "+new Gson().toJson(testScenario));
		// automationReport.addToReport(testScenario);
		automationReport.doneReport();
	}
	
	public static void main(String args[]) throws InterruptedException, AWTException {
	  new UserRegisterFormTest();
	}
}
