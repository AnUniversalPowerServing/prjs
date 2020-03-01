package anups.cmt.core.constants;

import java.awt.Toolkit;
import java.awt.datatransfer.Clipboard;

public class ProjectBase {

	public static final String PROJECT_URL=System.getProperty("user.dir");
	
	public static final String RESOURCE_SERVER_FOLDER = "src/main/resources/server/";
	
	public static final String RESOURCE_SCENARIOS_FOLDER = "src/main/resources/test-scenarios/";
	
	public static final String RESOURCE_DATA_FOLDER = "src/main/resources/test-data/";
	
	public static final String OUTPUT_FOLDER = "src/gen/output/";
	
	public static final String OPERA_DRIVER = RESOURCE_SERVER_FOLDER+"operadriver.exe";
	
	public static final Clipboard clipboard = Toolkit.getDefaultToolkit().getSystemClipboard();
	
}
