<?PHP 

if($_SERVER['REQUEST_METHOD'] == 'POST'):

 //  setting errors array 

 	$errors = array(); 

 // get info from the form 
 $image_name = $_FILES['my_work']['name']; 
 $image_type = $_FILES['my_work']['type'];
 $image_temp = $_FILES['my_work']['tmp_name'];
 $image_size = $_FILES['my_work']['size'];
 $image_error = $_FILES['my_work']['error'];
 
 echo 'Image Name:' . $image_name . '<br>';
 echo 'Image type:' . $image_type . '<br>';
 echo 'Image temp:' . $image_temp . '<br>';
 echo 'Image size:' . $image_size . '<br>';
 echo 'Image error:' . $image_error . '<br>';

 // set allowed files extensions 
 
 $allowed_extensions = array('jpg', 'gif', 'jpeg', 'png'); 

 //get file extensions

 $image_extensions =  strtolower(end(explode('.',$image_name))); 

 
 // check if file is uploaded
  
 if($image_error == 4):

 	 $errors[] = '<div>no file uploaded</div>';

 	else:

 		// check file size
		 if($image_size > 2000000):

		 	$errors[] = '<div>file cant be more than x</div>'; 

		 endif;
		 
		 // check if file is valid 

		 if(! in_array($image_extensions,$allowed_extensions)):

		 	 $errors[] = '<div>file is not valid</div>'; 

		 endif; 
		 

 endif;


 


 // check if has no errors
 if(empty($errors)):

 // move the file 
 move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] . '\PHP Multiple Upload Script/up/' . $image_name); 

 //success message 
 echo 'Image Upload'; 


else:
        // loop errors
 		foreach ($errors as $error):

 			echo $error; 

 		endforeach; 

endif; 


endif; 

?>



<form class="" action="" method="post" enctype="multipart/form-data">
	<input type="file" name="my_work" value=""><br><br>
	<input type="submit" name="" value="Upload">
</form>