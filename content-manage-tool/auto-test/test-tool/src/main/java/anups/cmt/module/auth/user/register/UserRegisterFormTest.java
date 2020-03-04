package anups.cmt.module.auth.user.register;

import anups.cmt.core.pojos.TestScenarios;
import anups.cmt.core.utils.Xml;

public class UserRegisterFormTest {

	public UserRegisterFormTest() {
		testCase01();
	}
	public void testCase01() {
		Xml xml = new Xml();
		TestScenarios testScenario = xml.getTestCase("00001");
		System.out.println("testScenario: "+testScenario);
	}
	
	public static void main(String args[]) {
		UserRegisterFormTest userRegisterFormTest = new UserRegisterFormTest();
	}
}
