<?php
$host = "ep-silent-bread-a1benv68.ap-southeast-1.aws.neon.tech";
$port = "5432";
$dbname = "verceldb";
$user = 'default';
$password = "bzQHjT5ok2xO";
$sslmode = "require";
$endpoint = "ep-silent-bread-a1benv68";
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=$sslmode options= 'endpoint=ep-silent-bread-a1benv68'";

$conn = pg_connect($conn_string);

if (!$conn) {
  echo "Failed to connect to database: " . pg_last_error();
} else {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the data is sent as JSON
    $data = json_decode(file_get_contents('php://input'), true);
    // Access the data
    $key1 = $data['song'];
    $sql = "SELECT MusicUrl FROM music_folder WHERE musicurl = $1";
    $result = pg_prepare($conn, "my_query", $sql);  // Prepare the statement
    
    if ($result) {
      $result = pg_execute($conn, "my_query", array($key1)); // Bind the parameter
      // ... process results ...
      while ($row = pg_fetch_assoc($result)) {
        print_r($row['musicurl']);
      }
    } else {
      echo "Error preparing query: " . pg_last_error($conn);
    }
  }}

pg_close($conn); // Close the connection after use

?>
