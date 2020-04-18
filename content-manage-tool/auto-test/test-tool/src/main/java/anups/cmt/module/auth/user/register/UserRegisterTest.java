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
import anups.cmt.module.auth.user.register.sq.SqModuleDatabase;
import anups.cmt.module.auth.user.register.sq.SqModuleFactory;

public class UserRegisterTest extends AutomationBase {

	static WebDriver driver;
	
	public static UserRegisterWebElements userRegisterWebElements;
	
	private AutomationReport automationReport;
	
	private String automationReportContent;
	
	private GeneralInfoModuleUtils generalInfoModuleUtils;
	
	private SetPwdModuleFactory setPwdModuleFactory;
	
	private SqModuleFactory sqModuleFactory;
	
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
		
		/* Delete TestData in Database Initially ::: Start */
		new SqModuleDatabase().deleteDataStoresinDatabase();
		/* Delete TestData in Database Initially ::: End */
		
		generalInfoModuleUtils = new GeneralInfoModuleUtils();
		setPwdModuleFactory = new SetPwdModuleFactory();
		sqModuleFactory = new SqModuleFactory();
		
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
				Bootstrap.buildH4Heading("Create Account - Set Password"),
				Bootstrap.buildH4Heading("Create Account - Set Security Questions") 
		}, null, null);
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
				
				setPwdModuleFactory.checkEmptySetPwdForm()+
				setPwdModuleFactory.checkSetPwdFormWithPassword()+
				setPwdModuleFactory.checkSetPwdFormWithConfirmPassword()+
				setPwdModuleFactory.checkSetPwdFormWithInvalidPassword()+
				setPwdModuleFactory.checkSetPwdFormWithInvalidConfirmPassword()+
				setPwdModuleFactory.checkSetPwdFormWithInvalidPasswordAndInvalidConfirmPassword()+
				setPwdModuleFactory.checkSetPwdFormWithValidPasswordAndInvalidConfirmPassword()+
				setPwdModuleFactory.checkSetPwdFormWithInvalidPasswordAndValidConfirmPassword()+
				setPwdModuleFactory.checkSetPwdFormWithValidPasswordAndValidConfirmPassword(),
				
				sqModuleFactory.checkSQLoadingFromDatabase()+
				sqModuleFactory.checkEmptySetSQForm()+
				sqModuleFactory.checkSetSQFormWithSQ1()+
				sqModuleFactory.checkSetSQFormWithSQ2()+
				sqModuleFactory.checkSetSQFormWithSQ3()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ2()+
				sqModuleFactory.checkSetSQFormWithSQ2SQ3()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ3()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ2SQ3()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ2SQ3A1()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ2SQ3A2()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ2SQ3A3()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ2SQ3A1A2()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ2SQ3A2A3()+
				sqModuleFactory.checkSetSQFormWithSQ1SQ2SQ3A1A3()+
				sqModuleFactory.checkSetSQFormWithAllFields()
		},null,null);
		// automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] { checkGenInfoFormWithAllFields() });
	}
	// +checkGenInfoFormWithEmptyOTPCode()
	public void module02() throws InterruptedException, AWTException {
		// automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] {  });
		// automationReportContent+=Bootstrap.buildContainerFluidRow(3, new String[] {  });
	}
	
}
