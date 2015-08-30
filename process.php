<?php
echo("enter?");
$conn = mysql_connect('localhost', 'root', 'doubleVDB', "DVDB");

if($conn === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
	$uploaddir = './pictures/';
	$filename = $uploaddir.basename($_FILES['fileToUpload']['name']);

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$gmail = mysqli_real_escape_string($conn, $_POST['ggaccount']);

	if(30000 < $_FILES['fileToUpload']['size']){
		echo("image size is so big");
		}
	else{
		if(($_FILES['fileToUpload']['error']) > 0) ||
		($_FILES['fileToUpload']['size'] <= 0)){
 			echo ("failed");
 		}
	 	else{
 			if(!is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){
 				echo "It's not transport by http";
	 		}
 			else{
 				if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $filename)){
 					echo "upload success";
					saveImage($name, $gmail, $filename);
				}
	 			else
 					echo "upload fail";
 			}
 		}
	}

	function saveImage($name, $gmail, $pic){
		$order = "insert into registerTable(Name, GoogleAccount, Picture) 
			values('$name', '$gmail', '$pic')";
		$result = mysqli_query($conn, $order);
	
		if($result)
		{
			echo "saveImage done";
		}
		else
		{
			echo "not done";
		}
	}
mysqli_close($conn);
?>
