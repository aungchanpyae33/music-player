<?php
require  __DIR__ .'/../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$s3Client = new S3Client([
    'credentials' => [
        'key' => 'z4Ebn7EeWBpWggyQ',
        'secret' => 'vwWCnmkjUYycF91UX1r0XPdbIMdGFjjugan1Tq1H',
    ],
    'endpoint' => 'https://s3.tebi.io',
    'region' => 'de',
    'version' => '2006-03-01',
]);

$bucketName = 'music2';
$audioUrl = "https://s3.tebi.io/mp3.file332/";
try {
    $objects = $s3Client->listObjectsV2([
        'Bucket' => $bucketName
    ]);

    $host = "ep-silent-bread-a1benv68.ap-southeast-1.aws.neon.tech";
$port = "5432";
$dbname = "verceldb";
$user = 'default';
$password = "bzQHjT5ok2xO";
$sslmode = "require";
$endpoint = "ep-silent-bread-a1benv68";
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=$sslmode options= 'endpoint=ep-silent-bread-a1benv68'";

$conn = pg_connect($conn_string);

// Close the connection after use

    // Extract filenames from the list of objects
    $filenames = [];
    foreach ($objects['Contents'] as $object) {
        $encodedFilename = rawurlencode( $object['Key']);
        $Filename =$object['Key'];
        if (!$conn) {
            echo "Failed to connect to database: " . pg_last_error();
          } else {
            $sql = "INSERT INTO music (name,email) VALUES('https://s3.tebi.io/music2/$encodedFilename' ,
            '$Filename'
            )";
            $result = pg_query($conn, $sql);
            }
    }
    pg_close($conn); 
     $data = json_encode($filenames);
        print_r($data);
    
    // Now $filenames will contain an array of all filenames in the bucket
   

} catch (AwsException $e) {
    echo "Error listing objects: " . $e->getMessage();
}
?>

