<?php
	$target_path = "img/"; //The file path on the server where we want the file to be uploaded.

	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); //'name' contains the original path of the file on the user's computer. You can leave 'name' alone. You just need to make sure that 'uploadedfile' matches your html form's field name.

	
	//tmp_name is the path to a temporary file on the server. If move_uploaded_file is not used, the temporary file will be deleted. So we designate where the temporary file is, then move it to permanent storage on the server.
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { //move_uploaded_file moves the file from the user's computer to the server (i.e., uploads it!). "uploadedfile" is the name of the field in the html form
	 include 'add.php';
		
	} else{
	
		echo "There was an error uploading the file, please try again!";         //Tells the user the file was not uploaded successfully
	
	}
?>