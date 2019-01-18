<?php 


$path = $_SERVER['SERVER_NAME'];

function generateRandomString($length = 5) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$random =  generateRandomString();

if(is_array($_FILES)) 
{
	$data = '';

	if($_FILES['pdf']){
		if(is_uploaded_file($_FILES['pdf']['tmp_name'])) 
		{
			$sourcePath = $_FILES['pdf']['tmp_name'];
			$name 		= "pdf".$random.$_FILES['pdf']['name'];
			$name = str_replace(" ", "", $name);
			$name = strtotime(gmdate("Y-m-d H:i:s")).$name;
			$targetPath = $_SERVER['DOCUMENT_ROOT']."/pdf/".$name;
			if(move_uploaded_file($sourcePath,$targetPath)) 
			{
				$data = "http://".$_SERVER['SERVER_NAME']."/pdf/".$name;
				//echo "Uploaded Successfully";
				/*echo json_encode(array('success'=>'1','msg'=>"Uploaded successfully.","data2" =>$data2));*/
			}
		}
	}

	echo json_encode(array('success'=>'1','msg'=>"Uploaded successfully.","data" => $data));
}