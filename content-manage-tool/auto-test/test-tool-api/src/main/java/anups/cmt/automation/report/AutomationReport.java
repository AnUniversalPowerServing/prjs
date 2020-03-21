package anups.cmt.automation.report;

import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import anups.cmt.automation.app.AutomationSettings;
import anups.cmt.core.pojos.TestCases;
import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.pojos.TestSteps;

public class AutomationReport extends AutomationSettings {
  
    FileWriter myWriter;
	
	public AutomationReport(String pageName) {
		try {
			 myWriter = new FileWriter(PROJECT_URL+"//"+REPORT_FOLDER+"//"+pageName+".html");
			 
			  } catch (IOException e) {
				  e.printStackTrace();
			  }	
	}
	
	public void build(String htmlContent) {
		try {
		  myWriter.write(htmlContent);
		  myWriter.close();
		} catch (IOException e) {
			  e.printStackTrace();
		}	
	}
	
}
