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

    // Extract filenames from the list of objects
    $filenames = [];
    foreach ($objects['Contents'] as $object) {
        $filenames[] = $object['Key'];
    }

    // Now $filenames will contain an array of all filenames in the bucket
    $data = json_encode($filenames);
    print_r($data);

} catch (AwsException $e) {
    echo "Error listing objects: " . $e->getMessage();
}
?>

