package anups.cmt.module.auth.user.register.sq;

import java.awt.AWTException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map.Entry;

import org.openqa.selenium.Keys;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.Select;

import anups.cmt.automation.app.AutomationFactorySettings;
import anups.cmt.automation.report.Bootstrap;
import anups.cmt.module.auth.user.register.UserRegisterForm;
import anups.cmt.module.auth.user.register.UserRegisterFormUtils;
import anups.cmt.module.auth.user.register.UserRegisterTest;
import anups.cmt.module.auth.user.register.UserRegisterTestData;

public class SqModuleFactory extends UserRegisterFormUtils {

	AutomationFactorySettings automationFactorySettings;
	
	public SqModuleFactory() {
	  automationFactorySettings = new AutomationFactorySettings(UserRegisterTest.getWebDriver());
	}
	
	/**  Required Stuff ::: Start */
	private void setSQForm_reset_allFields() {
		 setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1, UserRegisterForm.FORM_SECURITYQ_INPUT_A1_DEFAULT);
		 setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2, UserRegisterForm.FORM_SECURITYQ_INPUT_A2_DEFAULT);
		 setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3, UserRegisterForm.FORM_SECURITYQ_INPUT_A3_DEFAULT);
		 setSQForm_reset_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1);
		 setSQForm_reset_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2);
		 setSQForm_reset_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3);
	}
	
	private void setSQForm_reset_answer(String answer) {
	  WebElement setPwd_password_webElement = userRegisterWebElements.getInputWebElement(answer);
	  setPwd_password_webElement.sendKeys(Keys.chord(Keys.CONTROL, "a"));
	  setPwd_password_webElement.sendKeys(Keys.BACK_SPACE);
	}
	
	private void setSQForm_select_sQ(String sQ, String sQText) {
	  WebElement setSQForm_sQ1_webElement = userRegisterWebElements.getSelectWebElement(sQ);
	  Select select = new Select(setSQForm_sQ1_webElement);
	  select.selectByVisibleText(sQText);
	}
	
	private void setSQForm_add_answer(String answer, String answerText) {
	  WebElement setSQForm_sQ1_webElement = userRegisterWebElements.getInputWebElement(answer);
	  setSQForm_sQ1_webElement.sendKeys(answerText);
	}

	private String setSQForm_testData_basic(String sQ1, String sQ2, String sQ3, String a1, String a2, String a3) {
	  StringBuilder testData = new StringBuilder();
	    testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Security Question#1: ")+sQ1, false));
	    testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Security Answer#1: ")+a1, false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Security Question#2: ")+sQ2, false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Security Answer#2: ")+a2, false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Security Question#3: ")+sQ3, false));
		testData.append(Bootstrap.buildSimpleDiv(Bootstrap.buildBold("Security Answer#3: ")+a3, false));
	  return testData.toString();
	}
	
	public String setSQForm_basic_validateIcons(List<String> fields) {
		Boolean isSuccessErrorIconsPassed= true;
		StringBuilder successOrErrorBuilder = new StringBuilder();
			
		String status_input_sQ1 = STATUS_ERROR;
		if(fields.contains(SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1)) { status_input_sQ1 = STATUS_SUCCESS; }
		
		String status_input_sQ2 = STATUS_ERROR;
		if(fields.contains(SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2)) { status_input_sQ2 = STATUS_SUCCESS; }
		
		String status_input_sQ3 = STATUS_ERROR;
		if(fields.contains(SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3)) { status_input_sQ3 = STATUS_SUCCESS; }
		
		String status_input_a1 = STATUS_ERROR;
		if(fields.contains(SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_1)) { status_input_a1 = STATUS_SUCCESS; }
		
		String status_input_a2 = STATUS_ERROR;
		if(fields.contains(SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_2)) { status_input_a2 = STATUS_SUCCESS; }
		
		String status_input_a3 = STATUS_ERROR;
		if(fields.contains(SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_3)) { status_input_a3 = STATUS_SUCCESS; }
		
		
		if(validateInputElement("select",FORM_SECURITYQ_INPUT_SQ1,status_input_sQ1)) {
		   if(status_input_sQ1.equalsIgnoreCase(STATUS_SUCCESS)) {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#1: "+Bootstrap.getSuccessIcon()+" - (Shown as Expected)", BOLD_NO));
		   } else {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#1: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
		   }
		} else {
		   isSuccessErrorIconsPassed = false;
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#1 - (Not Shown as Expected)", BOLD_NO));
		}
										   
		if(validateInputElement("select",FORM_SECURITYQ_INPUT_SQ2,status_input_sQ2)) {
			if(status_input_sQ2.equalsIgnoreCase(STATUS_SUCCESS)) {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#2: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", BOLD_NO));
			} else {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#2: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
			}	   
		} else {
		   isSuccessErrorIconsPassed = false;
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#2 - (Not Shown as Expected)", BOLD_NO));
		}
	
		if(validateInputElement("select",FORM_SECURITYQ_INPUT_SQ3,status_input_sQ3)) {
			if(status_input_sQ3.equalsIgnoreCase(STATUS_SUCCESS)) {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#3: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", BOLD_NO));
			} else {
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#3: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
			}	   
		} else {
		   isSuccessErrorIconsPassed = false;
		   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Question#3 - (Not Shown as Expected)", BOLD_NO));
		}
		
		
		if(validateInputElement("input",FORM_SECURITYQ_INPUT_A1,status_input_a1)) {
			   if(status_input_a1.equalsIgnoreCase(STATUS_SUCCESS)) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#1: "+Bootstrap.getSuccessIcon()+" - (Shown as Expected)", BOLD_NO));
			   } else {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#1: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
			   }
			} else {
			   isSuccessErrorIconsPassed = false;
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#1 - (Not Shown as Expected)", BOLD_NO));
			}
											   
			if(validateInputElement("input",FORM_SECURITYQ_INPUT_A2,status_input_a2)) {
				if(status_input_a2.equalsIgnoreCase(STATUS_SUCCESS)) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#2: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", BOLD_NO));
				} else {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#2: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
				}	   
			} else {
			   isSuccessErrorIconsPassed = false;
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#2 - (Not Shown as Expected)", BOLD_NO));
			}
		
			if(validateInputElement("input",FORM_SECURITYQ_INPUT_A3,status_input_a3)) {
				if(status_input_a3.equalsIgnoreCase(STATUS_SUCCESS)) {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#3: "+Bootstrap.getSuccessIcon()+" - (Shown and Expected)", BOLD_NO));
				} else {
				   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#3: "+Bootstrap.getErrorIcon()+" - (Shown and Expected)", BOLD_NO));
				}	   
			} else {
			   isSuccessErrorIconsPassed = false;
			   successOrErrorBuilder.append(Bootstrap.buildSimpleDiv("Security Answer#3 - (Not Shown as Expected)", BOLD_NO));
			}
		
		return Bootstrap.buildTableRow(new String[] {"Basic Form Validations (Success Error Icons)", successOrErrorBuilder.toString(), testCaseStatus(isSuccessErrorIconsPassed) }, isSuccessErrorIconsPassed);
	 }
	
	/** ===================================================================================================
	 *   Once One Question is selected by User, Other two Selects Option should not have that Question
	 *  ===================================================================================================
	 * 
	 */
	public String checkSQOptExistsToOtherSQs(String sQ, String sQValue, LinkedHashMap<String, String> sQs) {
		StringBuilder sb = new StringBuilder();
		String sQLabel ="";
		for(Entry<String, String> entry : sQs.entrySet()){
			WebElement webElementSQ = userRegisterWebElements.getSelectWebElement(entry.getValue());
			Select selectSQ = new Select(webElementSQ);
			List<WebElement> selectOptionSQ = selectSQ.getOptions();
			Boolean isOptExist = true;
			String optionInfo ="It doesn't have User Selected Option";
			for(int i=0;i<selectOptionSQ.size();i++) {
				String option = selectOptionSQ.get(i).getText();
				if(sQValue.equalsIgnoreCase(option)) {
					isOptExist = false; 
					optionInfo ="It has User Selected Option";
					break;
				}
			}
			sb.append(Bootstrap.buildContainerFluidRow(3, new String[] { Bootstrap.buildSimpleDiv(entry.getKey(),false),
					Bootstrap.buildSimpleDiv(optionInfo,false), 
					testCaseStatus(isOptExist)  }, true, isOptExist));
			sQLabel+=entry.getKey()+", ";
		}
		sQLabel = sQLabel.substring(0, sQLabel.length()-2);
		return Bootstrap.buildContainerFluid(new String[] { 
			   Bootstrap.buildContainerFluidRow(1, new String[] { 
				Bootstrap.buildSimpleDiv("User selected:",true)+
				Bootstrap.buildSimpleDiv(Bootstrap.buildBold(sQ)+" : "+sQValue,false)+
				Bootstrap.buildSimpleDiv("(This value should not be Found in "+sQLabel+")",false) }, true, null),
			   	sb.toString()
			   });
	}
	
	/**  Required Stuff ::: End */
	
	/** ==================================================================================================
	 *   TEST-CASE: Check from SecurityQuestion Table data is getting and displaying in Select Drop-down
	 *  ==================================================================================================
	 *
	 */
	public String checkSQLoadingFromDatabase() throws InterruptedException {
		Thread.sleep(2000);
		StringBuilder sb = new StringBuilder();
		SqModuleDatabase sqModuleDatabase = new SqModuleDatabase();
		ArrayList<String> databaseSQ = sqModuleDatabase.getListOfSQfromDatabse();
		@SuppressWarnings("unchecked")
		ArrayList<String> databaseSQ1 = (ArrayList<String>) databaseSQ.clone();
		@SuppressWarnings("unchecked")
		ArrayList<String> databaseSQ2 = (ArrayList<String>) databaseSQ.clone();
		@SuppressWarnings("unchecked")
		ArrayList<String> databaseSQ3 = (ArrayList<String>) databaseSQ.clone();
		
		StringBuilder databaseSQReport = new StringBuilder();
		for(int index=0;index<databaseSQ.size();index++) {
			databaseSQReport.append(Bootstrap.buildSimpleDiv(databaseSQ.get(index), false));
		}
		
		WebElement webElementSQ1 = userRegisterWebElements.getSelectWebElement(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1);
		Select selectSQ1 = new Select(webElementSQ1);
		List<WebElement> selectOptionSQ1 = selectSQ1.getOptions();
		ArrayList<String> sQ1 = new ArrayList<String>();
		
		StringBuilder SQ1Report = new StringBuilder();
		for(int index=1;index<selectOptionSQ1.size();index++) {
			String option = selectOptionSQ1.get(index).getText();
			sQ1.add(option);
			if(index==0) { SQ1Report.append(Bootstrap.buildSimpleDiv(option, true)); } 
			else {  SQ1Report.append(Bootstrap.buildSimpleDiv(option, false));  }
		}
		databaseSQ1.retainAll(sQ1);
		Boolean sQ1Status = databaseSQ1.equals(sQ1);
		
		sb.append(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Database"), Bootstrap.buildBold("Security-Question#1"), Bootstrap.buildBold("Status")  }, null));
		sb.append(Bootstrap.buildTableRow(new String[] { databaseSQReport.toString(), SQ1Report.toString(), testCaseStatus(sQ1Status) }, sQ1Status));
	
		WebElement webElementSQ2 = userRegisterWebElements.getSelectWebElement(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2);
		Select selectSQ2 = new Select(webElementSQ2);
		List<WebElement> selectOptionSQ2 = selectSQ2.getOptions();
		ArrayList<String> sQ2 = new ArrayList<String>();
		
		StringBuilder SQ2Report = new StringBuilder();
		for(int index=1;index<selectOptionSQ2.size();index++) {
			String option = selectOptionSQ2.get(index).getText();
			sQ2.add(option);
			if(index==0) { SQ2Report.append(Bootstrap.buildSimpleDiv(option, true)); } 
			else {  SQ2Report.append(Bootstrap.buildSimpleDiv(option, false));  }
		}
		databaseSQ2.retainAll(sQ2);
		Boolean sQ2Status = databaseSQ2.equals(sQ2);
		System.out.println("databaseSQ2: "+databaseSQ2);
		System.out.println("sQ2: "+sQ2);
		System.out.println("sQ2Status: "+sQ2Status);
		sb.append(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Database"), Bootstrap.buildBold("Security-Question#2"), Bootstrap.buildBold("Status") }, null));
		sb.append(Bootstrap.buildTableRow(new String[] { databaseSQReport.toString(), SQ2Report.toString(), testCaseStatus(sQ2Status) }, sQ2Status));
		
		WebElement webElementSQ3 = userRegisterWebElements.getSelectWebElement(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3);
		Select selectSQ3 = new Select(webElementSQ3);
		List<WebElement> selectOptionSQ3 = selectSQ3.getOptions();
		ArrayList<String> sQ3 = new ArrayList<String>();
		
		StringBuilder SQ3Report = new StringBuilder();
		for(int index=1;index<selectOptionSQ3.size();index++) {
			String option = selectOptionSQ3.get(index).getText();
			sQ3.add(option);
			if(index==0) { SQ3Report.append(Bootstrap.buildSimpleDiv(option, true)); } 
			else {  SQ3Report.append(Bootstrap.buildSimpleDiv(option, false));  }
		}
		databaseSQ3.retainAll(sQ3);
		Boolean sQ3Status = databaseSQ3.equals(sQ3);

		sb.append(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Database"), Bootstrap.buildBold("Security-Question#3"), Bootstrap.buildBold("Status") }, null));
		sb.append(Bootstrap.buildTableRow(new String[] { databaseSQReport.toString(), SQ3Report.toString(), testCaseStatus(sQ3Status) }, sQ3Status));
		
		return  Bootstrap.buildH5Heading("Check Security Questions loading from Database and displaying into Security Questions Select Dropdowns:")+
				Bootstrap.buildTable(sb.toString());
	}
	
	public String checkEmptySetSQForm() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		String sQ1 = UserRegisterTestData.EMPTY_SQ1;
		String sQ2 = UserRegisterTestData.EMPTY_SQ2;
		String sQ3 = UserRegisterTestData.EMPTY_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] {}))); 
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (Without Filling Form):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"),  setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());

	}
	
	public String checkSetSQFormWithSQ1() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.EMPTY_SQ2;
		String sQ3 = UserRegisterTestData.EMPTY_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1 }))); 
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	}
	
	public String checkSetSQFormWithSQ2() throws InterruptedException, AWTException {
			
			StringBuilder sb = new StringBuilder();
			
			// Test Data and Inputing into Fields
			String sQ1 = UserRegisterTestData.EMPTY_SQ1;
			String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
			String sQ3 = UserRegisterTestData.EMPTY_SQ3;
			String a1 = UserRegisterTestData.EMPTY_A1;
			String a2 = UserRegisterTestData.EMPTY_A2; 
			String a3 = UserRegisterTestData.EMPTY_A3;
			
			setSQForm_reset_allFields();
			setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
			setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
			setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
			setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
			setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
			setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
			
			// Button Click
			WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
			automationFactorySettings.singleClickButton(setSQ_submit_webElement);
			
			// Alert Response 
			String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
			Boolean isErrorMessagePassed= false;
			   
			if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ2.equalsIgnoreCase(alertResponse)) {
			   isErrorMessagePassed = true;
			   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
			} else {
			   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
			}
			
			// Basic Validations
			sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2 }))); 
			
			return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#2):")+
					Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
					Bootstrap.buildTable(sb.toString());
			
		}
	
	public String checkSetSQFormWithSQ3() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.EMPTY_SQ1;
		String sQ2 = UserRegisterTestData.EMPTY_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ3.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3 }))); 
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#3):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }
	
	public String checkSetSQFormWithSQ1SQ2() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.EMPTY_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ2.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1 and Security Question#2):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }
	
	public String checkSetSQFormWithSQ2SQ3() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.EMPTY_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ2SQ3.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#2 and Security Question#3):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }
	
	public String checkSetSQFormWithSQ1SQ3() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.EMPTY_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ3.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1 and Security Question#3):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }
	
	public String checkSetSQFormWithSQ1SQ2SQ3() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ2SQ3.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1, Security Question#2 and Security Question#3):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }
	
	public String checkSetSQFormWithSQ1SQ2SQ3A1() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.DATA_VALID_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ2SQ3A1.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, 
				SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3, SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_1 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1, Security Question#2, Security Question#3 and Security Answer#1 ):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }

	public String checkSetSQFormWithSQ1SQ2SQ3A2() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.DATA_VALID_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ2SQ3A2.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, 
				SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3, SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_2 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1, Security Question#2, Security Question#3 and Security Answer#2 ):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }

	public String checkSetSQFormWithSQ1SQ2SQ3A3() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.DATA_VALID_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ2SQ3A3.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, 
				SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3, SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_3 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1, Security Question#2, Security Question#3 and Security Answer#3 ):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }

	public String checkSetSQFormWithSQ1SQ2SQ3A1A2() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.DATA_VALID_A1;
		String a2 = UserRegisterTestData.DATA_VALID_A2; 
		String a3 = UserRegisterTestData.EMPTY_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ2SQ3A1A2.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, 
				SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3, SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_1,
				SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_2 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1, Security Question#2, Security Question#3, Security Answer#1 and Security Answer#2 ):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }

	public String checkSetSQFormWithSQ1SQ2SQ3A2A3() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.EMPTY_A1;
		String a2 = UserRegisterTestData.DATA_VALID_A2; 
		String a3 = UserRegisterTestData.DATA_VALID_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ2SQ3A2A3.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, 
				SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3, SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_2,
				SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_3 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1, Security Question#2, Security Question#3, Security Answer#2 and Security Answer#3 ):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }

	public String checkSetSQFormWithSQ1SQ2SQ3A1A3() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.DATA_VALID_A1;
		String a2 = UserRegisterTestData.EMPTY_A2; 
		String a3 = UserRegisterTestData.DATA_VALID_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_SECURITYQ_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_SECURITYQ_ALERTMSG_EMPTYFORM_WITHSQ1SQ2SQ3A1A3.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, 
				SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3, SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_1,
				SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_3 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With Security Question#1, Security Question#2, Security Question#3, Security Answer#1 and Security Answer#3 ):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }

	public String checkSetSQFormWithAllFields() throws InterruptedException, AWTException {
		
		StringBuilder sb = new StringBuilder();
		
		// Test Data and Inputing into Fields
		String sQ1 = UserRegisterTestData.DATA_VALID_SQ1;
		String sQ2 = UserRegisterTestData.DATA_VALID_SQ2;
		String sQ3 = UserRegisterTestData.DATA_VALID_SQ3;
		String a1 = UserRegisterTestData.DATA_VALID_A1;
		String a2 = UserRegisterTestData.DATA_VALID_A2; 
		String a3 = UserRegisterTestData.DATA_VALID_A3;
		
		setSQForm_reset_allFields();
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ1,sQ1);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ2,sQ2);
		setSQForm_select_sQ(UserRegisterForm.FORM_SECURITYQ_INPUT_SQ3,sQ3);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A1, a1);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A2, a2);
		setSQForm_add_answer(UserRegisterForm.FORM_SECURITYQ_INPUT_A3, a3);
		
		// Button Click
		WebElement setSQ_submit_webElement = userRegisterWebElements.getButtonWebElement(UserRegisterForm.FORM_SECURITYQ_BUTTON_CREATEACCOUNT);
		automationFactorySettings.singleClickButton(setSQ_submit_webElement);
		Thread.sleep(2000);
		// Alert Response 
		String alertResponse = userRegisterWebElements.getWarningAlert(UserRegisterForm.FORM_GENINFO_ALERT_WARNERRORMSG).getText().substring(1).trim();
		Boolean isErrorMessagePassed= false;
		   
		if(FORM_REGISTER_ALERTMSG_ALLFIELDS.equalsIgnoreCase(alertResponse)) {
		   isErrorMessagePassed = true;
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_SHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		} else {
		   sb.append(Bootstrap.buildTableRow(new String[] {STATUS_ERRORMESSAGE,alertResponse+STATUS_NOTSHOWNASEXPECTED, testCaseStatus(isErrorMessagePassed) }, isErrorMessagePassed));
		}
		
		// Basic Validations
		sb.append(setSQForm_basic_validateIcons(Arrays.asList(new String[] { SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_1, SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_2, 
				SECURITYQMODULE_FIELDS_LABEL_SECURITYQUESTION_3, SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_1,
				SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_2, SECURITYQMODULE_FIELDS_LABEL_SECURITYANSWER_3 }))); 
				
		
		return  Bootstrap.buildH5Heading("Set Security Questions - Form Submit (With All Fields ):")+
				Bootstrap.buildTable(Bootstrap.buildTableRow(new String[] { Bootstrap.buildBold("Test-data"), setSQForm_testData_basic(sQ1, sQ2, sQ3, a1, a2, a3) }, null))+
				Bootstrap.buildTable(sb.toString());
		
	  }

	
	
}
