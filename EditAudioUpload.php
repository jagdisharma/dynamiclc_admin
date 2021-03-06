<?php
require_once('include/getID3/getid3/getid3.php');

/*echo "<pre>";
print_r($_FILES);
exit("--");*/

$path = $_SERVER['SERVER_NAME'];

function generateRandomString($length = 5) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$random =  generateRandomString();

if (is_array($_FILES)) 
{
	$data1 = '';
	$data2 = '';

	if($_FILES['audioEdit']["name"] == '') 
	{
		$data2 = '';
		
	}else{

		if(is_uploaded_file($_FILES['audioEdit']['tmp_name'])) 
		{
			$sourcePath = $_FILES['audioEdit']['tmp_name'];
			$name 		= "Audio".$random.$_FILES['audioEdit']['name'];
			$name = str_replace(" ", "", $name);
			$name = strtotime(gmdate("Y-m-d H:i:s")).$name;
			$targetPath = $_SERVER['DOCUMENT_ROOT']."/Audio/".$name;
			if(move_uploaded_file($sourcePath,$targetPath)) 
			{
				$durasi = get_duration($targetPath);
				$endtime = date('H:i:s', strtotime($durasi));
				$data2 = "http://".$_SERVER['SERVER_NAME']."/Audio/".$name;
			}
		}
	}

	if($_FILES['imageEdit']["name"] == '') 
	{
		$data1 = '';
		
	}else{
		if(is_uploaded_file($_FILES['imageEdit']['tmp_name'])) 
		{
			$sourcePath = $_FILES['imageEdit']['tmp_name'];
			$name 		= "Images".$random.$_FILES['imageEdit']['name'];
			$name = str_replace(" ", "", $name);
			$name = strtotime(gmdate("Y-m-d H:i:s")).$name;
			$targetPath = $_SERVER['DOCUMENT_ROOT']."/images/".$name;
			if(move_uploaded_file($sourcePath,$targetPath)) 
			{
				$data1 = "http://".$_SERVER['SERVER_NAME']."/images/".$name;
			}
		}
	}

	echo json_encode(array('success'=>'1','msg'=>"Uploaded successfully.","data1" => $data1,"data2" => $data2 , "audioDuration" => $endtime));
}

function get_duration($filename){

    $getID3 = new getID3;

    $file = $getID3->analyze($filename);

    $duration_string = $file['playtime_string'];

    // Format string to be 00:00:00
    return format_duration($duration_string);
}

function format_duration($duration){

    // The base case is A:BB
    if(strlen($duration) == 4){
        return "00:0" . $duration;
    }
    // If AA:BB
    else if(strlen($duration) == 5){
        return "00:" . $duration;
    }   // If A:BB:CC
    else if(strlen($duration) == 7){
        return "0" . $duration;
    }
}