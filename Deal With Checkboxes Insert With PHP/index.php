<?php 
/*
   php version        : 5.5.19
   lesson name        : insert multiple checkboxes in one field 
   difficulty         :
   what we will use   :
   Author             :

*/


 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
   echo $_POST['username'] . '<br />';
   
   /*foreach ( $_POST['browser'] as $b) {

    echo $b; // lb3ta kza kima 

   }*/

    $allBrowsers = implode(',', $_POST['browser']); // kza kima f 7kla wa7da

    echo $allBrowsers . '<br />' ; // hna 5lna al 7kla et5lo al kima aly ana 3ezha w mfswla ba , 3la hy2ta string 

    $splitted = explode(',', $allBrowsers); // n7ol mn string la link 
    
    foreach ($splitted as $single) {
     
      echo '<a href="#">' . $single . '</a> <br />'; 

    }

 }

  ?>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  	<input type="text" name="username"> <br/>
  	<input type="checkbox" name="browser[]" value="chrome"> Chrome <br/>
  	<input type="checkbox" name="browser[]" value="firefox"> Firefox <br/>
  	<input type="checkbox" name="browser[]" value="opera"> Opera <br/>
  	<input type="submit" value="Add">
  </form>


