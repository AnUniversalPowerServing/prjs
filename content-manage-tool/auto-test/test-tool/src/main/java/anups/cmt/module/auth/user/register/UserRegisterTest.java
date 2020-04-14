package anups.cmt.module.auth.user.register;

import java.awt.AWTException;
import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

import com.google.gson.Gson;

import anups.cmt.automation.app.AutomationBase;
import anups.cmt.automation.report.AutomationReport;
import anups.cmt.automation.report.Bootstrap;
import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.pojos.TestSteps;
import anups.cmt.core.utils.Xml;
import anups.cmt.module.auth.user.register.geninfo.GeneralInfoModuleUtils;
import anups.cmt.module.auth.user.register.setpwd.SetPwdModuleFactory;

public class UserRegisterTest extends AutomationBase {

	static WebDriver driver;
	
	public static UserRegisterWebElements userRegisterWebElements;
	
	private AutomationReport automationReport;
	
	private String automationReportContent;
	
	private GeneralInfoModuleUtils generalInfoModuleUtils;
	
	private SetPwdModuleFactory setPwdModuleFactory;
	
	public static WebDriver getWebDriver() {
		return driver;
	}
	
	public static UserRegisterWebElements getUserRegisterWebElements() {
		return userRegisterWebElements;
	}
	
	public UserRegisterTest() throws InterruptedException, AWTException {
		super("http://localhost/prjs/content-manage-tool/web-tool/kv-forms.php");
		driver = super.getDriver();
		userRegisterWebElements = new UserRegisterWebElements(driver);
		
		generalInfoModuleUtils = new GeneralInfoModuleUtils();
		setPwdModuleFactory = new SetPwdModuleFactory();
		
	    automationReport =  new AutomationReport("authentication-report");
	    automationReportContent="";
	    module01();
	    module02();
		automationReport.build(Bootstrap.buildHTMLContent("Authentciation Test", automationReportContent));
		super.quit();
	}
	
	public void module01() throws InterruptedException, AWTException {
		automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] { 
				Bootstrap.buildH4Heading("Create Account - General Information"),
				Bootstrap.buildH4Heading("Create Account - Set Password") 
		});
		automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] { 
				generalInfoModuleUtils.testOnPageLoad()+
				generalInfoModuleUtils.testBadge1()+
				generalInfoModuleUtils.checkEmptyGenInfoForm()+
				generalInfoModuleUtils.checkGenInfoFormWithSurName()+
				generalInfoModuleUtils.checkGenInfoFormWithName()+
				generalInfoModuleUtils.checkGenInfoFormWithGender()+
				generalInfoModuleUtils.checkGenInfoFormWithNewMobile()+
				generalInfoModuleUtils.checkGenInfoFormWithRegisterMobile()+
				generalInfoModuleUtils.checkGenInfoFormWithSurNameAndName()+
				generalInfoModuleUtils.checkGenInfoFormWithNameAndGender()+
				generalInfoModuleUtils.checkGenInfoFormWithGenderAndMobile()+
				generalInfoModuleUtils.checkGenInfoFormWithSurNameAndGender()+
				generalInfoModuleUtils.checkGenInfoFormWithSurNameAndMobile()+
				generalInfoModuleUtils.checkGenInfoFormWithNameAndMobile()+
				generalInfoModuleUtils.checkGenInfoFormWithSurNameNameAndGender()+
				generalInfoModuleUtils.checkGenInfoFormWithNameGenderAndMobile()+
				generalInfoModuleUtils.checkGenInfoFormWithSurNameGenderAndMobile()+
				generalInfoModuleUtils.checkGenInfoFormWithSurNameNameAndMobile()+
				generalInfoModuleUtils.checkGenInfoFormWithAllFields(),
				setPwdModuleFactory.checkEmptySetPwdForm() 
		});
		// automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] { checkGenInfoFormWithAllFields() });
	}
	// +checkGenInfoFormWithEmptyOTPCode()
	public void module02() throws InterruptedException, AWTException {
		// automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] {  });
		// automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] {  });
	}
	
}
