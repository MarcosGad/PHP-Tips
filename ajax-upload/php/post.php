<?php
//var_dump($_POST, $_FILES);
// if $_post and $files arrays contains data
if ( isset($_POST) && isset($_FILES) )
{
	// require upload function
	include_once('upload.php');

	if (isset($_POST['post_name']) 
		&& isset($_POST['post_title']) 
		&& isset($_POST['post_content']) 
	) {
		// IF field item_image contains file.. so execute upload function
		if (isset($_FILES["post_image"]))
			$item_image = UpFile();
		else
			$item_image = null;

		//Save post
		$db = new PDO('mysql:host=localhost;dbname=ajax-upload','root','');
			
		$sql = 'INSERT INTO  posts SET 
			name = "'.$_POST['post_name'].'", 
			title = "'.$_POST['post_title'].'", 
			content = "'.$_POST['post_content'].'", 
			thumb = "'.$item_image.'"
		';			
		echo $db->exec($sql); // if result = 1 : post saved

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

