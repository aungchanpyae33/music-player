<?php

class Database {
   public function __construct(private $host,
                      private $name,
                      private $user,
                      private $password,
   ){
    
   }
  
  public function dbConnect() : PDO {
    $db = "mysql:host={$this->host};dbname={$this->name};charset=utf8";

    return new PDO($db,$this->user,$this->password);
  }
}