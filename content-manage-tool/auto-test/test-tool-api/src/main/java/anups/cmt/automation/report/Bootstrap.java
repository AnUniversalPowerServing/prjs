package anups.cmt.automation.report;

public class Bootstrap {

  public static String buildHTMLContent(String pageTitle, String htmlBody) {
	StringBuilder sb = new StringBuilder();
	sb.append("<!DOCTYPE html>").append("\n");
	sb.append("<html lang=\"en\">").append("\n");
	sb.append("<head>").append("\n");
	sb.append("<title>").append(pageTitle).append("</title>").append("\n");
	sb.append("<meta charset=\"utf-8\">").append("\n");
	sb.append("<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">").append("\n");
	sb.append("<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css\">").append("\n");
	sb.append("<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>").append("\n");
	sb.append("<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js\"></script>").append("\n");
	sb.append("<script type=\"text/javascript\">").append("</script>").append("\n");
	sb.append("<style>").append("\n");
	sb.append("body{ font-size:12px; }").append("\n");
	sb.append("table { width:100%; }").append("\n");
	sb.append("td { padding:10px; }").append("\n");
	sb.append("</style>").append("\n");
	sb.append("</head>").append("\n");
	sb.append("<body>").append("\n").append(htmlBody).append("</body>").append("\n");
	sb.append("</html>").append("\n");
	return sb.toString();
  }
  
  public static String getPoints(String[] points) {
	 StringBuilder sb = new StringBuilder();
	 sb.append("<ul>");
	 for(int index=0;index<points.length;index++) { sb.append("<li>").append(points[index]).append("</li>"); }
	 sb.append("</ul>");
	 return sb.toString();
  }
  public static String getSuccessIcon() {
	 return "<span class=\"glyphicon glyphicon-ok\" style=\"color:green;\"></span>";
  }
  
  public static String getErrorIcon() {
		 return "<span class=\"glyphicon glyphicon-remove\" style=\"color:red;\"></span>";
	  }
  
  public static String buildH4Heading(String heading) {
	StringBuilder sb = new StringBuilder();
	sb.append("<h4  align=\"center\"><b>").append(heading).append("</b></h4>");
	return sb.toString();
  }
  
  public static String buildH5Heading(String heading) {
    StringBuilder sb = new StringBuilder();
    sb.append("<h5><b>").append(heading).append("</b></h5>").append("\n");
    return sb.toString();
  }
  
  public static String buildHDiv(String content) {
	    StringBuilder sb = new StringBuilder();
	    sb.append("<div style=\"margin-top:5px;margin-bottom:5px;\"><b>").append(content).append("</b></div>").append("\n");
	    return sb.toString();
}
  
  public static String buildBold(String content) {
	StringBuilder sb = new StringBuilder();  
	sb.append("<b>").append(content).append("</b>");
	return sb.toString();
  }
  
  public static String buildContainerFluid(String[] rows) {
	StringBuilder sb = new StringBuilder();
	sb.append("<div class=\"container-fluid\">").append("\n");
	for(int index=0;index<rows.length;index++) { sb.append(rows[index]); }
	sb.append("</div>").append("\n");
	return sb.toString();
  }
  
  public static String buildContainerFluidRow(int cols, String[] col) {
	int div = 12/cols;
	StringBuilder sb = new StringBuilder();
	sb.append("<div class=\"row\" style=\"padding-left:5px;\">");
	for(int index=0;index<cols;index++) {
      if(index<col.length) {
	      sb.append("<div class=\"col-sm-").append(div).append("\">").append(col[index]).append("</div>").append("\n");
      } else {
    	  sb.append("<div class=\"col-sm-").append(div).append("\">").append("</div>").append("\n");
      }
	}
	sb.append("</div>").append("\n");
	return sb.toString();
  }
  
  public static String buildListGroup(String[] listGroupItem) {
	StringBuilder sb = new StringBuilder();
	sb.append("<div class=\"list-group\">").append("\n");
	for(int index=0;index<listGroupItem.length;index++) {
	  sb.append("<div class=\"list-group-item\">").append(listGroupItem[index]).append("</div>").append("\n");
    }
	sb.append("</div>").append("\n");
	return sb.toString();
  }
  
  public static String buildTable(String tableRow) {
	StringBuilder sb = new StringBuilder("<table>").append("\n");
	sb.append(tableRow);
	sb.append("</table>").append("\n");
	return sb.toString();
  }
  
  public static String buildTableRow(String[] row, Boolean isPassed) {
	StringBuilder sb = new StringBuilder();
	if(isPassed == null) {
	  sb.append("<tr style=\"background-color:#fdffe5;border:1px solid #ccc;\">").append("\n");
	} else if(isPassed) {
	  sb.append("<tr style=\"background-color:#e3ffe3;border:1px solid #ccc;\">").append("\n");
	} else {
		sb.append("<tr style=\"background-color:#ffeeed;border:1px solid #ccc;\">").append("\n");
	}
	for(int index=0;index<row.length;index++) { sb.append("<td>").append(row[index]).append("</td>"); }
	sb.append("</tr>").append("\n");
	return sb.toString();
  }
  
  public static String buildHglError(String content) {
	StringBuilder sb = new StringBuilder(); 
	sb.append("<div style=\"border:1px dashed #ccc;padding:5px;background-color:#fde1df;\">");
	sb.append(content);
	sb.append("</div>");
	return sb.toString();
  }
  
  public static String buildSimpleDiv(String content, boolean bold) {
	    StringBuilder sb = new StringBuilder();
	    sb.append("<div>");
	    if(bold) { sb.append("<b>"); }
	    sb.append(content);
	    if(bold) { sb.append("</b>"); }
	    sb.append("</div>").append("\n");
	    return sb.toString();
  }
  
  public static String buildBadge(String badgeTitle) {
    StringBuilder sb = new StringBuilder();
    sb.append("<span class=\"badge\">").append(badgeTitle).append("</span>");
    return sb.toString();
  }
  
  public static String buildLabel(String labelTitle, String labelType) {
    StringBuilder sb = new StringBuilder();
    sb.append("<span class=\"label label-").append(labelType).append("\">").append(labelTitle).append("</span>");
	return sb.toString();
  }
  
  public static void main(String[] args) {
	String label = Bootstrap.buildLabel("12", "danger");
	String[] listGroupItem = {"Hello "+label};
	String listGroup = Bootstrap.buildListGroup(listGroupItem);
	String rows = Bootstrap.buildContainerFluidRow(3, new String[] {listGroup});
	String htmlContent = Bootstrap.buildContainerFluid(new String[] {rows});
	String html = buildHTMLContent("TestPage",htmlContent);
	System.out.println(html);
  }
  
}
