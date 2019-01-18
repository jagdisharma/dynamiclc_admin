<?php
$zone = 'UTC';
if(isset($_GET['z']) && $_GET['z'] != "") {
   $zone = base64_decode($_GET['z']);
}
date_default_timezone_set($zone);
//  Initiate curl
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59:3333/events');
$eventsUsers = curl_exec($ch);
curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59:3333/getUsers');
$resultUsers = curl_exec($ch);
curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59:3333/getCompanies');
$resultCompanies=curl_exec($ch);
curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59:3333/getUsersCompanyIds');
$resultUserCompanyIds=curl_exec($ch);
curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59:3333/getContents');
$resultContents = curl_exec($ch);
curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59/export/events.json');
$result=curl_exec($ch);
curl_close($ch);
$result = json_decode($result);
$resultUsers = json_decode($resultUsers);
$resultUsers = (array)$resultUsers;
$resultCompanies = json_decode($resultCompanies);
$resultCompanies = (array)$resultCompanies;
$resultUserCompanyIds = json_decode($resultUserCompanyIds);
$resultUserCompanyIds = (array)$resultUserCompanyIds;
$resultContents = json_decode($resultContents);
$resultContents = (array)$resultContents;
array_to_csv_download($result, $filename = "events.csv", $delimiter=",",$resultUsers,$resultContents,$resultCompanies,$resultUserCompanyIds);

function array_to_csv_download($array, $filename = "export.csv", $delimiter=",",$resultUsers,$resultContents,$resultCompanies,$resultUserCompanyIds) {
    
    header('Content-Type: application/csv');  
    header('Content-Disposition: attachment; filename="'.$filename.'";');

    // open the "output" stream
    // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
    $f = fopen('php://output', 'w');
    $heading_array = array('id','User','Duration(sec)','Type','StartAt','EndAt','CreatedAt','Content Name','App Version','Company Name');
    fputcsv($f, $heading_array, $delimiter);
    foreach ($array->Events as $line) {
        $line = (array)$line;
        $export_array =  array();
        
        $export_array[] = isset($line['id']) ? $line['id']: '';
        if(isset($line['userId']) && array_key_exists($line['userId'], $resultUsers)) {
            $export_array[] = $resultUsers[$line['userId']];
        } else {
            $export_array[] = '';    
        }
        
        $export_array[] = isset($line['duration']) ? $line['duration']: '';
        if(isset($line['type']) && $line['type'] == '0') {
            $export_array[] = 'Audio';
        } else if(isset($line['type']) && $line['type'] == '1') {
            $export_array[] = 'Video';
        } else if(isset($line['type']) && $line['type'] == '2') {
            $export_array[] = 'PDF';
        } else if(isset($line['type']) && $line['type'] == '3') {
            $export_array[] = 'Unguided Timer';
        } else  {
            $export_array[] = '';
        }
        $export_array[] = isset($line['startAt']) ? date('Y-m-d H:i:s',$line['startAt']): '';
        $export_array[] = isset($line['endAt']) ? date('Y-m-d H:i:s',$line['endAt']): '';
        $export_array[] = isset($line['createdAt']) ? date('Y-m-d H:i:s',$line['createdAt']): ''; 
        if(isset($line['contentId']) && array_key_exists($line['contentId'], $resultContents)) {
            $export_array[] = $resultContents[$line['contentId']];
        } else {
            $export_array[] = '';    
        }
        $export_array[] = isset($line['appVersion']) ? "v-".(string)$line['appVersion']: '';
        
        if(isset($line['userId']) && array_key_exists($line['userId'], $resultUsers)) {
            $companyId = $resultUserCompanyIds[$line['userId']];
            $export_array[] = $resultCompanies[$companyId];
        } else {
            $export_array[] = '';    
        }
        fputcsv($f, $export_array, $delimiter);
    }
}

?>