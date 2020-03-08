package anups.cmt.module.auth.user.register;

import java.awt.AWTException;
import java.util.LinkedHashMap;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

import anups.cmt.automation.app.AutomationBase;

public class UserRegisterFormUtils extends AutomationBase implements UserRegisterForm {
 
	WebDriver driver;
	
	UserRegisterWebElements userRegisterWebElements;
	
	public UserRegisterFormUtils() {
		super("http://localhost/prjs/content-manage-tool/web-tool/kv-forms.php");
		driver = super.getDriver();
		userRegisterWebElements = new UserRegisterWebElements(driver);
	}
	
	public LinkedHashMap<String, Boolean> checkBadgeResponse() throws InterruptedException, AWTException {
		LinkedHashMap<String, Boolean> badgeResponse = new LinkedHashMap<String, Boolean>(); 
		
		WebElement genInfoDiv_badge_WebElement = userRegisterWebElements.getBadgeWebElement(UserRegisterForm.BADGE_GENINFO);
		WebElement setPassword_badge_WebElement = userRegisterWebElements.getBadgeWebElement(UserRegisterForm.BADGE_SETPWD);
		WebElement securityQ_badge_WebElement = userRegisterWebElements.getBadgeWebElement(UserRegisterForm.BADGE_SECURITYQ);
		
		WebElement genInfoDiv_badgeheading_WebElement = userRegisterWebElements.getBadgeHeadingWebElement(UserRegisterForm.BADGE_GENINFO_DIVISION);
		WebElement setPassword_badgeheading_WebElement = userRegisterWebElements.getBadgeHeadingWebElement(UserRegisterForm.BADGE_SETPWD_DIVISION);
		WebElement securityQ_badgeheading_WebElement = userRegisterWebElements.getBadgeHeadingWebElement(UserRegisterForm.BADGE_SECURITYQ_DIVISION);
		
		super.singleClickButton(genInfoDiv_badge_WebElement);
		
		if(BADGE_GENINFO_TITLE.equalsIgnoreCase(genInfoDiv_badgeheading_WebElement.getText().trim())) {
			badgeResponse.put("BADGE_GENINFO_RESPONSE", true);
		} else {
			badgeResponse.put("BADGE_GENINFO_RESPONSE", false);
		}
		
		super.singleClickButton(setPassword_badge_WebElement);
		
		if(BADGE_SETPWD_TITLE.equalsIgnoreCase(setPassword_badgeheading_WebElement.getText().trim())) {
			badgeResponse.put("BADGE_SETPWD_RESPONSE", true);
		} else {
			badgeResponse.put("BADGE_SETPWD_RESPONSE", false);
		}
		
		super.singleClickButton(securityQ_badge_WebElement);
		
		if(BADGE_SECURITYQ_TITLE.equalsIgnoreCase(securityQ_badgeheading_WebElement.getText().trim())) {
			badgeResponse.put("BADGE_SECURITYQ_RESPONSE", true);
		} else {
			badgeResponse.put("BADGE_SECURITYQ_RESPONSE", false);
		}
		
		return badgeResponse;
	}
	
	public void checkEmptyGenInfoForm() throws InterruptedException, AWTException {
	   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
	   super.singleClickButton(genInfo_mobileVerifyBrn_webElement);
	   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
	   System.out.println(alertResponse);
	   if(FORM_GENINFO_ALERTMSG_EMPTYFORM.equalsIgnoreCase(alertResponse)) {
		   System.out.println("Testcase Passed: ");
	   }
	 //  super.quit();
	}
	
	public static void main(String args[]) throws InterruptedException, AWTException {
		UserRegisterFormUtils userRegisterFormTest = new UserRegisterFormUtils();
		Thread.sleep(6000);
		System.out.println(userRegisterFormTest.checkBadgeResponse());
		Thread.sleep(2000);
		userRegisterFormTest.checkEmptyGenInfoForm();
		
	}
}
