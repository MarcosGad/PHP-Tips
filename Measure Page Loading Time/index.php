<?php 
/*
   php version        : 5.5.19
   lesson name        :  
   difficulty         :
   what we will use   :
   Author             :

*/

  // microtime: return the current unix timestamp with microsconds --> byrg3a al w2ta al 5as bla page ba al microsconds  


   $startTime = microtime(true); // true tg3la al number float (.) 

   // echo $startTime; 

  //start from here 
   
   $range = range(1, 400000); // tatb3a array mn rakm ala rakm

   echo "<pre>";

   print_r($range); 

   echo "</pre>"; 
   
  // end here 

   $endTime = microtime(true);  

   //echo $endTime; // b3da t7mila al page

   $timeTaken = $endTime - $startTime; 

   //echo $timeTaken; // al time aly 5dato al page 3ashn y created 

   $timeTaken = round($timeTaken, 5); // ltkrab al rakm b3d al 0 ba 5 

   echo "page Generated In " . $timeTaken . " Seconds";  


