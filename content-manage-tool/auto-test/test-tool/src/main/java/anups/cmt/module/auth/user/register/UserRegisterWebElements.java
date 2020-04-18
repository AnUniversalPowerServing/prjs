package anups.cmt.module.auth.user.register;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.Select;

public class UserRegisterWebElements {

	private WebDriver driver;
	
	public UserRegisterWebElements(WebDriver driver) {
		this.driver = driver;
	}
	
	public WebElement getBadgeWebElement(String elementId) {
		return driver.findElement(By.cssSelector("span#"+elementId));
	}
	
	public WebElement getInputWebElement(String elementId) {
		return driver.findElement(By.xpath("//input[@id='"+elementId+"']"));
		
	}
	
	public WebElement getSelectWebElement(String elementId) {
		return driver.findElement(By.xpath("//select[@id='"+elementId+"']"));
	}
	
	public WebElement getDropdownWebElement(String elementId) {
		return driver.findElement(By.xpath("//div[@class='dropdown']/button[@id='"+elementId+"']"));
	}
	
	public WebElement getBadgeHeadingWebElement(String elementId) {
		return driver.findElement(By.xpath("//div[@id='"+elementId+"']/div/h5/b"));
	}
	
	public WebElement getWarningAlert(String elementId) {
		By by = By.xpath("//div[@id='"+elementId+"']/div");
		try {
			return driver.findElement(by);
		} catch(Exception e) {
			return null;
		}
	}
	
	public WebElement getDivButtonWebElement(String elementId) {
		return driver.findElement(By.xpath("//div[@id='"+elementId+"']/button"));
	}
	
	public WebElement getButtonWebElement(String elementId) {
		return driver.findElement(By.cssSelector("button#"+elementId));
	}
	public WebElement getSuccessOrErrorWebElement(String elementId, String type) {
		return driver.findElement(By.xpath("//"+type+"[@id='"+elementId+"']/parent::*//span"));
	}
}
