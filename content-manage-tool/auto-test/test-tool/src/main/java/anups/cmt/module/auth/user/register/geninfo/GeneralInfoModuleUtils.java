package anups.cmt.module.auth.user.register.geninfo;

import java.awt.AWTException;
import java.util.Arrays;
import java.util.List;

import org.openqa.selenium.Keys;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.Select;

import anups.cmt.automation.app.AutomationFactorySettings;
import anups.cmt.automation.report.Bootstrap;
import anups.cmt.module.auth.user.register.UserRegisterForm;
import anups.cmt.module.auth.user.register.UserRegisterFormUtils;
import anups.cmt.module.auth.user.register.UserRegisterTest;
import anups.cmt.module.auth.user.register.UserRegisterTestData;

public class GeneralInfoModuleUtils extends UserRegisterFormUtils {

 AutomationFactorySettings automationFactorySettings;
 
 public GeneralInfoModuleUtils() {
	automationFactorySettings = new AutomationFactorySettings(UserRegisterTest.getWebDriver());
 }
 
 public String genInfoForm_basic_validateIcons(List<String> fields) {
	Boolean isSuccessErrorIconsPassed= true;
	StringBuilder successOrErrorBuilder = new StringBuilder();
		
	String status_input_surName = STATUS_ERROR;
	if(fields.contains(GENERALINFOMODULE_FIELDS_LABEL_SURNAME)) { status_input_surName = STATUS_SUCCESS; }
	String status_input_name = STATUS_ERROR;
	if(fields.contains(GENERALINFOMODULE_FIELDS_LABEL_NAME)) { status_input_name = STATUS_SUCCESS; }
	String status_input_gender = STATUS_ERROR;
	if(fields.contains(GENERALINFOMODULE_FIELDS_LABEL_GENDER)) { status_input_gender = STATUS_SUCCESS; }
	String status_input_mobile = STATUS_ERROR;
	if(fields.contains(GENERALINFOMODULE_FIELDS_LABEL_MOBILE)) { status_input_mobile = STATUS_SUCCESS; }
	
	if(validateInputElement("input",FORM_GENINFO_INPUT_SURNAME,status_input_surName)) {
	   if(status_input_surName.equalsIgnoreCase(STATUS_SUCCESS)) {
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getSuccessIcon()+" - (Shown as Expected)", BOLD_NO));
	   } else {
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
	   }
	} else {
	   isSuccessErrorIconsPassed = false;
	   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname - (Not Shown as Expected)", BOLD_NO));
	}
									   
	if(validateInputElement("input",FORM_GENINFO_INPUT_NAME,status_input_name)) {
		if(status_input_name.equalsIgnoreCase(STATUS_SUCCESS)) {
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", BOLD_NO));
		} else {
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
		}	   
	} else {
	   isSuccessErrorIconsPassed = false;
	   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name - (Not Shown as Expected)", BOLD_NO));
	}
									   
	if(validateInputElement("select",FORM_GENINFO_SELECT_GENDER,status_input_gender)) {
		if(status_input_gender.equalsIgnoreCase(STATUS_SUCCESS)) {
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", BOLD_NO));
		} else {
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
		}
	} else {
		isSuccessErrorIconsPassed = false;
		successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender - (Not Shown as Expected)", BOLD_NO));
	}
									   
	if(validateInputElement("input",FORM_GENINFO_INPUT_MOBILE,status_input_mobile)) {
		if(status_input_mobile.equalsIgnoreCase(STATUS_SUCCESS)) {
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", BOLD_NO));
		} else {
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
		}
	} else {
		
		isSuccessErrorIconsPassed = false;
		if(fields.contains(GENERALINFOMODULE_FIELDS_LABEL_MOBILE_NOT2SHOW)) { isSuccessErrorIconsPassed = true; }
		successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile - (Not Shown as Expected)", BOLD_NO));
	}
	
	return Bootstrap.buildTableRow(new String[] {"Basic Form Validations (Success Error Icons)", successOrErrorBuilder.toString(), testCaseStatus(isSuccessErrorIconsPassed) }, isSuccessErrorIconsPassed);
	
 }
 
 public String genInfoForm_otpForm_validateIcons(Boolean isValidate) {
	 Boolean isSuccessErrorIconsPassed= true;
		StringBuilder successOrErrorBuilder = new StringBuilder();
		
	String status_input_otpcode = STATUS_ERROR;
	if(isValidate) { status_input_otpcode = STATUS_SUCCESS; }
	System.out.println("validateInputElement: "+validateInputElement("input",FORM_GENINFO_INPUT_OTPCODE,status_input_otpcode));
	if(validateInputElement("input",FORM_GENINFO_INPUT_OTPCODE,status_input_otpcode)) {
	 if(status_input_otpcode.equalsIgnoreCase(STATUS_SUCCESS)) {
	    successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("OTPCode: "+Bootstrap.getSuccessIcon()+" - (Shown as Expected)", BOLD_NO));
	 } else {
		successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("OTPCode: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
	 }
    } else {
		isSuccessErrorIconsPassed = false;
		successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("OTPCode - (Not Shown as Expected)", BOLD_NO));
    } 
  return Bootstrap.buildTableRow(new String[] {"OTP Form Validations (Success Error Icon)", successOrErrorBuilder.toString(), testCaseStatus(isSuccessErrorIconsPassed) }, isSuccessErrorIconsPassed);
 }
 
 private void genInfoForm_reset_allFields() {
  genInfoForm_reset_surName();
  genInfoForm_reset_name();
  genInfoForm_reset_gender();
  genInfoForm_reset_mobile();
 }

 private void genInfoForm_reset_surName() {
   WebElement genInfo_surName_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_GENINFO_INPUT_SURNAME);
   genInfo_surName_webElement.sendKeys(Keys.chord(Keys.CONTROL, "a"));
   genInfo_surName_webElement.sendKeys(Keys.BACK_SPACE);
 }
 
 private void genInfoForm_add_surName(String surName) {
   WebElement genInfo_surName_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_GENINFO_INPUT_SURNAME);
   genInfo_surName_webElement.sendKeys(surName);
 }
	
 private void genInfoForm_reset_name() {
   WebElement genInfo_name_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_GENINFO_INPUT_NAME);
   genInfo_name_webElement.sendKeys(Keys.chord(Keys.CONTROL, "a"));
   genInfo_name_webElement.sendKeys(Keys.BACK_SPACE);
 }
	
 private void genInfoForm_add_name(String name) {
   WebElement genInfo_name_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_GENINFO_INPUT_NAME);
   genInfo_name_webElement.sendKeys(name);
 }
	
 private void genInfoForm_reset_gender() {
   WebElement genInfo_gender_webElement = userRegisterWebElements.getSelectWebElement(UserRegisterForm.FORM_GENINFO_SELECT_GENDER);
   Select select = new Select(genInfo_gender_webElement);
   select.selectByIndex(0);
 }
	
 private void genInfoForm_add_gender(String gender) {
   WebElement genInfo_gender_webElement = userRegisterWebElements.getSelectWebElement(UserRegisterForm.FORM_GENINFO_SELECT_GENDER);
   Select select = new Select(genInfo_gender_webElement);
   select.selectByVisibleText(gender);
 }
	
 private void genInfoForm_reset_mobile() {
   WebElement genInfo_mobile_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_GENINFO_INPUT_MOBILE);
   genInfo_mobile_webElement.sendKeys(Keys.chord(Keys.CONTROL, "a"));
   genInfo_mobile_webElement.sendKeys(Keys.BACK_SPACE);
 }
	
 private void genInfoForm_add_mobile(String mobile) {
   WebElement genInfo_mobile_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_GENINFO_INPUT_MOBILE);
   genInfo_mobile_webElement.sendKeys(mobile);
 }
 
 private void genInfoForm_reset_otpcode() {
   WebElement genInfo_otpcode_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_GENINFO_INPUT_OTPCODE);
   genInfo_otpcode_webElement.sendKeys(Keys.chord(Keys.CONTROL, "a"));
   genInfo_otpcode_webElement.sendKeys(Keys.BACK_SPACE);
 }
 
 private void genInfoForm_add_otpcode(String otpcode) {
   WebElement genInfo_otpcode_webElement = userRegisterWebElements.getInputWebElement(UserRegisterForm.FORM_GENINFO_INPUT_OTPCODE);
   genInfo_otpcode_webElement.sendKeys(otpcode);
 }
	
 private String genInfoForm_testData_basic(String surName, String name, String gender, String mobileCode, String mobile) {
   StringBuilder testData = new StringBuilder();
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("SurName: ")+surName, false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Name: ")+name, false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Gender: ")+gender, false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile-code: ")+mobileCode+" (Default)", false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile: ")+mobile, false));
   return testData.toString();
 }
 
 private String genInfoForm_testData_otpcode(String otpcode) {
	   StringBuilder testData = new StringBuilder();
			testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("OTPCode: ")+otpcode, false));
	   return testData.toString();
 }
 
 public String checkEmptyGenInfoForm() throws InterruptedException, AWTException {
	 
   StringBuilder sb = new StringBuilder();
	
   String surName = UserRegisterTestData.EMPTY_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.EMPTY_GENDER;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.EMPTY_MOBILE;
   
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
			   
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
	   
   if(FORM_GENINFO_ALERTMSG_EMPTYFORM.equalsIgnoreCase(alertResponse)) {
	 isErrorMessagePassed = true;
	 sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	 sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] {}))); 
  } else {
	 sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
  }
			   
  return  Bootstrap.buildH5Heading("General Info - Form Submit (Without Filling Form):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
 }

 public String checkGenInfoFormWithSurName() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
		   
   String surName = UserRegisterTestData.DATA_VALID_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.EMPTY_GENDER;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.EMPTY_MOBILE;
		   
   genInfoForm_reset_allFields();
   genInfoForm_add_surName(surName);
		   	   
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
   
   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTSURNAME.equalsIgnoreCase(alertResponse)) {
	   isErrorMessagePassed = true;
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	   sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] {GENERALINFOMODULE_FIELDS_LABEL_SURNAME}))); 	   
   } else {
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }

   return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
 }
	
 public String checkGenInfoFormWithName() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
		   
   String surName = UserRegisterTestData.EMPTY_SURNAME;
   String name = UserRegisterTestData.DATA_VALID_NAME;
   String gender = UserRegisterTestData.EMPTY_GENDER;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.EMPTY_MOBILE;
		   
   genInfoForm_reset_allFields();
   genInfoForm_add_name(name);
		   	   
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
		   
   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTNAME.equalsIgnoreCase(alertResponse)) {
	isErrorMessagePassed = true;
	sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] {GENERALINFOMODULE_FIELDS_LABEL_NAME}))); 	    
   } else {
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }

   return Bootstrap.buildH5Heading("General Info - Form Submit (With Name):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
 }
	
 public String checkGenInfoFormWithGender() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
		   
   String surName = UserRegisterTestData.EMPTY_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.DATA_VALID_GENDER_MALE;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.EMPTY_MOBILE;
		   
   genInfoForm_reset_allFields();
   genInfoForm_add_gender(gender);
		   
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
		   
   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTGENDER.equalsIgnoreCase(alertResponse)) {
	  isErrorMessagePassed = true;
	  sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	  sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] {GENERALINFOMODULE_FIELDS_LABEL_GENDER}))); 	
   } else {
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
		   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With Gender):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile)}, null))+
		  Bootstrap.buildTable(sb.toString());
 }
	
 public String checkGenInfoFormWithNewMobile() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
		   
   String surName = UserRegisterTestData.EMPTY_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.EMPTY_GENDER;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.DATA_VALID_MOBILE_NEW;
		   
   genInfoForm_reset_allFields();
   genInfoForm_add_mobile(mobile);
		   
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;

   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTMOBILE.equalsIgnoreCase(alertResponse)) {
	 isErrorMessagePassed = true;
	 sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	 sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] {GENERALINFOMODULE_FIELDS_LABEL_MOBILE}))); 	
   } else {
	  sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With New Mobile Number):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
 }
	
 public String checkGenInfoFormWithRegisterMobile() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
		   
   String surName = UserRegisterTestData.EMPTY_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.EMPTY_GENDER;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.DATA_VALID_MOBILE_EXIST;
		   
   genInfoForm_reset_allFields();
   genInfoForm_add_mobile(mobile);
		   
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;

   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHREGISTERMOBILE.equalsIgnoreCase(alertResponse)) {
	  isErrorMessagePassed = true;
	  sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	  sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] {}))); 	
   } else {
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
	
   return Bootstrap.buildH5Heading("General Info - Form Submit (With Registered Mobile Number):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
 }
	
 public String checkGenInfoFormWithSurNameAndName() throws InterruptedException, AWTException {
	StringBuilder sb = new StringBuilder(); 
		   
	String surName = UserRegisterTestData.DATA_VALID_SURNAME;
	String name = UserRegisterTestData.DATA_VALID_NAME;
	String gender = UserRegisterTestData.EMPTY_GENDER;
	String mobileCode = "+91";
	String mobile = UserRegisterTestData.EMPTY_MOBILE;
		   
	genInfoForm_reset_allFields();
	genInfoForm_add_surName(surName);
	genInfoForm_add_name(name);
		   
	WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
	automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
	String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
	Boolean isErrorMessagePassed= false;
		   
	if(FORM_GENINFO_ALERTMSG_WITHSURNAMEANDNAME.equalsIgnoreCase(alertResponse)) {
		isErrorMessagePassed = true;
		sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] {GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME}))); 	
	} else {
		sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	}
		   
	return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName and Name):")+
		   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		   Bootstrap.buildTable(sb.toString());
  }
	
 public String checkGenInfoFormWithNameAndGender() throws InterruptedException, AWTException {
	StringBuilder sb = new StringBuilder(); 
		   
	String surName = UserRegisterTestData.EMPTY_SURNAME;
	String name = UserRegisterTestData.DATA_VALID_NAME;
	String gender = UserRegisterTestData.DATA_VALID_GENDER_MALE;
	String mobileCode = "+91";
	String mobile = UserRegisterTestData.EMPTY_MOBILE;
		   
	genInfoForm_reset_allFields();
	genInfoForm_add_name(name);
	genInfoForm_add_gender(gender); 
	
	WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
	automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
	String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
	Boolean isErrorMessagePassed= false;
		   
	if(FORM_GENINFO_ALERTMSG_WITHNAMEANDGENDER.equalsIgnoreCase(alertResponse)) {
		isErrorMessagePassed = true;
		sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] {GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER}))); 	
	} else {
		sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	}
		   
	return Bootstrap.buildH5Heading("General Info - Form Submit (With Name and Gender):")+
		   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		   Bootstrap.buildTable(sb.toString());
  }
 
 public String checkGenInfoFormWithGenderAndMobile() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
			   
   String surName = UserRegisterTestData.EMPTY_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.DATA_VALID_GENDER_FEMALE;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.DATA_VALID_MOBILE_NEW;
			   
   genInfoForm_reset_allFields();
   genInfoForm_add_gender(gender); 
   genInfoForm_add_mobile(mobile);
		
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
			   
   if(FORM_GENINFO_ALERTMSG_WITHGENDERANDMOBILE.equalsIgnoreCase(alertResponse)) {
	 isErrorMessagePassed = true;
	 sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	 sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_GENDER, GENERALINFOMODULE_FIELDS_LABEL_MOBILE })));    
   } else {
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
			   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With Gender and Mobile Number):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
 }

 public String checkGenInfoFormWithSurNameAndGender() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
			   
   String surName = UserRegisterTestData.DATA_VALID_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.DATA_VALID_GENDER_MALE;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.EMPTY_MOBILE;
			   
   genInfoForm_reset_allFields();
   genInfoForm_add_surName(surName);
   genInfoForm_add_gender(gender); 
		
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
			   
   if(FORM_GENINFO_ALERTMSG_WITHSURNAMEANDGENDER.equalsIgnoreCase(alertResponse)) {
	 isErrorMessagePassed = true;
	 sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	 sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER }))); 
   } else {
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
			   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName and Gender):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
  }

 public String checkGenInfoFormWithSurNameAndMobile() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
				   
   String surName = UserRegisterTestData.DATA_VALID_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.EMPTY_GENDER;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.DATA_VALID_MOBILE_NEW;
				   
   genInfoForm_reset_allFields();
   genInfoForm_add_surName(surName);
   genInfoForm_add_mobile(mobile); 
			
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
				   
   if(FORM_GENINFO_ALERTMSG_WITHSURNAMEANDMOBILE.equalsIgnoreCase(alertResponse)) {
	 isErrorMessagePassed = true;
	 sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	 sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_MOBILE })));    
   } else {
	  sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
				   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName and Mobile Number):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
  }

 public String checkGenInfoFormWithNameAndMobile() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
					   
   String surName = UserRegisterTestData.EMPTY_SURNAME;
   String name = UserRegisterTestData.DATA_VALID_NAME;
   String gender = UserRegisterTestData.EMPTY_GENDER;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.DATA_VALID_MOBILE_NEW;
					   
   genInfoForm_reset_allFields();
   genInfoForm_add_name(name);
   genInfoForm_add_mobile(mobile); 
				
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
					   
   if(FORM_GENINFO_ALERTMSG_WITHNAMEANDMOBILE.equalsIgnoreCase(alertResponse)) {
	 isErrorMessagePassed = true;
	 sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	 sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_MOBILE })));   		   
   } else {
	  sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
					   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With Name and Mobile Number):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
  }
 
 public String checkGenInfoFormWithSurNameNameAndGender() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
						   
   String surName = UserRegisterTestData.DATA_VALID_SURNAME;
   String name = UserRegisterTestData.DATA_VALID_NAME;
   String gender = UserRegisterTestData.DATA_VALID_GENDER_MALE;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.EMPTY_MOBILE;
						   
   genInfoForm_reset_allFields();
   genInfoForm_add_surName(surName);
   genInfoForm_add_name(name);
   genInfoForm_add_gender(gender); 
					
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
						   
   if(FORM_GENINFO_ALERTMSG_WITHSURNAMENAMEANDGENDER.equalsIgnoreCase(alertResponse)) {
	 isErrorMessagePassed = true;
	 sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)",  testCaseStatus(isErrorMessagePassed)  }, isErrorMessagePassed));
	 sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER })));		   
   } else {
	 sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)",  testCaseStatus(isErrorMessagePassed)  }, isErrorMessagePassed));
   }
						   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName, Name and Mobile Number):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
	      Bootstrap.buildTable(sb.toString());
 }
	 
 public String checkGenInfoFormWithNameGenderAndMobile() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
							   
   String surName = UserRegisterTestData.EMPTY_SURNAME;
   String name = UserRegisterTestData.DATA_VALID_NAME;
   String gender = UserRegisterTestData.DATA_VALID_GENDER_MALE;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.DATA_VALID_MOBILE_NEW;
							   
   genInfoForm_reset_allFields();
   genInfoForm_add_name(name);
   genInfoForm_add_gender(gender); 
   genInfoForm_add_mobile(mobile); 
   
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
							   
   if(FORM_GENINFO_ALERTMSG_WITHNAMEGENDERANDMOBILE.equalsIgnoreCase(alertResponse)) {
	   isErrorMessagePassed = true;
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	   sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER,GENERALINFOMODULE_FIELDS_LABEL_MOBILE })));		   				   
    } else {
	   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	}
							   
	return Bootstrap.buildH5Heading("General Info - Form Submit (With Name, Gender and Mobile Number):")+
		   Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		   Bootstrap.buildTable(sb.toString());
  }

 public String checkGenInfoFormWithSurNameGenderAndMobile() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
								   
   String surName = UserRegisterTestData.DATA_VALID_SURNAME;
   String name = UserRegisterTestData.EMPTY_NAME;
   String gender = UserRegisterTestData.DATA_VALID_GENDER_MALE;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.DATA_VALID_MOBILE_NEW;
								   
   genInfoForm_reset_allFields();
   genInfoForm_add_surName(surName);
   genInfoForm_add_gender(gender); 
   genInfoForm_add_mobile(mobile); 
	   
   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
   Boolean isErrorMessagePassed= false;
								   
   if(FORM_GENINFO_ALERTMSG_WITHSURNAMEGENDERANDMOBILE.equalsIgnoreCase(alertResponse)) {
	 isErrorMessagePassed = true;
	 sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	 sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER,GENERALINFOMODULE_FIELDS_LABEL_MOBILE })));		   				      
   } else {
	  sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
								   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName, Gender and Mobile Number):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
  }

 public String checkGenInfoFormWithSurNameNameAndMobile() throws InterruptedException, AWTException {
  StringBuilder sb = new StringBuilder(); 
							   
  String surName = UserRegisterTestData.DATA_VALID_SURNAME;
  String name = UserRegisterTestData.DATA_VALID_NAME;
  String gender = UserRegisterTestData.EMPTY_GENDER;
  String mobileCode = "+91";
  String mobile = UserRegisterTestData.DATA_VALID_MOBILE_NEW;
							   
  genInfoForm_reset_allFields();
  genInfoForm_add_surName(surName);
  genInfoForm_add_name(name);
  genInfoForm_add_mobile(mobile); 
						
  WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
  automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
  Thread.sleep(3000);
  String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
  Boolean isErrorMessagePassed= false;
							   
  if(FORM_GENINFO_ALERTMSG_WITHSURNAMENAMEANDMOBILE.equalsIgnoreCase(alertResponse)) {	
	  isErrorMessagePassed = true;
	  sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
	  sb.append(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_MOBILE })));		   			   
   } else {
	  sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
   }
							   
   return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName, Name and Mobile Number):")+
		  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null))+
		  Bootstrap.buildTable(sb.toString());
 }

 public String checkGenInfoFormWithAllFields() throws InterruptedException, AWTException {
   StringBuilder sb = new StringBuilder(); 
								   
   String surName = UserRegisterTestData.DATA_VALID_SURNAME;
   String name = UserRegisterTestData.DATA_VALID_NAME;
   String gender = UserRegisterTestData.DATA_VALID_GENDER_MALE;
   String mobileCode = "+91";
   String mobile = UserRegisterTestData.DATA_VALID_MOBILE_NEW;
								   
   genInfoForm_reset_allFields();
   genInfoForm_add_surName(surName);
   genInfoForm_add_name(name);
   genInfoForm_add_gender(gender);
   genInfoForm_add_mobile(mobile); 

   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
   automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
   Thread.sleep(3000);
   WebElement warningAlert = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg");
   
   String alertResponse = "";
   if(warningAlert!=null) { alertResponse = warningAlert.getText().substring(1).trim(); }
   
   Boolean isErrorAllFieldsPassed= false;
								   
   if(FORM_GENINFO_ALERTMSG_ALLFIELDS.equalsIgnoreCase(alertResponse)) {	
	    isErrorAllFieldsPassed = true;
	    sb.append(Bootstrap.buildH5Heading("General Info - Form Submit (With All Fields):"));
	    sb.append(Bootstrap.buildHDiv("a) With All Fields"));
	    sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile) }, null)));
		sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message","-", testCaseStatus(isErrorAllFieldsPassed) }, isErrorAllFieldsPassed)));
	    sb.append(Bootstrap.buildTable(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER, 
	    				GENERALINFOMODULE_FIELDS_LABEL_MOBILE }))));
	    
	    /* Check UI: */
	    sb.append(Bootstrap.buildTable(genInfoForm_uiTest_mobileOTPForm()));
		   
	    /* Empty OtpCode: */
	    sb.append(Bootstrap.buildHDiv("b) With Empty OTP Code"));
	    
	    String otpcode = UserRegisterTestData.EMPTY_OTPCODE;
		genInfoForm_add_otpcode(otpcode); 

		WebElement genInfo_mobileOTPValidateBtn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEOTPVALIDATE);
		automationFactorySettings.singleClickButton(genInfo_mobileOTPValidateBtn_webElement);
		Thread.sleep(3000);
		
		// Error Message
		warningAlert = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg");
		if(warningAlert!=null) { alertResponse = warningAlert.getText().substring(1).trim(); }

		Boolean isEmptyOTPCodePassed = false;
		if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTOTPCODE.equalsIgnoreCase(alertResponse)) {	
			isEmptyOTPCodePassed = true;
			sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown as Expected)", testCaseStatus(isEmptyOTPCodePassed) }, isEmptyOTPCodePassed)));
		} else {
			sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isEmptyOTPCodePassed) }, isEmptyOTPCodePassed)));
		}
		
		StringBuilder testData = new StringBuilder();
		  testData.append(genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile));
		  testData.append(genInfoForm_testData_otpcode(otpcode));
		  
		sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), testData.toString() }, null)));
		  
		// Success or Error Icons 
		sb.append(Bootstrap.buildTable(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER, GENERALINFOMODULE_FIELDS_LABEL_MOBILE }))));		   			   
		sb.append(Bootstrap.buildTable(genInfoForm_otpForm_validateIcons(false)));
		
		/* Change Verify Btn */
	    sb.append(Bootstrap.buildHDiv("c) With Change Verify Button"));
	   
	    WebElement genInfo_mobileChangeBtn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILECHANGE);
		automationFactorySettings.singleClickButton(genInfo_mobileChangeBtn_webElement);
		Thread.sleep(6000);
		
		// TestData
		  testData = new StringBuilder();
		  testData.append(genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile));
		  testData.append(genInfoForm_testData_otpcode(otpcode));
		  
		sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), testData.toString() }, null)));
		
		// Error Message
		warningAlert = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg");
		if(warningAlert!=null) { alertResponse = warningAlert.getText().substring(1).trim(); }
		else { alertResponse = ""; }
		
		Boolean isChangeBtnPassed = false;
		if(FORM_GENINFO_ALERTMSG_ALLFIELDS.equalsIgnoreCase(alertResponse)) {	
			isChangeBtnPassed = true;
			sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown as Expected)", testCaseStatus(isChangeBtnPassed) }, isChangeBtnPassed)));
		} else {
			sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isChangeBtnPassed) }, isChangeBtnPassed)));
		}
		
		// Success or Error Icons 
		sb.append(Bootstrap.buildTable(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER, GENERALINFOMODULE_FIELDS_LABEL_MOBILE_NOT2SHOW }))));		   			   
	
		// UI Testing
		sb.append(Bootstrap.buildTable(genInfoForm_uiTest_mobileOTPForm()));
		
		/* Verify Btn */
		sb.append(Bootstrap.buildHDiv("d) Add Mobile Number and Click Verify Button "));
		
		genInfoForm_add_mobile(mobile); 
		genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
		automationFactorySettings.singleClickButton(genInfo_mobileVerifyBrn_webElement);
		Thread.sleep(3000);
		
		// Test Data
		  testData = new StringBuilder();
		  testData.append(genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile));
		  testData.append(genInfoForm_testData_otpcode(otpcode));
		  
		sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), testData.toString() }, null)));
		
		// Error Message
		warningAlert = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg");
		if(warningAlert!=null) { alertResponse = warningAlert.getText().substring(1).trim(); }
		else { alertResponse = ""; }
				
		Boolean isVerifyBtnPassed = false;
		if(FORM_GENINFO_ALERTMSG_ALLFIELDS.equalsIgnoreCase(alertResponse)) {	
		   isVerifyBtnPassed = true;
		   sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown as Expected)", testCaseStatus(isVerifyBtnPassed) }, isVerifyBtnPassed)));
		} else {
			sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isVerifyBtnPassed) }, isVerifyBtnPassed)));
		}
				
		// Success or Error Icons 
		sb.append(Bootstrap.buildTable(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER, GENERALINFOMODULE_FIELDS_LABEL_MOBILE }))));		   			   
			
		// UI Testing
		sb.append(Bootstrap.buildTable(genInfoForm_uiTest_mobileOTPForm()));
		
		/* With Invalid OTP Code */
		sb.append(Bootstrap.buildHDiv("e) With Invalid OTP Code "));
		otpcode = UserRegisterTestData.DATA_INVALID_OTPCODE;
		genInfoForm_reset_otpcode();
		genInfoForm_add_otpcode(otpcode); 
		
		genInfo_mobileOTPValidateBtn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEOTPVALIDATE);
		automationFactorySettings.singleClickButton(genInfo_mobileOTPValidateBtn_webElement);
		Thread.sleep(3000);
		
		// Test Data
		 testData = new StringBuilder();
		 testData.append(genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile));
		 testData.append(genInfoForm_testData_otpcode(otpcode));
		  
		sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), testData.toString() }, null)));
		
		// Check for Alert Message
		warningAlert = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg");
		if(warningAlert!=null) { alertResponse = warningAlert.getText().substring(1).trim(); }
		
		Boolean isInvalidOTPCodePassed = false;
		if(FORM_GENINFO_ALERTMSG_PROVIDEVALIDOTPCODE.equalsIgnoreCase(alertResponse)) {
		   isInvalidOTPCodePassed = true;
		   sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown as Expected)", testCaseStatus(isInvalidOTPCodePassed) }, isInvalidOTPCodePassed)));
		} else {
		   sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isInvalidOTPCodePassed) }, isInvalidOTPCodePassed)));
		}
		
		// Success or Error Icons 
		sb.append(Bootstrap.buildTable(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER, GENERALINFOMODULE_FIELDS_LABEL_MOBILE }))));		   			   
		sb.append(Bootstrap.buildTable(genInfoForm_otpForm_validateIcons(false)));
		
		
		/* With Valid OTP Code */
		sb.append(Bootstrap.buildHDiv("f) With Valid OTP Code "));
		otpcode = UserRegisterTestData.DATA_VALID_OTPCODE;
		genInfoForm_reset_otpcode();
		genInfoForm_add_otpcode(otpcode); 
		
		genInfo_mobileOTPValidateBtn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEOTPVALIDATE);
		automationFactorySettings.singleClickButton(genInfo_mobileOTPValidateBtn_webElement);
		Thread.sleep(3000);
		
		// Test Data
		 testData = new StringBuilder();
		 testData.append(genInfoForm_testData_basic(surName, name, gender, mobileCode, mobile));
		 testData.append(genInfoForm_testData_otpcode(otpcode));
		 
		sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), testData.toString() }, null)));
				
		// Check for Alert Message
		warningAlert = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg");
		if(warningAlert!=null) { alertResponse = warningAlert.getText().substring(1).trim(); }
				
		Boolean isValidOTPCodePassed = false;
		if(FORM_GENINFO_ALERTMSG_VAIDATEDOTPCODE.equalsIgnoreCase(alertResponse)) {
		   isValidOTPCodePassed = true;
		   sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Success Message",alertResponse+" (Shown as Expected)", testCaseStatus(isValidOTPCodePassed) }, isValidOTPCodePassed)));
		} else {
		   sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Success Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isValidOTPCodePassed) }, isValidOTPCodePassed)));
		}
				
		// Success or Error Icons 
		sb.append(Bootstrap.buildTable(genInfoForm_basic_validateIcons(Arrays.asList(new String[] { GENERALINFOMODULE_FIELDS_LABEL_SURNAME, GENERALINFOMODULE_FIELDS_LABEL_NAME, GENERALINFOMODULE_FIELDS_LABEL_GENDER, GENERALINFOMODULE_FIELDS_LABEL_MOBILE }))));		   			   
		sb.append(Bootstrap.buildTable(genInfoForm_otpForm_validateIcons(true)));
				
				
		/* Test Next Button */
		sb.append(Bootstrap.buildHDiv("g) Test Next Button "));
		WebElement genInfo_nextBtn_webElement = userRegisterWebElements.getDivButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_FORMMOVENEXT);
		automationFactorySettings.singleClickButton(genInfo_nextBtn_webElement);
		Thread.sleep(3000);
		
		// UI Testing
		
		
   } else {
	  sb.append(Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", testCaseStatus(isErrorAllFieldsPassed) }, isErrorAllFieldsPassed)));
   }
								   
   return sb.toString();
  }
 
 private String genInfoForm_uiTest_mobileOTPForm() {
	Boolean checkMobileInputDisabled = false;
	String mobileInputDisabled = userRegisterWebElements.getInputWebElement(FORM_GENINFO_INPUT_MOBILE).getAttribute("disabled");
	if(mobileInputDisabled!=null) {
		checkMobileInputDisabled = mobileInputDisabled.equalsIgnoreCase("true");
	}
    Boolean checkMobileVerifyBtn = userRegisterWebElements.getButtonWebElement(FORM_GENINFO_BUTTON_MOBILEVERIFY).isDisplayed();
    Boolean checkMobileChangeBtn = userRegisterWebElements.getButtonWebElement(FORM_GENINFO_BUTTON_MOBILECHANGE).isDisplayed();
    Boolean checkOTPCodeInput = userRegisterWebElements.getInputWebElement(FORM_GENINFO_INPUT_OTPCODE).isDisplayed();
	Boolean checkOTPCodeValidateBtn = userRegisterWebElements.getButtonWebElement(FORM_GENINFO_BUTTON_MOBILEOTPVALIDATE).isDisplayed();
	
	StringBuilder uiTest = new StringBuilder("After Submit,");
	Boolean uiTestCaseStatus = false;
	String[] uiTestPoints = new String[5];
	
	if(checkMobileInputDisabled) { 
		uiTestPoints[0]="Is Mobile Input Disabled ? - "+Bootstrap.getSuccessIcon(); 
	} else { 
		uiTestPoints[0]="Is Mobile Input Disabled ? - "+Bootstrap.getErrorIcon(); 
	}
		
	if(checkMobileVerifyBtn) { 
		uiTestPoints[1]="Is Verify Button shown ? - "+Bootstrap.getSuccessIcon(); 
	} else { 
		uiTestPoints[1]="Is Verify Button shown ? - "+Bootstrap.getErrorIcon(); 
	}
		
	if(checkMobileChangeBtn) { uiTestPoints[2]="Is Change Button shown ? - "+Bootstrap.getSuccessIcon(); }
	else { uiTestPoints[2]="Is Change Button shown ? - "+Bootstrap.getErrorIcon(); }
		
	if(checkOTPCodeInput) { uiTestPoints[3]="Is OTP Code Input shown ? - "+Bootstrap.getSuccessIcon(); }
	else { uiTestPoints[3]="Is OTP Code Input shown ? - "+Bootstrap.getErrorIcon(); }
		
	if(checkOTPCodeValidateBtn) { uiTestPoints[4]="Is OTP Code Validate Button shown ? - "+Bootstrap.getSuccessIcon(); }
	else { uiTestPoints[4]="Is OTP Code Validate Button shown ? - "+Bootstrap.getErrorIcon(); }
		
	return Bootstrap.buildTableRow(new String[] {"UI Testing", uiTest.append(Bootstrap.getPoints(uiTestPoints)).toString(), testCaseStatus(uiTestCaseStatus) }, uiTestCaseStatus);		
 }
  
 
 public static void main(String args[]) {
	 String[] forms = {"surName","Name","Gender","MobCode","Mobile"};
	 for(int index=0;index<forms.length;index++) { 
	 
		 int start = index;
		 int last = forms.length-(index+1);
		 int middle = forms.length/2;
		 
		 System.out.println(start+". "+forms[start]);
		 System.out.println(last+". "+forms[last]);
		 System.out.println(index);
		 if(index==middle) {
			 break;
		 }
	 }
	 System.out.println(forms);
 }
 
}
