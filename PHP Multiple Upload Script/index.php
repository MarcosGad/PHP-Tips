
<?PHP 

/* 

http://php.net/manual/en/function.dirname.php
http://php.net/manual/en/function.getcwd.php
http://php.net/manual/en/function.realpath.php

realpath(dirname(getcwd()))

*/

if($_SERVER['REQUEST_METHOD'] == 'POST'):

	 // setting errors array 

 	    $errors = array(); 
    
    // setting database image name

 	    $all_images = array(); 


    $uploaded_files = $_FILES['my_work']; 


 // get info from the form 
 $image_name = $uploaded_files['name']; 
 $image_type = $uploaded_files['type'];
 $image_temp = $uploaded_files['tmp_name'];
 $image_size = $uploaded_files['size'];
 $image_error = $uploaded_files['error'];

 // set allowed files extensions 
 
 $allowed_extensions = array('jpg', 'gif', 'jpeg', 'png'); 


 // check if file is uploaded 

 if($image_error[0] == 4): // no file uploaded 

 		echo'<div>No File Uploaded</div>';

 	else: // theres files uploded 
      
       $files_count = count($image_name); 

		 for ($i = 0; $i < $files_count; $i++){
		     
		    // setting errors array 
		 	$errors = array(); 

		 	//get file extensions

            $image_extensions[$i] =  strtolower(end(explode('.',$image_name[$i]))); 
		     
		    //get random  name for file 

		    $image_random[$i] = rand(0, 1000000000000000) . '.' .$image_extensions[$i]; 


		         // check file size
		         if($image_size[$i] > 2000000):

				 	$errors[] = '<div>file cant be more than x</div>'; 

				 endif;

				 // check if file is valid 

				 if(! in_array($image_extensions[$i],$allowed_extensions)):

				 	 $errors[] = '<div>file is not valid</div>'; 

				 endif;
		     
		        // check if has no errors
		         if(empty($errors)):

		         // move the files 
		         move_uploaded_file($image_temp[$i], $_SERVER['DOCUMENT_ROOT'] . '\PHP Multiple Upload Script/up/' . $image_random[$i]); 

		         //success message 
		         echo '<div style="background-color:#EEE;padding:10px;margin-bottom:20px;">';
		         echo '<div> File Number ' . ($i + 1) . ' Upload </div>';
		         echo '<div> File Name : ' . $image_name[$i] .'</div>'; 
		         echo '<div> New Name : ' . $image_random[$i] .'</div>'; 
		         echo '</div>'; 

		         $all_images[] = $image_random[$i]; 

		        else:
		                
		            echo '<div style="background-color:#EEE;padding:10px;margin-bottom:20px;">';
		     
		            echo 'Errors For File Number ' . ($i + 1);
		     
		            echo 'File Name ' . $image_name[$i];

		                // loop errors
		                foreach ($errors as $error):

		                    echo $error; 

		                endforeach; 
		     
		            echo '</div>'; 
		            

		        endif;

		 }


 endif; 

 		//print_r($all_images); 

 		$img_field = implode(',', $all_images); 

 		//echo $img_field; 

endif; 

?>



<form class="" action="" method="post" enctype="multipart/form-data">
	<input type="file" name="my_work[]" multiple="multiple" value=""><br><br>
	<input type="submit" name="" value="Upload">
</form>

