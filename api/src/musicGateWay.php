<?php
class MusicGateWay{
 private $conn;

 public function __construct(DatabaseConnect $database){
   $this->conn = $database->connect();
 }

 public function getAll(){
  $sql = "SELECT  name,id FROM music";
  $runQuery = pg_query($this->conn,$sql);
  if($runQuery){
    $data = pg_fetch_all($runQuery);
    return $data;
  }else{
    http_response_code(404);
    preg_last_error($this->conn);
  }
  pg_close($this->conn);
 }
}