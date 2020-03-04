package anups.cmt.core.pojos;

import java.util.LinkedHashMap;

import lombok.Data;

@Data
public class Expectations {
  private Boolean responseExpected;
  private LinkedHashMap<String,String> responseInfo;
}
