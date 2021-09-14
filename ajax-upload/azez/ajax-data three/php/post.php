<?php
//var_dump($_POST, $_FILES);
// if $_post and $files arrays contains data
if ( isset($_POST))
{
	// require upload function
	include_once('upload.php');

	if (isset($_POST['post_name']) 
		&& isset($_POST['post_name_two']) 
		&& isset($_POST['post_name_three']) 
		&& isset($_POST['post_number']) 
		&& isset($_POST['post_namehusband']) 
		&& isset($_POST['post_namehusband_two'])
		&& isset($_POST['post_namehusband_three'])
		&& isset($_POST['post_phone'])
		&& isset($_POST['post_address'])
		&& isset($_POST['post_note'])
		&& isset($_POST['post_date'])
		
	) {
		// IF field item_image contains file.. so execute upload function
		//if (isset($_FILES["post_image"]))
			//$item_image = UpFile();
		//else
			//$item_image = null;

		//Save post

$dsn='mysql:host=localhost;dbname=test';

$user='root';

$pass='';

$option=array(

PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8'

);

try{

	$con=new PDO($dsn,$user,$pass,$option);

	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	//echo'you are connected welcome to database';

}

catch(PDOException $e){

	echo 'failed to connect'.$e->getMessage();

}
		
		//$db = new PDO('mysql:host=localhost;dbname=test','root','');
			
		$sql = 'INSERT INTO posts SET 
			name = "'.$_POST['post_name'].'", 
			name_two = "'.$_POST['post_name_two'].'", 
			name_three = "'.$_POST['post_name_three'].'", 
			number = "'.$_POST['post_number'].'", 
			namehusband = "'.$_POST['post_namehusband'].'",
			namehusband_two	= "'.$_POST['post_namehusband_two'].'",
			namehusband_three = "'.$_POST['post_namehusband_three'].'",
			phone = "'.$_POST['post_phone'].'",
			address = "'.$_POST['post_address'].'",
			note = "'.$_POST['post_note'].'",
			date = "'.$_POST['post_date'].'"
			
		';			
		echo $con->exec($sql); // if result = 1 : post saved

	} else {
		echo 'Some fields are required !';	
	}
// if nothing isset
}
else
{
	echo '<h1>Not Found !</h1>';	
}

?>

