package anups.cmt.automation.app;

import java.awt.Toolkit;
import java.awt.datatransfer.Clipboard;

public class AutomationSettings {
	
	public static final String PROJECT_URL=System.getProperty("user.dir");
	
	public static final String RESOURCE_FOLDER = "src/main/resources";
	
	public static final String OPERA_DRIVER = PROJECT_URL+"/"+RESOURCE_FOLDER+"/server/operadriver.exe";
	
	public static final Clipboard clipboard = Toolkit.getDefaultToolkit().getSystemClipboard();
}
