# Usage of email validation using PHP and cURL

# Api One By One

$email = "test@example.com";

$key = "PUT YOUR API KEY HERE";

$url = "https://apps.bouceless.io/api/verifyEmail?secret=".$key."&email=".$email;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );

$response = curl_exec($ch);

echo $response;

curl_close($ch);




# Main Status Responses:

Status="ok"- A ok response is an address that has passed all tests. The address provided passed all tests.

Status="fail"- A failed response is an address that has failed 1 or more tests.

. The address provided does not exist.

. The mailbox is full.

. The address provided is a disposable email address.

. The address provided is not in a valid format.

. The address provided is a role account.

. The address provided does not have a valid dns.

. The address provided does not have a mx server.

. The address provided was found in your internal blacklist containing previously failed addresses.

. The domain provided was found in your domain blacklist.



Status="unknown"- A unknown response is an address that can not be accurately tested. Is a Catchall mx server config. Greylisting is active on this server, please try again in a few minutes. Greylisting is suspected to be active on this server, please try again in a few minutes. The address provided can not be verified at this time.

Status="incorrect"- No email provided in request. Email syntax error (example: myaddress[at]gmail.com, must be myaddress@gmail.com)

Status=" key_not_valid"- No api key provided in request or invalid.

Status=" missing parameters"- There are no validations remaining to complete this attempt.





# Api - Bulk emails verification

When to use:

This tool created for customers that want to upload emails list and download results in automatic mode. For example if you using bulk verification tool you need to: login to our service, open upload form, choose file, wait until file will be finished, download results. But this API allow to do this work for your software in fully automatic mode without login to site.


How it works:
1. your software uploading file with emails to our API and getting {file_id} as result
2. your software checking status of file by {file_id} (once per 10 minutes for example)
3. when status of file is "finished", your software downloading reports


# Upload file with API:

There is link for file upload:
https://apps.bouceless.io/api/verifyApiFile?secret=PUT_YOUR_API_KEY_HERE&filename=NAME_OF_YOUR_FILE
 
 Example of PHP code:
 
  $key = "PUT YOUR API KEY HERE";
$settings['file_contents'] ="@/home/Downloads/emails.txt"; //path to your file
$url = 'https://apps.emaillistverify.com/api/verifApiFile?secret='.$key.'&filename=emails.txt';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $settings);
$file_id = curl_exec($ch); //you need to save this FILE ID for get file status and download reports in future
curl_close($ch);

Example of output when success: 10700 Example of output when error happens :

. Status=" no_credit"- Your balance is $0.
. Status=" cannot_upload_file"- File uploaded as broken.
. Status=" key_not_valid"- No api key provided in request or invalid.
. Status=" missing parameters"- There are no validations remaining to complete this attempt.
