package anups.cmt.module.auth.user.register;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public class UserRegisterWebElements {

	private WebDriver driver;
	
	public UserRegisterWebElements(WebDriver driver) {
		this.driver = driver;
	}
	
	public WebElement getBadgeWebElement(String elementId) {
		return driver.findElement(By.cssSelector("span#"+elementId));
	}
	
	public WebElement getBadgeHeadingWebElement(String elementId) {
		return driver.findElement(By.xpath("//div[@id='"+elementId+"']/div/h5/b"));
	}
	
	public WebElement getWarningAlert(String elementId) {
		return driver.findElement(By.xpath("//div[@id='"+elementId+"']/div"));
	}
	public WebElement getButtonWebElement(String elementId) {
		return driver.findElement(By.cssSelector("button#"+elementId));
	}
}
