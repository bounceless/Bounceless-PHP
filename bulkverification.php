<?php
$key = "PUT YOUR API KEY HERE";

// Upload the file
$settings['file_contents'] = new CURLFile('/home/Downloads/emails.txt'); // path to your file
$url = 'https://apps.bounceless.io/api/verifApiFile?secret='.$key.'&filename=my_emails.txt';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $settings);

$file_id = curl_exec($ch); // you need to save this FILE ID for getting file status and downloading reports in the future

curl_close($ch);

// Download the ready file
$url = 'https://apps.bounceless.io/api/getApiFileInfo?secret='.$key.'&id='.$file_id;
$string = file_get_contents($url);
list($file_id, $filename, $unique, $lines, $lines_processed, $status, $timestamp, $link1, $link2) = explode('|', $string); // parse data

// Output the information about the file
echo "File ID: " . $file_id . "\n";
echo "Filename: " . $filename . "\n";
echo "Unique: " . $unique . "\n";
echo "Lines: " . $lines . "\n";
echo "Lines Processed: " . $lines_processed . "\n";
echo "Status: " . $status . "\n";
echo "Timestamp: " . $timestamp . "\n";
echo "Link 1: " . $link1 . "\n";
echo "Link 2: " . $link2 . "\n";
?>
