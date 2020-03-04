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
		Thread.sleep(1000);
		driver.quit();
	}
	
	public void doubleClickButton(WebElement webElementId) {
		Actions actions = new Actions(driver);
		actions.doubleClick(webElementId).perform();
	}
	
	public void singleClickButton(WebElement webElementId) {
		Actions actions = new Actions(driver);
		actions.click(webElementId).perform();
	}
	
	public void rightClickButton(String webElementId) {
		Actions actions = new Actions(driver);
		WebElement elementLocator = driver.findElement(By.id(webElementId));
		actions.contextClick(elementLocator).perform();
	}
}
