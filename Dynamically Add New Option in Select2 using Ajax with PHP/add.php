<?php

//add.php

include('database_connection.php');

if(isset($_POST["category_name"]))
{
	$category_name = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["category_name"]);

	$data = array(
		':category_name'	=>	$category_name
	);

	$query = "
	SELECT * FROM category 
	WHERE category_name = :category_name
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	if($statement->rowCount() == 0)
	{
		$query = "
		INSERT INTO category 
		(category_name) 
		VALUES (:category_name)
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		echo 'yes';
	}
}

?>