package anups.cmt.module.auth.user.register.geninfo;

import java.awt.AWTException;
import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;

import org.openqa.selenium.WebElement;

import com.google.gson.Gson;

import anups.cmt.automation.report.AutomationReport;
import anups.cmt.automation.report.Bootstrap;
import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.pojos.TestSteps;
import anups.cmt.core.utils.Xml;
import anups.cmt.module.auth.user.register.UserRegisterForm;
import anups.cmt.module.auth.user.register.UserRegisterFormUtils;

public class GeneralInfoModuleTest extends UserRegisterFormUtils {

	
	private AutomationReport automationReport;
	
	private String automationReportContent;
	
	public GeneralInfoModuleTest() throws InterruptedException, AWTException {
	    automationReport =  new AutomationReport("authentication-report");
	    automationReportContent="";
	    testCase01();
	    testCase02();
		automationReport.build(Bootstrap.buildHTMLContent("Authentciation Test", automationReportContent));
		super.quit();
	}
	
	public void testCase01() throws InterruptedException, AWTException {
		automationReportContent+=Bootstrap.buildContainerFluidRow(1, new String[] { Bootstrap.buildH3Heading("Create Account - General Information") });
		automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] { testOnPageLoad()+testBadge1(), checkEmptyGenInfoForm() });
	}
	
	public void testCase02() {
		
	}
	
	public static void main(String args[]) throws InterruptedException, AWTException {
	  new GeneralInfoModuleTest();
	}
}
