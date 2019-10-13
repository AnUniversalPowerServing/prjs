<?php 
session_start();
ini_set('max_execution_time',300);
date_default_timezone_set("Asia/Kolkata");
 
/* Logger Declaration in JSON */ 
include('../../../log4php/Logger.php'); 
Logger::configure('../../../backend/config/log-config.xml'); 
	
/* Database Credentials */
$DB_BASIC_SERVERNAME="localhost";
$DB_BASIC_NAME="rsbr";
$DB_BASIC_USER="rsbr";
$DB_BASIC_PASSWORD="@ADMIN123";

if($_SESSION["PROJECT_MODE"]=='DEBUG'){
$DB_BASIC_SERVERNAME="localhost:3306";
$DB_BASIC_NAME="rsbr";
$DB_BASIC_USER="root";
$DB_BASIC_PASSWORD="";
} 
/* Middleware Access URLs */	 
	 
// DB: myloc6lh_mlh
// USER: myloc6lh_root
// PASSWORD : myloc6lh_root
// SERVER : localhost:3306
