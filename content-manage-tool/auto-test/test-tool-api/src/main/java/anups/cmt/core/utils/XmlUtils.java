package anups.cmt.core.utils;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;

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

import com.google.gson.Gson;

import anups.cmt.core.constants.ProjectBase;

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
	
	
	
	
	public static LinkedHashMap<String, Object> printNodeInfo(Document document, String xpathExpression) {
		LinkedHashMap<String, Object> childNodesInfo = new LinkedHashMap<String, Object>();
		XPathFactory xpathFactory = XPathFactory.newInstance();
	    XPath xpath = xpathFactory.newXPath();
	    try {
			 XPathExpression expr = xpath.compile(xpathExpression);
			 NodeList nodes = (NodeList) expr.evaluate(document, XPathConstants.NODESET);	 
			 Element el = (Element) nodes.item(0);
			 if(el!=null) {
			 String tagName = el.getTagName();
		     int attributeSize = el.getAttributes().getLength();
		childNodesInfo.put("tag", tagName);
		LinkedHashMap<String, String> attributes = new LinkedHashMap<String, String>();
		if(attributeSize>0) {
			for(int index=0;index<attributeSize;index++) {
				Node attribute = el.getAttributes().item(index);
				String key = attribute.toString().split("=")[0];
				String  value = attribute.toString().split("=")[1].replace("\"", "");
				attributes.put(key, value);
			}
		}
		childNodesInfo.put("attributes", attributes);
		
		ArrayList<LinkedHashMap<String, Object>>  childNodes = new ArrayList<LinkedHashMap<String, Object>>();
		for(int index=0;index<el.getChildNodes().getLength();index++) {
			if(el.getChildNodes().item(index).getNodeType() != Node.TEXT_NODE) {
			  Element childElement = (Element)  el.getChildNodes().item(index);
			  LinkedHashMap<String, Object> childNodePrint = printNodeInfo(document, xpathExpression+"/"+childElement.getTagName());
			  childNodes.add(childNodePrint);
			}
		}
		childNodesInfo.put("child-tags", childNodes);
		if(childNodes.size()==0) {
			if(el.getTextContent()!=null && el.getTextContent().length()>0) {
				childNodesInfo.put("textcontent", el.getTextContent());
			}
		}
		
	    }
	   } catch (XPathExpressionException e) {  e.printStackTrace(); }
	return childNodesInfo;
	}
	
	public static Document getDocument(String fileName) throws Exception {
        DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
        factory.setNamespaceAware(true);
        DocumentBuilder builder = factory.newDocumentBuilder();
        Document doc = builder.parse(fileName);
        return doc;
    }

}
