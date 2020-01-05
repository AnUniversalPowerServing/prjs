<?php

class JSONServiceManager {
/* CLASS DESCRIPTION:
 * =======================================================================================================
 *  READ AND UPDATE DATA FROM JSONFILE
 * =======================================================================================================
 *  1) $fileName = <PROJECT_PATH>.'backend/php/api/jsonTest.json';
 *     // <PROJECT_PATH> should be $_SERVER["DOCUMENT_ROOT"]
 *  2) $jsonDataObj = new JSONData();
 *  3) $content = $jsonDataObj->readJSONData($fileName); // reads the File
 *     The Data recieved in $content will be in the format of 
 *       -------------------------------------------------------------------------------------
 *      | {"dbServerLastUpdates":{"databaseName":{"Tbls":{"queue":"2019-06-29 15:26:45"}}}}   |
 *       -------------------------------------------------------------------------------------
 *  4) $content=json_decode($content); // decode JSON to update the Values of JSON
 *  5) $content->{"dbServerLastUpdates"}->{"databaseName"}->{"Tbls"}->{"queue"}=date('Y-m-d H:i:s');
 *      // In Step-4, updated queue value with CURRENT_TIMESTAMP
 *  6) $content=json_encode($content); //  encode JSON to upload back to File
 *  7) $jsonDataObj->updateJSONData($url,$content); // This will return size of JSON Data.
 * _______________________________________________________________________________________________________
 */
 function readJSONData($url){
   $content = @file_get_contents($url);
   if(strlen($content)>0){ return $content; }
   else { return '404(URL_NOT_FOUND)/EMPTY_DATA'; }
 }
 
 function updateJSONData($url,$content){
   return file_put_contents($url,$content);
 }

}

?>