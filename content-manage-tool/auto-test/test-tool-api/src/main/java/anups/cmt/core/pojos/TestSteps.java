package anups.cmt.core.pojos;

import java.util.LinkedHashMap;

import lombok.Data;

@Data
public class TestSteps {
 private String stepId;
 private String testStepTitle;
 private String testStepDesc;
 private LinkedHashMap<String, String> testData;
}
