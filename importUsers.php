<?php 

//echo "<pre>"; print_r($_POST); print_r($_FILES);

if($_FILES['importUsers']['name']){

	$importUsers = explode('.',$_FILES['importUsers']['name']);
	if($importUsers[1] == 'csv'){
		$handle = fopen($_FILES['importUsers']['tmp_name'], "r");
		while (($data = fgetcsv($handle, 101, ",")) !== FALSE) {
			//echo "<pre>"; print_r($data); 
			?>
			<script type="text/javascript">
				var currentRowUser = '<?php echo json_encode($data,) ?>';
				//console.log("currentRowUser---------->", currentRowUser);
			</script>
			<?php 
		}
		fclose($handle);
	//exit("All file read is done--------->");
	}
}