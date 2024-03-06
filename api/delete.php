<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve session value sent from the client
    $sessionValue = $_GET['key'];
    $sessionValue1 = $_GET['key1'];
    // Store or process the session value in PHP
    $_SESSION['key'] = $sessionValue;
    $_SESSION['key1'] = $sessionValue1;

    // Send a response back to the client
    $filePath = $_SESSION['key'];
    $filePath1 = $_SESSION['key1'];
    
    $string = preg_replace('/^photo\//',"" , $filePath);
    $string1 = preg_replace('/^music\//',"" , $filePath1);
    echo $string1;
    // Check if the file exists before attempting to delete it
    
    if (file_exists($string)) {
        // Attempt to delete the file
        if (unlink($string)) {
            echo 'File deleted successfully.';
        } else {
            echo 'Unable to delete the file.';
        }
    } else {
        echo 'File does not exist.';
    }

    if (file_exists($string1)) {
      // Attempt to delete the file
      if (unlink($string1)) {
          echo 'File deleted successfully.';
      } else {
          echo 'Unable to delete the file.';
      }
  } else {
      echo 'File does not exist.';
  }
  header("location: ../index.php");
   
} else {
    // Handle other request methods or direct access to the script
    http_response_code(400);
    echo 'Bad Request';
}



