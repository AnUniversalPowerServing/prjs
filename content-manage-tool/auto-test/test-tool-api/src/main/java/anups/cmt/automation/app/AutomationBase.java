package anups.cmt.automation.app;

import java.awt.AWTException;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.opera.OperaDriver;

public class AutomationBase extends AutomationSettings {
	
	WebDriver driver;
	
	public AutomationBase(String url) {
		System.setProperty("webdriver.opera.driver", OPERA_DRIVER);
		 driver = new OperaDriver();
		 driver.get(url);
	}
	
	public WebDriver getDriver() {
		return driver;
	}
	
	public void quit() throws InterruptedException, AWTException {
		Thread.sleep(5000);
		driver.quit();
	}
	
	
}
