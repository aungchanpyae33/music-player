<?php

class MusicGateWay{

  private PDO $conn;
  public function __construct(Database $database){
    $this->conn = $database->dbConnect();
  }

  public function GetAll() {
    $sql = "SELECT * FROM roles";

    $stmt = $this->conn->query($sql);
    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $data[] = $row;
    }
    return $data;
  }

  
public function create($data){
 $sql = "INSERT INTO roles (name,value) VALUES(:name , :value)";

 $stmt = $this->conn->prepare($sql);
}
}
