<?php 
	session_start(); 

	if(isset($_SESSION['email'])){

	echo 'Welcome ' . $_SESSION['email'];
	echo "<a href='logout.php'>Logout</a>";

}else{

	echo 'my error';
}
?>
