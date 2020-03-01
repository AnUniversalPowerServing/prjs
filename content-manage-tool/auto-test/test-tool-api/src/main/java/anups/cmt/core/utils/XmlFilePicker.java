package anups.cmt.core.utils;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

import anups.cmt.core.files.FileManager;

public class XmlFilePicker {

	List<String> files;
	
	public XmlFilePicker(String folder) {
		files = new ArrayList<String>();
		try {
			pickFiles(folder);
		} catch (Exception e) { e.printStackTrace(); }
	}
	
	public void pickFiles(String folder) throws Exception {
		 FileManager fileManager = new FileManager();
		  LinkedHashMap<String, String> listOfFiles = fileManager.getListOfFilesAndFolders(folder, null);
		  for (Map.Entry<String, String> entry : listOfFiles.entrySet()) {
			if("FILE".equalsIgnoreCase(entry.getValue())) {
			   String fileName = folder+entry.getKey();
			   if("lmx".equalsIgnoreCase(fileManager.getFileExtension(fileName))) {
				   files.add(fileName);
			   }
			} else if("DIRECTORY".equalsIgnoreCase(entry.getValue())) {
			   String dir = folder+entry.getKey()+"/";
			   pickFiles(dir);
			}
		  }
	 }
	
	public List<String> getFiles() {
		return files;
	}
	
}
