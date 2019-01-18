<?php
$zone = 'UTC';
if(isset($_GET['z']) && $_GET['z'] != "") {
   $zone = base64_decode($_GET['z']);
}
date_default_timezone_set($zone);
//  Initiate curl
error_reporting(-1);
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59:3333/users');
curl_exec($ch);
curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59:3333/getCompanies');
$resultCompanies=curl_exec($ch);

curl_setopt($ch, CURLOPT_URL,'http://18.188.241.59/export/users.json');
$result=curl_exec($ch);

curl_close($ch);
$result = json_decode($result);
$resultCompanies = json_decode($resultCompanies);
$resultCompanies = (array)$resultCompanies;
array_to_csv_download($result, $filename = "users.csv", $delimiter=",",$resultCompanies);

function array_to_csv_download($array, $filename = "users.csv", $delimiter=",",$resultCompanies) {
    
    header('Content-Type: application/csv');  
    header('Content-Disposition: attachment; filename="'.$filename.'";');

    // open the "output" stream
    // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
    $f = fopen('php://output', 'w');
    $heading_array = array('id','name','email','companyName','profilePicUrl','createdAt','updatedAt');
    fputcsv($f, $heading_array, $delimiter);
    foreach ($array->Users as $line) {
        $line = (array)$line;
        $export_array =  array();
        $export_array[] = isset($line['id']) ? $line['id']: '';
        $export_array[] = isset($line['name']) ? $line['name']: '';
        $export_array[] = isset($line['email']) ? $line['email']: '';
        $export_array[] = (isset($line['companyId']) && array_key_exists($line['companyId'], $resultCompanies)) ? $resultCompanies[$line['companyId']]: '';
        $export_array[] = isset($line['profilePicUrl']) ? $line['profilePicUrl']: '';
        $export_array[] = isset($line['createdAt']) ? date('Y-m-d H:i:s',$line['createdAt']): '';
        $export_array[] = isset($line['updatedAt']) ? date('Y-m-d H:i:s',$line['updatedAt']): '';
        fputcsv($f, $export_array, $delimiter);
    }
}  

?>