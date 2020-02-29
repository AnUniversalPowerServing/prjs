package anups.cmt.core.pojos;

import java.util.LinkedHashMap;

import lombok.Data;

@Data
public class TestCases {
/* ===========================================================================================
 * DESCRIPTION:
 * ============================================================================================
 *   If testSteps = null and testData != null then Simple Test Case  (Without Test Steps)
 *   Else If testSteps != null and testData == null then Advanced Test Case (With Test Steps)
 */
  private String testId;
  private String testCaseTitle;
  private String testCaseDesc;
  private TestSteps testSteps;
  private LinkedHashMap<String, String> testData;
}
