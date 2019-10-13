<?php
class LatestNews {
 function query_add_newsFeed($title, $picture, $desc){
  $sql="INSERT INTO gallery(title, picture, newsDesc, ts) ";
  $sql.="VALUES ('".$title."','".$picture."','".$desc."','".date('Y-m-d H:i:s')."');";
  return $sql;
 }
 function query_view_newsFeed(){
  return "SELECT * FROM gallery";
 }
 function query_view_newsFeedById($news_Id){
  return "SELECT * FROM gallery WHERE news_Id=".$news_Id.";";
 }
 function query_view_newsFeed3(){
  return "SELECT * FROM gallery LIMIT 6;";
 }
}

?>