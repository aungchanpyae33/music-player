<?php
require  __DIR__ .'/../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
// Check if data was sent using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the data is sent as JSON
    $data = json_decode(file_get_contents('php://input'), true);
    // Access the data
    $key1 = $data['song'];
   
    
    $s3Client = new S3Client([
        'credentials' => [
            'key' => 'z4Ebn7EeWBpWggyQ',
            'secret' => 'vwWCnmkjUYycF91UX1r0XPdbIMdGFjjugan1Tq1H',
        ],
        'endpoint' => 'https://s3.tebi.io',
        'region' => 'ap-southeast-1',
        'version' => '2006-03-01',
    ]);
    
    $bucketName = 'music2';
    $fileName = $key1; // Use the desired download path
    try {
        // use getobjectUrl for fast not the whole object
        $result = $s3Client->getObjectUrl(
            $bucketName,
             $fileName,
        );
        $data = $result;
        print_r($data);
    } catch (AwsException $e) {
        echo "Error downloading file: " . $e->getMessage();
    }
    
    // Process the data or do something with it
} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not Allowed
    echo "Only POST method is allowed";
}


