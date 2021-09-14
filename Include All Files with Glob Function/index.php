<?php 
/*
   php version        : 5.5.19
   lesson name        : 
   difficulty         :
   what we will use   :
   Author             :

*/

  /* foreach (glob('inc/*.php') as $file) { // kol al file aly a5ro .php 
    
    echo $file . '<br />'; 
  } */

   foreach (glob('inc/*.{php,inc}',GLOB_BRACE) as $file) { 
    
    //echo $file . '<br />'; // kol al file aly a5ro .php w .inc w GLOB_BRACE lzalk

   include $file; // azhra m7tow al files .php w .inc 


   /* foreach (glob('inc/*.css') as $file){

    	echo "<link rel='stylesheet' href='". $file ."'>"; */

  }