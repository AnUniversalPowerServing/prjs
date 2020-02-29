package anups.cmt.core.utils;

import java.io.File;
import java.io.IOException;
import java.util.LinkedHashMap;
import java.util.Map;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NamedNodeMap;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import com.google.gson.Gson;
import com.google.gson.JsonElement;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;
import com.google.gson.stream.JsonReader;

import anups.cmt.core.constants.ProjectBase;
import anups.cmt.core.files.FileManager;

public class XmlTestCaseReader extends ProjectBase {
  
  public void parsing(String fileName) {
	  try {
		  File inputFile = new File(fileName);
		  DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
		  DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
		  Document doc = dBuilder.parse(inputFile);
		           doc.getDocumentElement().normalize();
		  XPath xPath =  XPathFactory.newInstance().newXPath();

		  String testCase = "/testcases/testcase";
		  
		  NodeList nodeList = (NodeList) xPath.compile(testCase).evaluate(doc, XPathConstants.NODESET);
		  System.out.println("length: "+nodeList.getLength());
		  for(int nodeIndex = 0; nodeIndex < nodeList.getLength(); nodeIndex++) {
		      Node nNode = nodeList.item(nodeIndex);
		      NamedNodeMap nNodeAttributes = nNode.getAttributes();
		      String testCaseId = "";
		      String testCaseType= "";
		      if(nNodeAttributes.getNamedItem("id")!=null) { testCaseId = nNodeAttributes.getNamedItem("id").getNodeValue(); }
		      if(nNodeAttributes.getNamedItem("type")!=null) { testCaseType = nNodeAttributes.getNamedItem("type").getNodeValue(); }
		      
		      Element eElement1 = (Element) nNode;
		      String testCaseTitle = eElement1.getElementsByTagName("title").item(0).getTextContent();
		      String testCaseDesc = eElement1.getElementsByTagName("desc").item(0).getTextContent();
		      
		      Element eElement2 = (Element) eElement1.getElementsByTagName("teststeps").item(0);
		      
		      System.out.println("Test Case Id: "+testCaseId);
		      System.out.println("Test Case Type: "+testCaseType);
		      System.out.println("Test Case Title: "+testCaseTitle);
		      System.out.println("Test Case Desc: "+testCaseDesc);
		      
		      NodeList nodeElement3 = eElement2.getElementsByTagName("teststep");
		      
		      for(int testStepsIndex=0;testStepsIndex<eElement2.getElementsByTagName("teststep").getLength();testStepsIndex++) {
		    	  Element eElement3 = (Element) nodeElement3.item(testStepsIndex);
		    	  String testStepTitle = eElement3.getElementsByTagName("title").item(0).getTextContent();
			      String testStepDesc = eElement3.getElementsByTagName("desc").item(0).getTextContent();
			      
			      
			      System.out.println("Test Step Title: "+testStepTitle);
			      System.out.println("Test Step Desc: "+testStepDesc);
		      }
		     
		         }
		      } catch (ParserConfigurationException e) {
		         e.printStackTrace();
		      } catch (SAXException e) {
		         e.printStackTrace();
		      } catch (IOException e) {
		         e.printStackTrace();
		      } catch (XPathExpressionException e) {
		         e.printStackTrace();
		      }
		   
  }

  public static void main(String[] args) {
	  XmlTestCaseReader xmlTestCaseReader = new XmlTestCaseReader();
	  FileManager fileManager = new FileManager();
	  LinkedHashMap<String, String> listOfFiles = fileManager.getListOfFilesAndFolders(RESOURCE_SCENARIOS_FOLDER, null);
	  for (Map.Entry<String, String> entry : listOfFiles.entrySet()) {
		if("FILE".equalsIgnoreCase(entry.getValue())) {
		  String fileName = RESOURCE_SCENARIOS_FOLDER+entry.getKey();
		  xmlTestCaseReader.parsing(fileName);
		}
	    
	  }
  }
}
