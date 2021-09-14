<?php 

$user = $_POST['user']; 
$pass = $_POST['pass']; 

if(strlen($user) < 3){

	echo 'not'; 
	
}else if(strlen($pass) < 6){

	echo "not";
}else {

	echo "success";
}

?> 