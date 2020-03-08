package anups.cmt.automation.app;

import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import anups.cmt.core.pojos.TestCases;
import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.pojos.TestSteps;

public class AutomationReport extends AutomationSettings {
  
	 FileWriter myWriter;
	
	public AutomationReport(String pageName) {
		try {
			     myWriter = new FileWriter(PROJECT_URL+"//"+REPORT_FOLDER+"//"+pageName+".html");
			     StringBuilder sb = new StringBuilder();
			      sb.append(reportHeader());
			      sb.append("<div class=\"table-responsive\">");
				  sb.append("<table class=\"table\">");
				  sb.append("<thead>");
				  sb.append("<tr>");
				  sb.append("<th><b>#</b></th>");
				  sb.append("<th><b>Test Case</b></th>");
				  sb.append("<th><b>Test Description</b></th>");
				  sb.append("<th><b>Test Steps</b></th>"); 
				  sb.append("</tr>");
				  sb.append("</thead>");
				  sb.append("<tbody>");
			     myWriter.write(sb.toString());
			  } catch (IOException e) {
				  e.printStackTrace();
			  }	
	}
	public void addToReport(TestScenarios testScenario,List<String> expectation, List<String> testData) {
		try {
		  StringBuilder sb = new StringBuilder();
		  sb.append(buildTestCase(testScenario,expectation,testData));
		  myWriter.write(sb.toString());
		} catch (IOException e) {
			  e.printStackTrace();
		  }	
	}
	
	public void doneReport() {
		try {
		     StringBuilder sb = new StringBuilder();
		     sb.append("</tbody>");
			 sb.append("</table>");
			 sb.append("</div>");
		     sb.append(reportFooter());
		     myWriter.write(sb.toString());
		     myWriter.close();
		  } catch (IOException e) {
			  e.printStackTrace();
		  }	
	}
	
	
	public static void main(String args[]) {
		
	}
	
	private static String reportHeader() {
	  StringBuilder sb = new StringBuilder("<!DOCTYPE html>");
		sb.append("<html><head>");
		sb.append("<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">");
		sb.append("<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css\">");
		sb.append("<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>");
		sb.append("<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js\"></script>");
		sb.append("<style>");
		sb.append("body{ font-size:11px; }");
		sb.append(".table-responsive>.table>thead{font-weight:bold;background-color:purple;color:#fff;border-bottom:0px;}");
		sb.append(".table-responsive>.table>tbody{font-weight:bold;}");
		sb.append(".table-responsive>.table{border:1px solid purple;}");
		sb.append("</style>");
		sb.append("</head><body>");
	  return sb.toString();
	}
	
	public String reportFooter() {
		return new StringBuilder("</body></html>").toString();
	}
	
	private String buildTestCase(TestScenarios testScenario, List<String> expectation, List<String> testData) {
		
	  TestCases testCase = testScenario.getTestCases();
	  StringBuilder sb = new StringBuilder(); 
	  
	  sb.append("<tr>");
	  sb.append("<td>1</td>");
	  sb.append("<td>").append(testCase.getTestCaseTitle()).append("</td>");
	  sb.append("<td>").append(testCase.getTestCaseDesc()).append("</td>");
	  sb.append("<td><div class=\"table-responsive\">");  
	  sb.append("<table class=\"table\">");
	  sb.append("<thead>");
	  sb.append("<tr>");
	  sb.append("<th><b>#</b></th>");
	  sb.append("<th><b>Test Step</b></th>");
	  sb.append("<th><b>Description</b></th>");
	  sb.append("<th><b>Expected</b></th>");
	  sb.append("<th><b>Test-Data</b></th>");
	  sb.append("<th><b>Status</b></th>");
      sb.append("<th><b>Comment</b></th>");
	  sb.append("</tr>");
	  sb.append("</thead>");
	  sb.append("<tbody>");
	  int index=1;
	  for(TestSteps testSteps : testCase.getTestSteps()) {
	  sb.append("<tr>");
	  sb.append("<td>").append(index).append("</td>");
	  sb.append("<td>").append(testSteps.getTestStepTitle()).append("</td>");
	  sb.append("<td>").append(testSteps.getTestStepDesc()).append("</td>");
	  sb.append("<td>").append(expectation.get(index)).append("</td>");
	  sb.append("<td>").append(testData.get(index)).append("</td>");
	  sb.append("<td>").append(testSteps.getTestStepStatus()).append("</td>");
	  if(testSteps.getComment()!=null) {
	    sb.append("<td>").append(testSteps.getComment()).append("</td>");
	  } else {
		sb.append("<td></td>");
	  }
	  sb.append("</tr>");
	  index++;
	  }
	  sb.append("</tbody>");
	  sb.append("</table>");
      sb.append("</div></td>");
	  sb.append("</tr>");
	  
	  return sb.toString();
	}
	
}
