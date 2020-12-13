<?php

require __DIR__ . '/vendor/autoload.php';

use PHPExif\Reader\Reader;

$reader = Reader::factory(Reader::TYPE_EXIFTOOL);
$exif = $reader->read(__DIR__ . "/test.jpg");

echo "Title: " . $exif->getTitle() . "\n";
echo "Description: " . $exif->getCaption() . "\n";
echo "GPS: " . $exif->getGPS() . "\n";
$keywords = $exif->getKeywords();
if (!is_iterable($keywords)) {
    $keywords = [$keywords];
}
echo "Keywords: " . implode(", ", $keywords) . "\n";
echo "CreationDate: " . $exif->getCreationDate()->format('Y-m-d H:i:s') . "\n";
$raw = $exif->getRawData();

if (array_key_exists('XMP-xmp:Rating', $raw)) {
    echo "Rating: " . $raw['XMP-xmp:Rating'] . "\n";
}



