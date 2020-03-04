package anups.cmt.core.utils;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.LinkedHashSet;
import java.util.List;
import org.w3c.dom.Document;

import com.google.gson.Gson;

import anups.cmt.core.pojos.TestCases;
import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.pojos.TestSteps;

public class Xml extends XmlUtils {

	private List<String> testScenarioFiles;
	private LinkedHashSet<String> testCaseIds;
	private LinkedHashMap<String,TestScenarios> testScenarios;
	
	public Xml() {
	  buildListOfFiles();
	  buildListOfTestCaseIds();
	}
	
	private void buildListOfFiles() {
	   XmlFilePicker xmlFilePicker = new XmlFilePicker(RESOURCE_SCENARIOS_FOLDER);
	   testScenarioFiles = xmlFilePicker.getFiles();
	}
	
	private void buildListOfTestCaseIds() {
	   List<String> testCases = new ArrayList<String>();
	   for(int index=0;index<testScenarioFiles.size();index++) {
		 try {
		   Document document = XmlUtils.getDocument(testScenarioFiles.get(index)); 
		   String xpath_testCaseId = "//testcase/@id";
		   testCases.addAll(XmlUtils.evaluateXPath(document, xpath_testCaseId));
		 } catch(Exception e) { }
	   }
	   testCaseIds = new LinkedHashSet<String>(testCases);
	}
	
	public List<String> getListOfFiles(){
		return testScenarioFiles;
	}
 
	public LinkedHashSet<String> getListOfTestCaseIds() {
	   return testCaseIds;
	}
	
	public TestScenarios getTestCase(String testCaseId) {
	  TestScenarios testScenarios = new TestScenarios();
	 
	  for(int index=0;index<testScenarioFiles.size();index++) {
		try {
		  Document document = XmlUtils.getDocument(testScenarioFiles.get(index)); 
		  String xpath_scenarioTitle = "//testcase[contains(@id,'"+testCaseId+"')]/../../title/text()";
		  String xpath_scenarioDesc = "//testcase[contains(@id,'"+testCaseId+"')]/../../desc/text()";
		  String xpath_testCaseTitle = "//testcase[contains(@id,'"+testCaseId+"')]/title/text()";
		  String xpath_testCaseDesc = "//testcase[contains(@id,'"+testCaseId+"')]/desc/text()";
		  String xpath_testStepIds = "//testcase[contains(@id,'"+testCaseId+"')]/teststeps/teststep/@id";
		  
		  List<String> content_scenarioTitle = (XmlUtils.evaluateXPath(document, xpath_scenarioTitle));
		  if(content_scenarioTitle.size()>0) { 
			String scenarioTitle = content_scenarioTitle.get(0);
			String scenarioDesc = (XmlUtils.evaluateXPath(document, xpath_scenarioDesc)).get(0);
			String testCaseTitle = (XmlUtils.evaluateXPath(document, xpath_testCaseTitle)).get(0);
			String testCaseDesc = (XmlUtils.evaluateXPath(document, xpath_testCaseDesc)).get(0);
			
			testScenarios.setScenarioTitle(scenarioTitle);
			testScenarios.setScenarioDesc(scenarioDesc);
			 
			TestCases testCases = new TestCases();
			   testCases.setTestCaseTitle(testCaseTitle);
			   testCases.setTestCaseDesc(testCaseDesc);
		  
		    List<String> testStepIds = XmlUtils.evaluateXPath(document, xpath_testStepIds);
		  
		    TestSteps testSteps = new TestSteps(); 
		  for(int testStepIndex=0;testStepIndex<testStepIds.size();testStepIndex++) {
			String xpath_testStepTitle = "//testcase[contains(@id,'"+testCaseId+"')]/teststeps/teststep[contains(@id,'"+testStepIds.get(testStepIndex)+"')]/title/text()";
			String xpath_testStepDesc = "//testcase[contains(@id,'"+testCaseId+"')]/teststeps/teststep[contains(@id,'"+testStepIds.get(testStepIndex)+"')]/desc/text()";
			String xpath_testStepData = "//testcase[contains(@id,'"+testCaseId+"')]/teststeps/teststep[contains(@id,'"+testStepIds.get(testStepIndex)+"')]/data/*";
			String xpath_testStepExpectations = "//testcase[contains(@id,'"+testCaseId+"')]/teststeps/teststep[contains(@id,'"+testStepIds.get(testStepIndex)+"')]/expectations";
			//String xpath_testStepResponseExpected = "//testcase[contains(@id,'"+testCaseId+"')]/teststeps/teststep[contains(@id,'"+testStepIds.get(testStepIndex)+"')]/response/@expected";
			// String xpath_testStepResponse = "//testcase[contains(@id,'"+testCaseId+"')]/teststeps/teststep[contains(@id,'"+testStepIds.get(testStepIndex)+"')]/response/*";
			
			String testStepId = testStepIds.get(testStepIndex);
		    String testStepTitle = (XmlUtils.evaluateXPath(document, xpath_testStepTitle)).get(0);
		    String testStepDesc = (XmlUtils.evaluateXPath(document, xpath_testStepDesc)).get(0);
		    
		    LinkedHashMap<String, String> testStepData = XmlUtils.evaluateXPathKeyValue(document, xpath_testStepData);
		    
		    XmlUtils.evaluateXPathChild(document, xpath_testStepExpectations);
		   // for(int in=0;in<testExpectations.size();in++) {
		    //	testExpectations.get(0);
		   // }
		   // String testStepResponseExpected = (XmlUtils.evaluateXPath(document, xpath_testStepResponseExpected)).get(0);
		   //  LinkedHashMap<String, String> testStepResponse = XmlUtils.evaluateXPathKeyValue(document, xpath_testStepResponse);
		    
		    
		    testSteps.setStepId(testStepId);
		    testSteps.setTestStepTitle(testStepTitle);
		    testSteps.setTestStepDesc(testStepDesc);
		    testSteps.setTestData(testStepData);
		    // testSteps.setResponseExpectedInfo(testStepResponse);
		 //   if("yes".equalsIgnoreCase(testStepResponseExpected)) {
		    //	testSteps.setResponseExpected(true);
		 //   } else {
		    //	testSteps.setResponseExpected(false);
		 //   }
		  }
		  
		  testCases.setTestSteps(testSteps);
		  
		  String xpath_testData = "//testcase[contains(@id,'"+testCaseId+"')]/data/*";
		  LinkedHashMap<String, String> testData = XmlUtils.evaluateXPathKeyValue(document, xpath_testData);
		  
		  testCases.setTestData(testData);
		  testScenarios.setTestCases(testCases);
		 }
		} catch(IndexOutOfBoundsException e) { 
			 System.out.println("XMLTags for TestCase are Empty or Invalid Format."); 
			 testScenarios = new TestScenarios();
		  }
		 catch(Exception e) { e.printStackTrace(); }
	  }
	  return testScenarios;
	}
	
 public static void main(String args[]) throws Exception {
	
	
 }
 
}
