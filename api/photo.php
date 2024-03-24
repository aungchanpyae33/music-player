
<?php
require  __DIR__ .'/../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
// Check if data was sent using POST method

    $s3Client = new S3Client([
        'credentials' => [
            'key' => 'z4Ebn7EeWBpWggyQ',
            'secret' => 'vwWCnmkjUYycF91UX1r0XPdbIMdGFjjugan1Tq1H',
        ],
        'endpoint' => 'https://s3.tebi.io',
        'region' => 'ap-southeast-1',
        'version' => '2006-03-01',
    ]);
    
    $bucketName = 'music3';
    $fileName = 'music.jpg'; // Use the desired download path
    try {
        // use getobjectUrl for fast not the whole object
        $result = $s3Client->getObjectUrl(
            $bucketName,
             $fileName,
        );
        $data =  $result;
        print_r(json_encode($data));
    } catch (AwsException $e) {
        echo "Error downloading file: " . $e->getMessage();
    }
    
    // Process the data or do something with it



