<?php 
 /* Project Params */
 $_SESSION["PROJECT_MODE"]='DEBUG';
 ini_set('max_execution_time',300);
 date_default_timezone_set("Asia/Kolkata");
 
 /* Logger Declaration in JSON */ 
	 include('../log4php/Logger.php'); 
	 Logger::configure('../conf/log-config.xml'); 
	
 /* Database Credentials */
 $DB_ECOM_SERVERNAME="";
 $DB_ECOM_NAME="";
 $DB_ECOM_USER="";
 $DB_ECOM_PASSWORD="";
 
if($_SESSION["PROJECT_MODE"]=='DEBUG'){
 $DB_ECOM_SERVERNAME="localhost:3306";
 $DB_ECOM_NAME="ecom";
 $DB_ECOM_USER="root";
 $DB_ECOM_PASSWORD="";
}
else {
 $DB_ECOM_SERVERNAME="148.66.138.151";
 $DB_ECOM_NAME="kalyanaveena";
 $DB_ECOM_USER="kalyanaveena";
 $DB_ECOM_PASSWORD="@ANUPanup123";
}
