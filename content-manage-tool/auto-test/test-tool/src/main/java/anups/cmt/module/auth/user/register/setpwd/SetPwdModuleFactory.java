package anups.cmt.module.auth.user.register.setpwd;

import java.awt.AWTException;
import java.util.Arrays;
import java.util.List;

import org.openqa.selenium.Keys;
import org.openqa.selenium.WebElement;

import anups.cmt.automation.app.AutomationFactorySettings;
import anups.cmt.automation.report.Bootstrap;
import anups.cmt.module.auth.user.register.UserRegisterForm;
import anups.cmt.module.auth.user.register.UserRegisterFormUtils;
import anups.cmt.module.auth.user.register.UserRegisterTest;
import anups.cmt.module.auth.user.register.UserRegisterTestData;

public class SetPwdModuleFactory extends UserRegisterFormUtils {
	
	AutomationFactorySettings automationFactorySettings;
	
	public SetPwdModuleFactory() {
	  automationFactorySettings = new AutomationFactorySettings(UserRegisterTest.getWebDriver());
	}
	
	/**  Required Stuff ::: Start */
	private void setPwdForm_add_password(String password) {
	  WebElement setPwd_password_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_SETPWD_INPUT_PASSWORD);
	  setPwd_password_webElement.sendKeys(password);
	}
	
	private void setPwdForm_add_confirmPassword(String confirmPassword) {
	  WebElement setPwd_password_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_SETPWD_INPUT_CONFIRMMPASSWORD);
	  setPwd_password_webElement.sendKeys(confirmPassword);
	}
	
	private void setPwdForm_reset_allFields() {
	  setPwdForm_reset_password();
	  setPwdForm_reset_confirmPassword();
	}
	
	private void setPwdForm_reset_password() {
	  WebElement setPwd_password_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_SETPWD_INPUT_PASSWORD);
	  setPwd_password_webElement.sendKeys(Keys.chord(Keys.CONTROL, "a"));
	  setPwd_password_webElement.sendKeys(Keys.BACK_SPACE);
	}
	
	private void setPwdForm_reset_confirmPassword() {
	  WebElement setPwd_confirmPassword_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_SETPWD_INPUT_CONFIRMMPASSWORD);
	  setPwd_confirmPassword_webElement.sendKeys(Keys.chord(Keys.CONTROL, "a"));
	  setPwd_confirmPassword_webElement.sendKeys(Keys.BACK_SPACE);
	}
	
	private String setPwdForm_testData_basic(String password, String confirmPassword) {
	  StringBuilder testData = new StringBuilder();
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Password: ")+password, false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Confirm Password: ")+confirmPassword, false));
	  return testData.toString();
    }
	

	 public String setPwdForm_basic_validateIcons(List<String> fields) {
		Boolean isSuccessErrorIconsPassed= true;
		StringBuilder successOrErrorBuilder = new StringBuilder();
			
		String status_input_password = STATUS_ERROR;
		if(fields.contains(SETPWDMODULE_FIELDS_LABEL_PASSWORD)) { status_input_password = STATUS_SUCCESS; }
		String status_input_confirmPassword = STATUS_ERROR;
		if(fields.contains(SETPWDMODULE_FIELDS_LABEL_CONFIRMPASSWORD)) { status_input_confirmPassword = STATUS_SUCCESS; }
		
		if(validateInputElement("input",FORM_SETPWD_INPUT_PASSWORD,status_input_password)) {
		   if(status_input_password.equalsIgnoreCase(STATUS_SUCCESS)) {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Password: "+Bootstrap.getSuccessIcon()+" - (Shown as Expected)", BOLD_NO));
		   } else {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Password: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
		   }
		} else {
		   isSuccessErrorIconsPassed = false;
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Password - (Not Shown as Expected)", BOLD_NO));
		}
										   
		if(validateInputElement("input",FORM_SETPWD_INPUT_CONFIRMMPASSWORD,status_input_confirmPassword)) {
			if(status_input_confirmPassword.equalsIgnoreCase(STATUS_SUCCESS)) {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Confirm Password: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", BOLD_NO));
			} else {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Confirm Password: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
			}	   
		} else {
		   isSuccessErrorIconsPassed = false;
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Confirm Password - (Not Shown as Expected)", BOLD_NO));
		}
	
		return Bootstrap.buildTableRow(new String[] {"Basic Form Validations (Success Error Icons)", successOrErrorBuilder.toString(), testCaseStatus(isSuccessErrorIconsPassed) }, isSuccessErrorIconsPassed);
		
	 }
	 
	/**  Required Stuff ::: End */
	
	public String checkEmptySetPwdForm() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		   String password = UserRegisterTestData.EMPTY_PASSSWORD;
		   String confirmPassword = UserRegisterTestData.EMPTY_CONFIRMPASSWORD;
		   
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SETPWD_ALERTMSG_MISSINGPWD.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] {}))); 
		
		return  Bootstrap.buildH5Heading("Set Password - Form Submit (Without Filling Form):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
				Bootstrap.buildTable(sb.toString());
	}
	
	public String checkSetPwdFormWithPassword() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		String password = UserRegisterTestData.DATA_VALID_PASSWORD;
		String confirmPassword = UserRegisterTestData.EMPTY_CONFIRMPASSWORD;
		 
		setPwdForm_reset_allFields();
		setPwdForm_add_password(password);
		setPwdForm_add_confirmPassword(confirmPassword);
		
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SETPWD_ALERTMSG_PWDCONFIRMPWDNOMATCH.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] { SETPWDMODULE_FIELDS_LABEL_PASSWORD }))); 
	   return  Bootstrap.buildH5Heading("Set Password - Form Submit (With Password):")+
			   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
			   Bootstrap.buildTable(sb.toString());
	}
	
	public String checkSetPwdFormWithConfirmPassword() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		String password = UserRegisterTestData.EMPTY_PASSSWORD;
		String confirmPassword = UserRegisterTestData.DATA_VALID_CONFIRMPASSWORD;
		
		setPwdForm_reset_allFields();
		setPwdForm_add_password(password);
		setPwdForm_add_confirmPassword(confirmPassword);
		
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SETPWD_ALERTMSG_MISSINGPWD.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
	   // Basic Validations
	   sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] { }))); 
		 
	   return  Bootstrap.buildH5Heading("Set Password - Form Submit (With Confirm Password):")+
			   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
			   Bootstrap.buildTable(sb.toString());
	}
	
	public String checkSetPwdFormWithInvalidPassword() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		String password = UserRegisterTestData.DATA_INVALID_PASSWORD;
		String confirmPassword = UserRegisterTestData.EMPTY_CONFIRMPASSWORD;
		
		setPwdForm_reset_allFields();
		setPwdForm_add_password(password);
		setPwdForm_add_confirmPassword(confirmPassword);
		
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SETPWD_ALERTMSG_MISSINGPWD.equalsIgnoreCase(alertResponse)) {
			isErrorMessagePassed = true;
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] {}))); 
		
	   return  Bootstrap.buildH5Heading("Set Password - Form Submit (With Invalid Password):")+
			   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
			   Bootstrap.buildTable(sb.toString());
	}
	
	public String checkSetPwdFormWithInvalidConfirmPassword() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		String password = UserRegisterTestData.EMPTY_PASSSWORD;
		String confirmPassword = UserRegisterTestData.DATA_INVALID_CONFIRMPASSWORD;
		
		setPwdForm_reset_allFields();
		setPwdForm_add_password(password);
		setPwdForm_add_confirmPassword(confirmPassword);
		
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SETPWD_ALERTMSG_MISSINGPWD.equalsIgnoreCase(alertResponse)) {
			isErrorMessagePassed = true;
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] {}))); 
		
	   return  Bootstrap.buildH5Heading("Set Password - Form Submit (With Invalid Confirm Password):")+
			   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
			   Bootstrap.buildTable(sb.toString());
	}
	
	public String checkSetPwdFormWithInvalidPasswordAndInvalidConfirmPassword() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		String password = UserRegisterTestData.DATA_INVALID_PASSWORD;
		String confirmPassword = UserRegisterTestData.DATA_INVALID_CONFIRMPASSWORD;
		
		setPwdForm_reset_allFields();
		setPwdForm_add_password(password);
		setPwdForm_add_confirmPassword(confirmPassword);
		
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SETPWD_ALERTMSG_MISSINGPWD.equalsIgnoreCase(alertResponse)) {
			isErrorMessagePassed = true;
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] {}))); 
		
	   return  Bootstrap.buildH5Heading("Set Password - Form Submit (With Invalid Password and Invalid Confirm Password):")+
			   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
			   Bootstrap.buildTable(sb.toString());
	}
	
	public String checkSetPwdFormWithValidPasswordAndInvalidConfirmPassword() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		String password = UserRegisterTestData.DATA_VALID_PASSWORD;
		String confirmPassword = UserRegisterTestData.DATA_INVALID_CONFIRMPASSWORD;
		
		setPwdForm_reset_allFields();
		setPwdForm_add_password(password);
		setPwdForm_add_confirmPassword(confirmPassword);
		
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SETPWD_ALERTMSG_PWDCONFIRMPWDNOMATCH.equalsIgnoreCase(alertResponse)) {
			isErrorMessagePassed = true;
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] { SETPWDMODULE_FIELDS_LABEL_PASSWORD }))); 
		
	   return  Bootstrap.buildH5Heading("Set Password - Form Submit (With Valid Password and Invalid Confirm Password):")+
			   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
			   Bootstrap.buildTable(sb.toString());
	}
	
	public String checkSetPwdFormWithInvalidPasswordAndValidConfirmPassword() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		String password = UserRegisterTestData.DATA_INVALID_PASSWORD;
		String confirmPassword = UserRegisterTestData.DATA_VALID_CONFIRMPASSWORD;
		
		setPwdForm_reset_allFields();
		setPwdForm_add_password(password);
		setPwdForm_add_confirmPassword(confirmPassword);
		
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SETPWD_ALERTMSG_MISSINGPWD.equalsIgnoreCase(alertResponse)) {
			isErrorMessagePassed = true;
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] {}))); 
		
	   return  Bootstrap.buildH5Heading("Set Password - Form Submit (With Invalid Password and Valid Confirm Password):")+
			   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
			   Bootstrap.buildTable(sb.toString());
	}
	
	public String checkSetPwdFormWithValidPasswordAndValidConfirmPassword() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		String password = UserRegisterTestData.DATA_VALID_PASSWORD;
		String confirmPassword = UserRegisterTestData.DATA_VALID_CONFIRMPASSWORD;
		
		setPwdForm_reset_allFields();
		setPwdForm_add_password(password);
		setPwdForm_add_confirmPassword(confirmPassword);
		
		WebElement setPwd_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SETPWD_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(setPwd_submit_webElement);
		
		String alertResponse = "";
		Boolean isErrorMessagePassed= false;
		   
		WebElement warningAlert = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SETPWD_ALERT_WARNERRORMSG);
		if(warningAlert!=null) { alertResponse = warningAlert.getText().substring(1).trim(); }
		
		if(FORM_SETPWD_ALERTMSG_ALLFIELDS.equalsIgnoreCase(alertResponse)) {
			isErrorMessagePassed = true;
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
			sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setPwdForm_basic_validateIcons(Arrays.asList(new String[] { SETPWDMODULE_FIELDS_LABEL_PASSWORD, SETPWDMODULE_FIELDS_LABEL_CONFIRMPASSWORD }))); 
		
	   return  Bootstrap.buildH5Heading("Set Password - Form Submit (With Valid Password and Valid Confirm Password):")+
			   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setPwdForm_testData_basic(password, confirmPassword) }, null))+
			   Bootstrap.buildTable(sb.toString());
	}
} 
