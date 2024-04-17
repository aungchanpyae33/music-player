<?php
class DatabaseConnect{
  public function connect(){
  $host = "ep-silent-bread-a1benv68.ap-southeast-1.aws.neon.tech";
  $port = "5432";
  $dbname = "verceldb";
  $user = 'default';
  $password = "bzQHjT5ok2xO";
  $sslmode = "require";
  $endpoint = "ep-silent-bread-a1benv68";
  $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=$sslmode options= 'endpoint=ep-silent-bread-a1benv68'";
  return $conn = pg_connect($conn_string);

  }
}