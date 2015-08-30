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

$name = $_POST['name'];
$gmail = $_POST['ggaccount'];
$imagename = $_FILES["fileToUpload"]["name"]; 

/*
echo $name;
echo $gmail;
echo $imagename;
*/

//Get the content of the image and then add slashes to it 
$imagetmp = addslashes (file_get_contents($_FILES['fileToUpload']['tmp_name']));

$folder="/var/www/html/pictures/{$imagename}";
//echo $imagetmp;
//Insert the image name and image content in image_table
$insert_image="INSERT INTO registerTable(Name, GoogleAccount, Picture, imagePath) 
VALUES('$name','$gmail','$imagetmp', '$folder')";

if(mysql_query($insert_image))
	echo " insert query execute successfully";

//upload to server

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $folder);
//	echo "upload file worked!";

	

?>
