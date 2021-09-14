<?php
/*
* Author: Rohit Kumar
* Website: iamrohit.in
* Date: 09-03-2016
* App Name: Star rating system
* Description: Star rating demo using Jquery, PHP and Mysql
*/
include('connect.php'); 

function getRatingByProductId($productId) {
	
	global $con; 
	
	$stmt=$con->prepare( "SELECT SUM(vote) as vote, COUNT(vote) as count from rating WHERE product_id = $productId");
    
      $result = $stmt->execute();
      $resultSet = $stmt->fetch();
      if($resultSet['count']>0) {
      	return ($resultSet['vote']/$resultSet['count']);
      } else {
      	return 0;
      }
	
}
if(isset($_REQUEST['type'])) {
	if($_REQUEST['type'] == 'save') {
		$vote = $_REQUEST['vote'];
		$productId = $_REQUEST['productId'];
	    $stmt=$con->prepare("INSERT INTO rating (product_id, vote) VALUES ('$productId', '$vote')");
	    
	     $result=$stmt->execute(array($productId,$vote));
	      echo 1; exit;
	} 
}

?>
