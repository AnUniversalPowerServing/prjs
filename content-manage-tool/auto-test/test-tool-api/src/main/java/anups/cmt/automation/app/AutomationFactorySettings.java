package anups.cmt.automation.app;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.interactions.Actions;

public class AutomationFactorySettings {
	
	WebDriver driver;
	
	public AutomationFactorySettings(WebDriver driver) {
		this.driver = driver;
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
