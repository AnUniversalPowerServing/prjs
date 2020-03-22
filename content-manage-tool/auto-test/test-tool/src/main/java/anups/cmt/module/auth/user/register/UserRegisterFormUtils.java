package anups.cmt.module.auth.user.register;

import java.awt.AWTException;
import java.awt.List;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.LinkedHashMap;
import java.util.LinkedList;

import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.Select;

import anups.cmt.automation.app.AutomationBase;
import anups.cmt.automation.report.Bootstrap;

public class UserRegisterFormUtils extends AutomationBase implements UserRegisterForm {
 
	WebDriver driver;
	
	UserRegisterWebElements userRegisterWebElements;
	
	String[] BADGE_FORMELEMENTS_GENINFO = {"Surname","Name","Gender","Mobile","Mobile-code","MobileVerifyButton"};
	String[] BADGE_FORMELEMENTS_SETPWD = {"Password","ConfirmPassword","Next to Security Questions"};
	String[] BADGE_FORMELEMENTS_SECURITYQ = {"SecurityQuestion#1","Answer1","SecurityQuestion#2","Answer2","SecurityQuestion#3","Answer3","Create Account Button"};
	
	public UserRegisterFormUtils() {
		super("http://localhost/prjs/content-manage-tool/web-tool/kv-forms.php");
		driver = super.getDriver();
		userRegisterWebElements = new UserRegisterWebElements(driver);
	}
	
	private String checkBadgeFormFields(int badge) {
		Boolean rowStatus = true;
		String status = Bootstrap.buildLabel("PASSED","success");
		LinkedHashMap<String, Boolean> allFields = listOfDisplayedFields();
		StringBuilder bootstrap_reqFieldsCol = new StringBuilder();
		String[] formFields = {};
		
		if(badge==1) { formFields = BADGE_FORMELEMENTS_GENINFO; }
		else if(badge==2) { formFields = BADGE_FORMELEMENTS_SETPWD; }
		else if(badge==3) { formFields = BADGE_FORMELEMENTS_SECURITYQ; }
		for(String field : formFields) {
			if(allFields.get(field)) {
				bootstrap_reqFieldsCol.append(Bootstrap.buildSimpleDiv(field +" (Shown and Expected)",false));
			} else {
				rowStatus = false; // Failed
				status = Bootstrap.buildLabel("FAILED","danger");
				bootstrap_reqFieldsCol.append(Bootstrap.buildHglError(field +" (Not Shown and Expected)"));
			}
		}
		return Bootstrap.buildTableRow(new String[] {"Form Fields Available", bootstrap_reqFieldsCol.toString(), status}, rowStatus);
	}
	
	private LinkedHashMap<String, Boolean> listOfDisplayedFields() {
		LinkedHashMap<String, Boolean> badgeGenInfoForm = new LinkedHashMap<String, Boolean>();
		badgeGenInfoForm.put("Surname", userRegisterWebElements.getInputWebElement(FORM_GENINFO_INPUT_SURNAME).isDisplayed());
		badgeGenInfoForm.put("Name", userRegisterWebElements.getInputWebElement(FORM_GENINFO_INPUT_NAME).isDisplayed());
		badgeGenInfoForm.put("Gender", userRegisterWebElements.getSelectWebElement(FORM_GENINFO_SELECT_GENDER).isDisplayed());
		badgeGenInfoForm.put("Mobile", userRegisterWebElements.getInputWebElement(FORM_GENINFO_INPUT_MOBILE).isDisplayed());
		badgeGenInfoForm.put("Mobile-code", userRegisterWebElements.getDropdownWebElement(FORM_GENINFO_DROPDOWN_MOBILECODE).isDisplayed());
		badgeGenInfoForm.put("MobileVerifyButton", userRegisterWebElements.getButtonWebElement(FORM_GENINFO_BUTTON_MOBILEVERIFY).isDisplayed());
		badgeGenInfoForm.put("Password", userRegisterWebElements.getInputWebElement(FORM_SETPWD_INPUT_PASSWORD).isDisplayed());
		badgeGenInfoForm.put("ConfirmPassword", userRegisterWebElements.getInputWebElement(FORM_SETPWD_INPUT_CONFIRMMPASSWORD).isDisplayed());
		badgeGenInfoForm.put("Next to Security Questions", userRegisterWebElements.getButtonWebElement(FORM_SETPWD_BUTTON_FORMMOVENEXT).isDisplayed());
		badgeGenInfoForm.put("SecurityQuestion#1", userRegisterWebElements.getSelectWebElement(FORM_SECURITYQ_INPUT_SQ1).isDisplayed());
		badgeGenInfoForm.put("Answer1", userRegisterWebElements.getInputWebElement(FORM_SECURITYQ_INPUT_A1).isDisplayed());
		badgeGenInfoForm.put("SecurityQuestion#2", userRegisterWebElements.getSelectWebElement(FORM_SECURITYQ_INPUT_SQ2).isDisplayed());
		badgeGenInfoForm.put("Answer2", userRegisterWebElements.getInputWebElement(FORM_SECURITYQ_INPUT_A2).isDisplayed());
		badgeGenInfoForm.put("SecurityQuestion#3", userRegisterWebElements.getSelectWebElement(FORM_SECURITYQ_INPUT_SQ3).isDisplayed());
		badgeGenInfoForm.put("Answer3", userRegisterWebElements.getInputWebElement(FORM_SECURITYQ_INPUT_A3).isDisplayed());
		badgeGenInfoForm.put("Create Account Button", userRegisterWebElements.getButtonWebElement(FORM_SECURITYQ_BUTTON_CREATEACCOUNT).isDisplayed());
		return badgeGenInfoForm;
	}
	
	private String badge_genInfo_title() {
	  String title =  "BADGE_GENINFO_TITLE_NOT_SHOWN";
	  boolean isPassed = false;
	  String status = Bootstrap.buildLabel("FAILED", "danger");
	  WebElement genInfoDiv_badgeheading_WebElement = userRegisterWebElements.getBadgeHeadingWebElement(UserRegisterForm.BADGE_GENINFO_DIVISION);
	  if(BADGE_GENINFO_TITLE.equalsIgnoreCase(genInfoDiv_badgeheading_WebElement.getText().trim())) { 
		  title = BADGE_GENINFO_TITLE;isPassed= true;status=Bootstrap.buildLabel("PASSED", "success");
	   }
	  return Bootstrap.buildTableRow(new String[] { "Badge Title",title, status}, isPassed);
	}
	
	private String badge_setPassword_title() {
	  String title =  "BADGE_SETPWD_TITLE_NOT_SHOWN";
	  boolean isPassed = false;
	  String status = Bootstrap.buildLabel("FAILED", "danger");
	  WebElement setPassword_badgeheading_WebElement = userRegisterWebElements.getBadgeHeadingWebElement(UserRegisterForm.BADGE_SETPWD_DIVISION);
      if(BADGE_SETPWD_TITLE.equalsIgnoreCase(setPassword_badgeheading_WebElement.getText().trim())) {  
    	 title = BADGE_SETPWD_TITLE;isPassed= true;status=Bootstrap.buildLabel("PASSED", "success");
      }
      return Bootstrap.buildTableRow(new String[] { "Badge Title",title, status}, isPassed);
	}
	
	private String badge_securityQ_title() {
	  String title =  "BADGE_SECURITYQ_TITLE_NOT_SHOWN";
	  boolean isPassed = false;
	  String status = Bootstrap.buildLabel("FAILED", "danger");
	  WebElement securityQ_badgeheading_WebElement = userRegisterWebElements.getBadgeHeadingWebElement(UserRegisterForm.BADGE_SECURITYQ_DIVISION);
	  if(BADGE_SECURITYQ_TITLE.equalsIgnoreCase(securityQ_badgeheading_WebElement.getText().trim())) {  
		 title = BADGE_SECURITYQ_TITLE;isPassed= true;status=Bootstrap.buildLabel("PASSED", "success");
	  }
	  return Bootstrap.buildTableRow(new String[] { "Badge Title",title, status}, isPassed);
	}
	
	public String loadBadge(String title, int index) {
		StringBuilder sb = new StringBuilder(Bootstrap.buildH5Heading(title));
		if(index==1) { sb.append(badge_genInfo_title()); }
		else if(index==2) { sb.append(badge_setPassword_title()); }
		else if(index==3) { sb.append(badge_securityQ_title()); }
		sb.append(checkBadgeFormFields(index));
		return Bootstrap.buildTable(sb.toString());
	}
	
	public String testOnPageLoad() {
		return loadBadge("On PageLoad: ",1);
	}
	
	public String testBadge1() {
		WebElement genInfoDiv_badge_WebElement = userRegisterWebElements.getBadgeWebElement(UserRegisterForm.BADGE_GENINFO);
		WebElement setPassword_badge_WebElement = userRegisterWebElements.getBadgeWebElement(UserRegisterForm.BADGE_SETPWD);
		WebElement securityQ_badge_WebElement = userRegisterWebElements.getBadgeWebElement(UserRegisterForm.BADGE_SECURITYQ);
		StringBuilder sb = new StringBuilder();
		super.singleClickButton(genInfoDiv_badge_WebElement);
		
		sb.append(loadBadge("On Badge#1 Click: ",1));
		
		super.singleClickButton(setPassword_badge_WebElement);

		sb.append(loadBadge("On Badge#2 Click: ",1));
		
		super.singleClickButton(securityQ_badge_WebElement);

		sb.append(loadBadge("On Badge#3 Click: ",1));
	
		return sb.toString();
	}

	private Boolean validateInputElement(String type, String element, String sucessOrError) {
	  Boolean status = false;
	  if("success".equalsIgnoreCase(sucessOrError)) {
		  status = userRegisterWebElements.getSuccessOrErrorWebElement(element,type).getAttribute("class").contains("glyphicon-ok");
	  } else if("error".equalsIgnoreCase(sucessOrError)) {
		  status = userRegisterWebElements.getSuccessOrErrorWebElement(element,type).getAttribute("class").contains("glyphicon-remove");
	  }
	  return status;
	}
	
	public String checkEmptyGenInfoForm() throws InterruptedException, AWTException {
		StringBuilder sb = new StringBuilder();
		
		WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
		super.singleClickButton(genInfo_mobileVerifyBrn_webElement);
		   
		String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		String isErrorMessageStatus = Bootstrap.buildLabel("FAILED", "danger");
		Boolean isSuccessErrorIconsPassed= true;
		String isSuccessErrorIconsStatus = Bootstrap.buildLabel("PASSED", "success");
		   
		if(FORM_GENINFO_ALERTMSG_EMPTYFORM.equalsIgnoreCase(alertResponse)) {
			   isErrorMessagePassed = true;
			   isErrorMessageStatus = Bootstrap.buildLabel("PASSED", "success");
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", isErrorMessageStatus }, isErrorMessagePassed));
			    
			   StringBuilder successOrErrorBuilder = new StringBuilder();
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_SURNAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_NAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("select",FORM_GENINFO_SELECT_GENDER,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_MOBILE,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile - (Not Shown as Expected)", false));
			   }

			   sb.append(Bootstrap.buildTableRow(new String[] {"Success Error Icon", successOrErrorBuilder.toString(), isSuccessErrorIconsStatus }, isSuccessErrorIconsPassed));
			   
		   } else {
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", isErrorMessageStatus }, isErrorMessagePassed));
		   }
		   
		   return  Bootstrap.buildH5Heading("General Info - Form Submit (Without Filling Form):")+
				   Bootstrap.buildTable(sb.toString());
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
	
	public String checkGenInfoFormWithSurName() throws InterruptedException, AWTException {
		   StringBuilder sb = new StringBuilder(); 
		   
		   String surName = "Nellutla";
		   String name = "";
		   String gender = "";
		   String mobileCode = "+91";
		   String mobile = "";
		   
		   genInfoForm_reset_allFields();
		   genInfoForm_add_surName(surName);
		   
		   StringBuilder testData = new StringBuilder();
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("SurName: ")+surName, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Name: ")+name, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Gender: ")+gender, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile-code: ")+mobileCode+" (Default)", false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile: ")+mobile, false));
		   
		   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
		   super.singleClickButton(genInfo_mobileVerifyBrn_webElement);
		   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
		   Boolean isErrorMessagePassed= false;
		   String isErrorMessageStatus = Bootstrap.buildLabel("FAILED", "danger");
		   Boolean isSuccessErrorIconsPassed= true;
		   String isSuccessErrorIconsStatus = Bootstrap.buildLabel("PASSED", "success");
		   
		   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTSURNAME.equalsIgnoreCase(alertResponse)) {
			   isErrorMessagePassed = true;
			   isErrorMessageStatus = Bootstrap.buildLabel("PASSED", "success");
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", isErrorMessageStatus }, isErrorMessagePassed));
			    
			   StringBuilder successOrErrorBuilder = new StringBuilder();
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_SURNAME,"success")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_NAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("select",FORM_GENINFO_SELECT_GENDER,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_MOBILE,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile - (Not Shown as Expected)", false));
			   }

			   sb.append(Bootstrap.buildTableRow(new String[] {"Success Error Icon", successOrErrorBuilder.toString(), isSuccessErrorIconsStatus }, isSuccessErrorIconsPassed));
			   
		   } else {
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", isErrorMessageStatus }, isErrorMessagePassed));
		   }
		   return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName):")+
				  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"),testData.toString() }, null))+
				  Bootstrap.buildTable(sb.toString());
		}
	
	public String checkGenInfoFormWithName() throws InterruptedException, AWTException {
		   StringBuilder sb = new StringBuilder(); 
		   
		   String surName = "";
		   String name = "L N Rao";
		   String gender = "";
		   String mobileCode = "+91";
		   String mobile = "";
		   
		   genInfoForm_reset_allFields();
		   genInfoForm_add_name(name);
		   
		   StringBuilder testData = new StringBuilder();
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("SurName: ")+surName, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Name: ")+name, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Gender: ")+gender, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile-code: ")+mobileCode+" (Default)", false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile: ")+mobile, false));
		   
		   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
		   super.singleClickButton(genInfo_mobileVerifyBrn_webElement);
		   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
		   Boolean isErrorMessagePassed= false;
		   String isErrorMessageStatus = Bootstrap.buildLabel("FAILED", "danger");
		   Boolean isSuccessErrorIconsPassed= true;
		   String isSuccessErrorIconsStatus = Bootstrap.buildLabel("PASSED", "success");
		   
		   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTNAME.equalsIgnoreCase(alertResponse)) {
			   isErrorMessagePassed = true;
			   isErrorMessageStatus = Bootstrap.buildLabel("PASSED", "success");
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", isErrorMessageStatus }, isErrorMessagePassed));
			    
			   StringBuilder successOrErrorBuilder = new StringBuilder();
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_SURNAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_NAME,"success")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("select",FORM_GENINFO_SELECT_GENDER,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_MOBILE,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile - (Not Shown as Expected)", false));
			   }

			   sb.append(Bootstrap.buildTableRow(new String[] {"Success Error Icon", successOrErrorBuilder.toString(), isSuccessErrorIconsStatus }, isSuccessErrorIconsPassed));
			   
		   } else {
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", isErrorMessageStatus }, isErrorMessagePassed));
		   }
		   return Bootstrap.buildH5Heading("General Info - Form Submit (With Name):")+
				  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"),testData.toString() }, null))+
				  Bootstrap.buildTable(sb.toString());
		}
	
	public String checkGenInfoFormWithGender() throws InterruptedException, AWTException {
		   StringBuilder sb = new StringBuilder(); 
		   
		   String surName = "";
		   String name = "";
		   String gender = "Male";
		   String mobileCode = "+91";
		   String mobile = "";
		   
		   genInfoForm_reset_allFields();
		   genInfoForm_add_gender(gender);
		   
		   StringBuilder testData = new StringBuilder();
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("SurName: ")+surName, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Name: ")+name, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Gender: ")+gender, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile-code: ")+mobileCode+" (Default)", false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile: ")+mobile, false));
		   
		   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
		   super.singleClickButton(genInfo_mobileVerifyBrn_webElement);
		   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
		   Boolean isErrorMessagePassed= false;
		   String isErrorMessageStatus = Bootstrap.buildLabel("FAILED", "danger");
		   Boolean isSuccessErrorIconsPassed= true;
		   String isSuccessErrorIconsStatus = Bootstrap.buildLabel("PASSED", "success");
		   
		   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTGENDER.equalsIgnoreCase(alertResponse)) {
			   isErrorMessagePassed = true;
			   isErrorMessageStatus = Bootstrap.buildLabel("PASSED", "success");
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", isErrorMessageStatus }, isErrorMessagePassed));
			    
			   StringBuilder successOrErrorBuilder = new StringBuilder();
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_SURNAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_NAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("select",FORM_GENINFO_SELECT_GENDER,"success")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_MOBILE,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile - (Not Shown as Expected)", false));
			   }

			   sb.append(Bootstrap.buildTableRow(new String[] {"Success Error Icon", successOrErrorBuilder.toString(), isSuccessErrorIconsStatus }, isSuccessErrorIconsPassed));
			   
		   } else {
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", isErrorMessageStatus }, isErrorMessagePassed));
		   }
		   return Bootstrap.buildH5Heading("General Info - Form Submit (With Gender):")+
				  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"),testData.toString() }, null))+
				  Bootstrap.buildTable(sb.toString());
		}
	
	public String checkGenInfoFormWithNewMobile() throws InterruptedException, AWTException {
		   StringBuilder sb = new StringBuilder(); 
		   
		   String surName = "";
		   String name = "";
		   String gender = "";
		   String mobileCode = "+91";
		   String mobile = "9168869337";
		   
		   genInfoForm_reset_allFields();
		   genInfoForm_add_mobile(mobile);
		   
		   StringBuilder testData = new StringBuilder();
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("SurName: ")+surName, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Name: ")+name, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Gender: ")+gender, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile-code: ")+mobileCode+" (Default)", false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile: ")+mobile, false));
		   
		   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
		   super.singleClickButton(genInfo_mobileVerifyBrn_webElement);
		   Thread.sleep(3000);
		   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
		   Boolean isErrorMessagePassed= false;
		   String isErrorMessageStatus = Bootstrap.buildLabel("FAILED", "danger");
		   Boolean isSuccessErrorIconsPassed= true;
		   String isSuccessErrorIconsStatus = Bootstrap.buildLabel("PASSED", "success");

		   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHOUTMOBILE.equalsIgnoreCase(alertResponse)) {
			   isErrorMessagePassed = true;
			   isErrorMessageStatus = Bootstrap.buildLabel("PASSED", "success");
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", isErrorMessageStatus }, isErrorMessagePassed));
			    
			   StringBuilder successOrErrorBuilder = new StringBuilder();
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_SURNAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_NAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("select",FORM_GENINFO_SELECT_GENDER,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_MOBILE,"success")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile - (Not Shown as Expected)", false));
			   }

			   sb.append(Bootstrap.buildTableRow(new String[] {"Success Error Icon", successOrErrorBuilder.toString(), isSuccessErrorIconsStatus }, isSuccessErrorIconsPassed));
			   
		   } else {
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", isErrorMessageStatus }, isErrorMessagePassed));
		   }
		   return Bootstrap.buildH5Heading("General Info - Form Submit (With New Mobile Number):")+
				  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"),testData.toString() }, null))+
				  Bootstrap.buildTable(sb.toString());
		}
	
	public String checkGenInfoFormWithRegisterMobile() throws InterruptedException, AWTException {
		   StringBuilder sb = new StringBuilder(); 
		   
		   String surName = "";
		   String name = "";
		   String gender = "";
		   String mobileCode = "+91";
		   String mobile = "9160869337";
		   
		   genInfoForm_reset_allFields();
		   genInfoForm_add_mobile(mobile);
		   
		   StringBuilder testData = new StringBuilder();
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("SurName: ")+surName, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Name: ")+name, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Gender: ")+gender, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile-code: ")+mobileCode+" (Default)", false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile: ")+mobile, false));
		   
		   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
		   super.singleClickButton(genInfo_mobileVerifyBrn_webElement);
		   Thread.sleep(3000);
		   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
		   Boolean isErrorMessagePassed= false;
		   String isErrorMessageStatus = Bootstrap.buildLabel("FAILED", "danger");
		   Boolean isSuccessErrorIconsPassed= true;
		   String isSuccessErrorIconsStatus = Bootstrap.buildLabel("PASSED", "success");

		   if(FORM_GENINFO_ALERTMSG_EMPTYFORM_WITHREGISTERMOBILE.equalsIgnoreCase(alertResponse)) {
			   isErrorMessagePassed = true;
			   isErrorMessageStatus = Bootstrap.buildLabel("PASSED", "success");
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", isErrorMessageStatus }, isErrorMessagePassed));
			    
			   StringBuilder successOrErrorBuilder = new StringBuilder();
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_SURNAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_NAME,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("select",FORM_GENINFO_SELECT_GENDER,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_MOBILE,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile - (Not Shown as Expected)", false));
			   }

			   sb.append(Bootstrap.buildTableRow(new String[] {"Success Error Icon", successOrErrorBuilder.toString(), isSuccessErrorIconsStatus }, isSuccessErrorIconsPassed));
			   
		   } else {
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", isErrorMessageStatus }, isErrorMessagePassed));
		   }
		   return Bootstrap.buildH5Heading("General Info - Form Submit (With Registered Mobile Number):")+
				  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"),testData.toString() }, null))+
				  Bootstrap.buildTable(sb.toString());
		}
	
	public String checkGenInfoFormWithSurNameAndName() throws InterruptedException, AWTException {
		   StringBuilder sb = new StringBuilder(); 
		   
		   String surName = "Nellutla";
		   String name = "L N Rao";
		   String gender = "";
		   String mobileCode = "+91";
		   String mobile = "";
		   
		   genInfoForm_reset_allFields();
		   genInfoForm_add_surName(surName);
		   genInfoForm_add_name(name);
		   
		   StringBuilder testData = new StringBuilder();
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("SurName: ")+surName, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Name: ")+name, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Gender: ")+gender, false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile-code: ")+mobileCode+" (Default)", false));
		   testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Mobile: ")+mobile, false));
		   
		   WebElement genInfo_mobileVerifyBrn_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_GENINFO_BUTTON_MOBILEVERIFY);
		   super.singleClickButton(genInfo_mobileVerifyBrn_webElement);
		   String alertResponse = userRegisterWebElements.getWarningAlert("auth-reg-genInfo-warnErrorMsg").getText().substring(1).trim();
		   Boolean isErrorMessagePassed= false;
		   String isErrorMessageStatus = Bootstrap.buildLabel("FAILED", "danger");
		   Boolean isSuccessErrorIconsPassed= true;
		   String isSuccessErrorIconsStatus = Bootstrap.buildLabel("PASSED", "success");
		   
		   if(FORM_GENINFO_ALERTMSG_WITHSURNAMEANDNAME.equalsIgnoreCase(alertResponse)) {
			   isErrorMessagePassed = true;
			   isErrorMessageStatus = Bootstrap.buildLabel("PASSED", "success");
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Shown and Expected)", isErrorMessageStatus }, isErrorMessagePassed));
			    
			   StringBuilder successOrErrorBuilder = new StringBuilder();
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_SURNAME,"success")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Surname - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_NAME,"success")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Name - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("select",FORM_GENINFO_SELECT_GENDER,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Gender - (Not Shown as Expected)", false));
			   }
			   
			   if(validateInputElement("input",FORM_GENINFO_INPUT_MOBILE,"error")) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", false));
			   } else {
				   isSuccessErrorIconsPassed = false;
				   isSuccessErrorIconsStatus = Bootstrap.buildLabel("FAILED", "danger");
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Mobile - (Not Shown as Expected)", false));
			   }

			   sb.append(Bootstrap.buildTableRow(new String[] {"Success Error Icon", successOrErrorBuilder.toString(), isSuccessErrorIconsStatus }, isSuccessErrorIconsPassed));
			   
		   } else {
			   sb.append(Bootstrap.buildTableRow(new String[] {"Error Message",alertResponse+" (Not Shown as Expected)", isErrorMessageStatus }, isErrorMessagePassed));
		   }
		   return Bootstrap.buildH5Heading("General Info - Form Submit (With SurName and Name):")+
				  Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"),testData.toString() }, null))+
				  Bootstrap.buildTable(sb.toString());
		}
	
	
	public static void main(String args[]) throws InterruptedException, AWTException {
		UserRegisterFormUtils userRegisterFormTest = new UserRegisterFormUtils();
		Thread.sleep(6000);
		
		Thread.sleep(2000);
		// userRegisterFormTest.checkEmptyGenInfoForm();
		
	}
}
