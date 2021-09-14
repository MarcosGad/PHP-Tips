<?php 

  //https://php.net/manual/en/function.parse-url.php
  
  //YouTube Embed [https://www.youtube.com/embed/VIDEO_ID]


  $video = 'https://www.youtube.com/watch?v=o24Xpv1Bd1I'; 

  $parsedVideo = parse_url($video, PHP_URL_QUERY); 

  //echo $parsedVideo; 

  parse_str($parsedVideo, $MyArray); 

  //print_r($MyArray);

  //echo $MyArray['v']; 

  //echo $MyArray['list']; 

  echo '<iframe src="https://www.youtube.com/embed/' . $MyArray['v'] . '"></iframe>'; 



 