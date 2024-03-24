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
  echo "connect";
}
pg_close($conn); // Close the connection after use

?>
