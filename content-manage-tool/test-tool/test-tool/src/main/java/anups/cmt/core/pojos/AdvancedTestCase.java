package anups.cmt.core.pojos;

import java.util.List;
import lombok.Data;

@Data
public class AdvancedTestCase {
 private String testCase;
 private String testDesc;
 private List<TestSteps> testSteps;
}

