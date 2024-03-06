<?php
 function go($path){
  // to get the folder file in music
  $directory = $path;
  // scandir is to use to get the folder like an array
  // array_diff(make rmeove some)
  $filesAndFolders = array_diff(scandir($directory , SCANDIR_SORT_NONE), array('.', '..'));
   //make filepath array that filemtime can access
  $file =  array_map( function($title) use ($directory){
    return $directory . '/' .$title;
  } , $filesAndFolders);

  usort($file, function($a,$b){return filemtime($a)-filemtime($b);});

  // step- remove "../" "replace
  // $fole = str_replace("~../~" , "" , $file);

  $fileJavascript = json_encode($file);
  print_r($fileJavascript);// this code is crucuial because it send teh json encoded data to client browser , to use javascript
 }

  
  