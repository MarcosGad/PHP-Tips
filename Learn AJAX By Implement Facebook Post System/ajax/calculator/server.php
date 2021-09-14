<?php

$no1 = $_REQUEST['n1'];
$no2 = $_REQUEST['n2'];
$req = $_REQUEST['req'];

if ($req == 'add'){
    
    echo $no1 + $no2;
    
}elseif ($req == 'sub') {
    
    echo $no1 - $no2;
    
}elseif ($req == 'mult') {
    
    echo $no1 * $no2;
    
}elseif ($req == 'div') {
    
    echo $no1 / $no2;
    
}




//echo "Hello " . $no1 . " Your age is " . $no2;
