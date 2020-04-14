package anups.cmt.module.auth.user.register.setpwd;

import java.awt.AWTException;

import org.openqa.selenium.WebElement;

import anups.cmt.automation.app.AutomationFactorySettings;
import anups.cmt.module.auth.user.register.UserRegisterForm;
import anups.cmt.module.auth.user.register.UserRegisterFormUtils;
import anups.cmt.module.auth.user.register.UserRegisterTest;

public class SetPwdModuleFactory extends UserRegisterFormUtils {
	
	AutomationFactorySettings automationFactorySettings;
	
	public SetPwdModuleFactory() {
		automationFactorySettings = new AutomationFactorySettings(UserRegisterTest.getWebDriver());
	 }
	
	public String checkEmptySetPwdForm() throws InterruptedException, AWTException {
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		Thread.sleep(3000);
	  return null;
	}
}
