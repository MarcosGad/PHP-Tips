<?php 
/*
   php version        : 5.5.19
   lesson name        :  
   difficulty         :
   what we will use   :
   Author             :

*/
  
  $names = array("Osama","Ahmed","Sayed","Hassan"); 

  $forbiddenNamed = array("God","Admin","Root"); 

  if (in_array("Osama", $names)) { // lo if al2ol mt72a2tsh mash hyt5la 3la if al canya l2na al if da al 2sasia ho da nested if 

  	echo "- Your Name Is In Array"; // lo al name mogwod fa array 

  	if(strlen("Osama") > 3) {

  		echo"<br>- Your Name Characters More Than 3 Letters"; 

  		if(!in_array("Osama", $forbiddenNamed)) { // mash hebos 3la al if da 9er lma et72a2 al if aly 2blha 

         echo "<br>- Congratz Your Name Is Not forbidden";       

  		}
  	}
  }



  //echo strlen("Osama"); 