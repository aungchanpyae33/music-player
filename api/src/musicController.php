<?php
class musicController {
  public function __construct(private MusicGateWay $musicgate){}

  public function processMusicRequest($method,$id){
    if($id){
       $this->specSong($id);
    }else{
      $this->songCollect($method);
    }
  }

  private function specSong($id){
    print_r($method, $id);
  }

  private function songCollect($method){
    switch($method){
      case 'GET' :
        echo json_encode($this->musicgate->GetALL());
        break;

      case "POST":
        $data=  (array) json_decode(file_get_contents("php://input"));
        var_dump($data);
    }
  }

}