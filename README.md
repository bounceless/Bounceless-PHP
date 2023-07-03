
# Bounceless.io Email Verification API for PHP

This repository contains the code for an email verification API implemented in PHP. It uses the Bounceless API to verify the validity of email addresses.

## Prerequisites

To use this API, you'll need the following:

- PHP (version 5.5 or later)
- cURL extension for PHP

## Getting Started

1. Clone this repository to your local machine or download the code as a ZIP file.
2. Replace `"PUT YOUR API KEY HERE"` in the code with your actual Bounceless API key.
3. Upload the code to your web server or run it locally using a PHP development environment.
4. Make sure the cURL extension is enabled in your PHP configuration.
5. Execute the PHP script by accessing it through a web browser or using the PHP CLI.

## Usage

### Single Mail Details Endpoint

The `/singlemaildetails` endpoint allows you to verify the details of a single email address.

To verify a single email address, follow these steps:

1. Set the `$email` variable to the email address you want to verify.
2. Replace `"PUT YOUR API KEY HERE"` in the code with your Bounceless API key.
3. Execute the PHP script.
4. The response from the API will be displayed, providing detailed information about the email address.

### Bulk API File Endpoint

The `/verifApiFile` endpoint allows you to upload a file for email address verification.

To upload a file for verification, follow these steps:

1. Set the `$key` variable to your Bounceless API key.
2. Set the `$settings['file_contents']` variable to the path of the file you want to upload.
3. Execute the PHP script.
4. The script will upload the file to the API and return a file ID.
5. Save the file ID for future use.

### Get API File Info Endpoint

The `/getApiFileInfo` endpoint allows you to retrieve information about a previously uploaded file.

To retrieve file information, follow these steps:

1. Set the `$key` variable to your Bounceless API key.
2. Set the `$file_id` variable to the file ID of the uploaded file you want to retrieve information about.
3. Execute the PHP script.
4. The script will retrieve the file information from the API and display it.

## Code Explanation

The code uses the cURL library to make HTTP requests to the Bounceless API. Here's a breakdown of the code for each endpoint:

### Single Mail Details Endpoint

```php
<?php
$email = "test@example.com";
$key = "PUT YOUR API KEY HERE";
$url = "https://apps.bounceless.io/api/singlemaildetails?secret=" . $key . "&email=" . $email;

// cURL request to the API
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
]);
$response = curl_exec($ch);
curl_close($ch);

// Decode and display the JSON response
$data = json_decode($response, true);
echo json_encode($data, JSON_PRETTY_PRINT);
?>
```

### Verif API File Endpoint

```php
<?php
$key = "PUT YOUR API KEY HERE";
$settings['file_contents'] = new CURLFile('/path/to/your/file.txt'); // path to your file
$url = 'https://apps.bounceless.io/api/verifApiFile?secret='.$key.'&filename=my_emails.txt';

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $settings,
]);
$file_id = curl_exec($ch);
curl_close($ch);

echo "File ID: " . $file_id . "\n";
?>
```

### Get API File Info Endpoint

```php
<?php
$key = "PUT YOUR API KEY HERE";
$file_id = "10700"; // ID of the uploaded file

$url = 'https://apps.bounceless.io/api/getApiFileInfo?secret='.$key.'&id='.$file_id;
$string = file_get_contents($url);
list($file_id, $filename, $unique, $lines, $lines_processed, $status, $timestamp, $link1, $link2) = explode('|', $string);

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
```

Please make sure to replace `"PUT YOUR API KEY HERE"` with your actual Bounceless API key before using this code.

## License

This project is licensed under the [MIT License](LICENSE).
```

