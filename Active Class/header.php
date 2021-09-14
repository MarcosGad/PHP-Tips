<?php

 function setActive($name = 'home') { // nktba m3 al pramiter 'home' ltfdya al 5t2a 3nd 3dm al t3wda ba pramiter fa al 2sfla 

      global $pageName; 
     if(isset($pageName) && $pageName == $name){
         
             echo "class='active'";
     }

 }



?> 


<!DOCTYPE html>
<html>
   <head>
         <meta charset="utf-8" />   
	     <title><?php  if (isset($pageName)) {echo $pageName;} ?></title>
	     <style>
	         .active {color: red; font-weight: bold; }	

	     </style>
   </head>
       <body>
           <ul>
           	 <li><a <?php if($pageName == 'about') { echo "class='active'"; } ?> href="about.php">About</a></li>

           	 <li><a <?php if($pageName == 'service') { echo "class='active'"; }?> href="service.php">Service</a></li>

           	 <li><a <?php if($pageName == 'map') { echo "class='active'"; } ?> href="map.php">Map</a></li>

           	 <li><a <?php setActive('index') ?> href="index.php">Index</a></li>
           </ul>
       </body>
</html>
