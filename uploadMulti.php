<?php
$host = 'localhost';
$user = 'root';
$pass = 'doubleVDB';

mysql_connect($host, $user, $pass);

mysql_select_db('DVDB');
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno);
}
else
	echo "connected";

$name = "ex4";
$gmail = "";
//$imagename = $_FILES["fileToUpload"]["name"]; 

//Get the content of the image and then add slashes to it 
//$imagetmp = addslashes (file_get_contents($_FILES['fileToUpload']['tmp_name']));

//$folder="/var/www/html/pictures/{$imagename}";
//echo $imagetmp;
//Insert the image name and image content in image_table
for($i=1; $i<=7; $i++){
	$folder="/var/www/html/pictures/subject07_0{$i}.jpg";
	$insert_image="INSERT INTO registerTable(Name, imagePath) 
			VALUES('$name','$folder')";

	if(mysql_query($insert_image))
		echo " insert query execute successfully";
}
/*
	$folder="/var/www/html/pictures/subject04_01.jpg";
	$insert_image="INSERT INTO registerTable(Name, imagePath) 
			VALUES('$name','$folder')";

	if(mysql_query($insert_image))
		echo " insert query execute successfully";
	
	$folder="/var/www/html/pictures/subject04_03.jpg";
	$insert_image="INSERT INTO registerTable(Name, imagePath) 
			VALUES('$name','$folder')";

	if(mysql_query($insert_image))
		echo " insert query execute successfully";
*/
//if(mysql_query($insert_image))
//	echo " insert query execute successfully";

//upload to server

//move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $folder);
//	echo "upload file worked!";

	

?>
