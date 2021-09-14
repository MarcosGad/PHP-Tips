<?php

$numbers = array(0,6,8,9,14,18,20,30,50); 

foreach ($numbers as $num): 
	 
 if ($num < 10): 
  
  if($num !== 0):

  echo '0' . $num . '<br>'; 

  else: 

  	echo 'zero' . '<br>'; 

 endif; 

 else: 

  echo '0' $num . '<br>'; 

 endif; 

endforeach;  


