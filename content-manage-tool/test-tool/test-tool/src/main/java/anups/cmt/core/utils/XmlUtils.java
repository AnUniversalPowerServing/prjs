package anups.cmt.core.utils;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpression;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;

import anups.cmt.core.constants.ProjectBase;
import anups.cmt.core.files.FileManager;

public class XmlUtils extends ProjectBase {

	public static List<String> evaluateXPath(Document document, String xpathExpression) throws Exception {
	  XPathFactory xpathFactory = XPathFactory.newInstance();
	  XPath xpath = xpathFactory.newXPath();
	  List<String> values = new ArrayList<String>();
	  try {
		 XPathExpression expr = xpath.compile(xpathExpression);
		 NodeList nodes = (NodeList) expr.evaluate(document, XPathConstants.NODESET);
		 for(int i = 0; i < nodes.getLength(); i++) { values.add(nodes.item(i).getNodeValue());  }           
	  } catch (XPathExpressionException e) {  e.printStackTrace(); }
      return values;
   }
	
	public static LinkedHashMap<String, String> evaluateXPathKeyValue(Document document, String xpathExpression) throws Exception  {
		LinkedHashMap<String, String> keyValues = new LinkedHashMap<String, String>();
		XPathFactory xpathFactory = XPathFactory.newInstance();
	    XPath xpath = xpathFactory.newXPath();
	    try {
			 XPathExpression expr = xpath.compile(xpathExpression);
			 NodeList nodes = (NodeList) expr.evaluate(document, XPathConstants.NODESET);	 
			 for(int i = 0; i < nodes.getLength(); i++) { 
				Element el = (Element) nodes.item(i);
				String key = el.getNodeName();
				if (el.getFirstChild().getNodeType() == Node.TEXT_NODE) {
					String value = el.getFirstChild().getNodeValue();
					keyValues.put(key, value);  
				}			
			 }           
		  } catch (XPathExpressionException e) {  e.printStackTrace(); }
	    return keyValues;
	}
	public static Document getDocument(String fileName) throws Exception {
        DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
        factory.setNamespaceAware(true);
        DocumentBuilder builder = factory.newDocumentBuilder();
        Document doc = builder.parse(fileName);
        return doc;
    }
}
