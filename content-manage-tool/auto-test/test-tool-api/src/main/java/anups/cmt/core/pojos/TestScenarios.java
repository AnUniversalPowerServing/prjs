package anups.cmt.core.pojos;

import lombok.Data;

@Data
public class TestScenarios {
  private String scenarioTitle;
  private String scenarioDesc;
  private TestCases testCases;
}
