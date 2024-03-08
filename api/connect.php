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
//   echo "Connected to database";

  // Your query and data processing logic here:
  $sql = "SELECT MusicUrl  FROM music_folder WHERE id = 1"; // Modify as needed
  $result = pg_query($conn, $sql);
  if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        print_r(json_encode($row['musicurl']));
      // Access and process data from $row
    }
    pg_free_result($result);
  } else {
    echo "Error executing query: " . pg_last_error($conn);
  }
}

pg_close($conn); // Close the connection after use
?>
