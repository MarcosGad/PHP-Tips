<?php 
/*
   php version        : 5.5.19
   lesson name        : 
   difficulty         :
   what we will use   :
   Author             :

*/
   /*
   $dir = __DIR__ . '/inc/'; // incloud path var 

   //echo $dir; 

   foreach (scandir($dir) as $file) {

      //echo $file . "<br>";// print all files 

      if (pathinfo($file, PATHINFO_EXTENSION) === 'php' || pathinfo($file, 

          PATHINFO_EXTENSION)=== 'inc') {        // bt2kd fa files php w inc

        //echo $file . '<br>'; // print asma al file bs 

        include $dir . $file;  // m7to al file nfso 
      } 
   }
   */ 

   $dir = __DIR__ . '/inc/'; 

   $exts = array("php","inc"); // amtdat al file 

   foreach (scandir($dir) as $file) {

      if ( in_array(pathinfo($file, PATHINFO_EXTENSION), $exts) ) {     

      // lo al path mogod fa exts  al array 

        include $dir . $file;  
   }
 }



