<?php 
$dsn = 'mysql:host=localhost;dbname=chatapp'; 
$user='root';
$pass='';
$option=array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
); 

try{

	$con=new PDO($dsn,$user,$pass,$option);

}catch(PDOException $e){
	echo "field to connect" . $e ->getMessage();
}


