package anups.cmt.core.utils;

import java.util.ArrayList;
import java.util.LinkedHashMap;

import javax.naming.spi.ObjectFactory;
import javax.xml.bind.JAXBContext;
import javax.xml.bind.JAXBElement;
import javax.xml.bind.Unmarshaller;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpression;
import javax.xml.xpath.XPathFactory;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;

public class BuildDynamicPojo {

  public static ArrayList<String> getChildNodesInfo(Element element, String xpathExpression) {
	  ArrayList<String> childNodesInfo = new ArrayList<String>();
	  for(int childTagIndex=0;childTagIndex<element.getChildNodes().getLength();childTagIndex++) {
		 if(element.getChildNodes().item(childTagIndex).getNodeType() != Node.TEXT_NODE) {
			Element childElement = (Element)  element.getChildNodes().item(childTagIndex);
			String childTagName = childElement.getTagName();
			childNodesInfo.add(childTagName);
		 }
	  }
	return childNodesInfo;
  }
  
  public static void main(String args[]) throws Exception {
   String fileName = "C:\\wamp\\www\\prjs\\content-manage-tool\\auto-test\\test-tool\\src\\main\\resources\\test-scenarios\\auth\\user-login\\scenario-01.xml";
   
   Document document = XmlUtils.getDocument(fileName);
   XPathFactory xpathFactory = XPathFactory.newInstance();
   XPath xpath = xpathFactory.newXPath();
   XPathExpression expr = xpath.compile("/scenario");
   NodeList nodes = (NodeList) expr.evaluate(document, XPathConstants.NODESET);	
   if(nodes.getLength()>0) {
	   for(int index=0;index<nodes.getLength();index++) {
		   Element element = (Element) nodes.item(index);
		   
		   /* TagName*/
		   String tagName = element.getTagName();
		   String xpathExpression = "//"+tagName;
		   System.out.println("tagName: "+tagName);
		   
		   /* Tag Attributes */
		   int attributesSize = element.getAttributes().getLength();
		   if(attributesSize>0) {
			 for(int attributeIndex=0;attributeIndex<attributesSize;attributeIndex++) {
				 Node attribute = element.getAttributes().item(attributeIndex);
				 String key = attribute.toString().split("=")[0];
				 String value = attribute.toString().split("=")[1].replace("\"", "");
				 System.out.println(key+" : "+value);
			 }
		   }
		  
		   /* ChildTags */
		   ArrayList<String> childNodesInfo = getChildNodesInfo(element,xpathExpression);
		   System.out.println("childNodesInfo: "+childNodesInfo);
		   
		   ArrayList<String> childNodesInfoExpressions = new ArrayList<String>();
		   for(int childNodesInfoIndex=0;childNodesInfoIndex<childNodesInfo.size();childNodesInfoIndex++) {
			   childNodesInfoExpressions.add(xpathExpression+"/"+childNodesInfo.get(childNodesInfoIndex));
		   }
		   System.out.println("childNodesInfoExpressions: "+childNodesInfoExpressions);
	   }
   } 
   
  }
  
}
