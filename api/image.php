<?php
require_once '../vendor/autoload.php';
use getID3 as getID3;
use getID3_lib as getID3_lib;

// Path to your MP3 file
$file_path = 'https://s3.tebi.io/music2/Adjustor%20%20-%20%20Pann%20%20__%20%E1%80%95%E1%80%94%E1%80%BA%E1%80%B8%20%5B%20Official%20Lyric%20Video%20%5D%28MP3_160K%29.mp3';

// Initialize getID3
$getID3 = new getID3();
$file_info = $getID3->analyze($file_path);
print_r($file_info);
// Get ID3 tags
if (isset($file_info['tags']['id3v2'])) {
    echo "g";
        $id3v2_tags = $file_info['tags']['id3v2'];

    // Access specific ID3 tags
    $title = $id3v2_tags['title'][0];
    $artist = $id3v2_tags['artist'][0];
    $album = $id3v2_tags['album'][0];

    echo "Title: $title\n";
    echo "Artist: $artist\n";
    echo "Album: $album\n";

    // Access album artwork
    if (isset($id3v2_tags['attached_picture'][0])) {
        $picture = $id3v2_tags['attached_picture'][0];
        $image_data = $picture['data'];
        $image_mime = $picture['image_mime'];

        // Process the image data (e.g., save to a file or display)
    }
}
