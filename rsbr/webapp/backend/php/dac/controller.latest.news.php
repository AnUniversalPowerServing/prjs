<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.latest.news.php';

if(isset($_POST["action"])){
 if($_POST["action"]=='ADD_LATEST_NEWS'){
    $title=$_POST["title"]; 
    $picture=$_POST["picture"];
    $desc=$_POST["desc"];
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
    $latestNews = new LatestNews();
    $query = $latestNews->query_add_newsFeed($title, $picture, $desc);
    echo $database->addupdateData($query);
 } else if($_POST["action"]=='VIEW_LATEST_NEWS'){
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
	$latestNews = new LatestNews();
    $query = $latestNews->query_view_newsFeed();
	echo $database->getJSONData($query);
 } else if($_POST["action"]=='VIEW_LATEST_NEWS_BY_ID'){
    $news_Id = $_POST["news_Id"];
    $database = new Database($DB_BASIC_SERVERNAME,$DB_BASIC_NAME,$DB_BASIC_USER,$DB_BASIC_PASSWORD);
	$latestNews = new LatestNews();
    $query = $latestNews->query_view_newsFeedById($news_Id);
	echo $database->getJSONData($query);
 }

   
} else {  echo 'MISSING_ACTION'; }
// 
?>