<?php

spl_autoload_register(function ($class){
  require __DIR__ . "/src/$class.php";
});
set_exception_handler("ErrorHandler::handleException");
header("Content-type: application/json; charset = UTF-8");
$parts = explode("/" , $_SERVER['REQUEST_URI']);

if($parts[3] != 'hellobitch'){
  http_response_code(404);
  exit;
}
$id = $parts[4] ?? null;
$database = new Database('localhost' ,'project','root',"");

$gateWay = new MusicGateWay($database);

$controller = new musicController($gateWay);

$controller->processMusicRequest($_SERVER['REQUEST_METHOD'] , $id);