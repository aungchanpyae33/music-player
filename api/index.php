<?php
   spl_autoload_register( function ($class){
    require __DIR__ . "/src/$class.php";
   } );
   set_exception_handler("ErrorHandler::handleException");
  
   $part =  explode("/",$_SERVER['REQUEST_URI']);

   if($part[3] !== 'getMusic'){
    http_response_code(500);
    exit;
   }
   $method = $_SERVER['REQUEST_METHOD'];
   $id = $part[4]?? null; 
   $database = new DatabaseConnect();
   $musicGate = new MusicGateWay($database);
   $test = new MusicController($musicGate);

   $test->reciveRequest($method,$id);
