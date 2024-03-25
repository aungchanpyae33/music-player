<?php
header('Access-Control-Allow-Origin: *'); 
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
    $sql = "SELECT name FROM music WHERE id = $key1";
    $result = pg_query($conn, $sql);

  if ($result) {
    $file = pg_fetch_all($result);
    print_r(json_encode($file));
    // print_r(json_encode($file));

  } else {
    echo "Error executing query: " . pg_last_error($conn);
  }
  }}

pg_close($conn); // Close the connection after use

?>
