<?php
 require('..\vendor\james-heinrich\getid3\getid3\getid3.php');
print_r($_FILES);

$type = $_FILES["music"]["type"];
$name = $_FILES["music"]["name"];

$tmp = $_FILES["music"]["tmp_name"];
print_r($name);
echo "<br>$type , $tmp";
$getID3 = new getID3();

$fileInfo = $getID3->analyze($tmp);

if($type === "audio/mpeg"){
  
  move_uploaded_file($tmp , "../music/$name");//can only use tempory file from input
  touch("../music/$name", filemtime($tmp)); 
  header("location: ../index.php");
}

if (isset($fileInfo['comments']['picture'][0])) {
  $pictureData = $fileInfo['comments']['picture'][0];

  // Extract the MIME type and image data
  $mimeType = $pictureData['image_mime'];
  $imageData = $pictureData['data'];
  print_r($mimeType);
  echo("hi");
  // Save the image to a folder
  $imageFilePath = "../photo/$name.png";
  file_put_contents($imageFilePath, $imageData);
  
  echo 'Album art saved to: ' . $imageFilePath;
} else {
  echo 'No album art found in the MP3 file.';
}
// {
//   "require": {
//     "aws/aws-sdk-php": "^3.300",
//     "php": "^7.3",
//     "tracy/tracy": "^2.6.0"
//   }
// }
