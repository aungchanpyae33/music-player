<?php
 class MusicController{
  public function __construct(private MusicGateWay $musicGate){}
  public function reciveRequest($method,$id){
    if($id){
     $this->requestForSpecData($id);
    }
    else{
     $this->requestForDataGroup($method);
    }
  }
  
  public function requestForSpecData($id){
    print_r($id);
  }

  public function requestForDataGroup($method){
    switch ($method){
      case  'GET' : 
        print_r(json_encode($this->musicGate->getAll()));
      break;

      case 'POST' :
      print_r('post');
    }
  }
  
 }