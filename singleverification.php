<?php
$email = "test@example.com";
$key = "PUT YOUR API KEY HERE";
$url = "https://apps.bounceless.io/api/singlemaildetails?secret=" . $key . "&email=" . $email;

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
]);

$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Access the response parameters
$success = $data['success'];
$acceptAll = $data['accept_all'];
$result = $data['result'];
$reason = $data['reason'];
$role = $data['role'];
$free = $data['free'];
$disposable = $data['disposable'];
$user = $data['user'];
$domain = $data['domain'];
$email = $data['email'];
$didYouMean = $data['did_you_mean'];
$message = $data['message'];

// Output the response parameters
echo "Success: " . ($success ? 'true' : 'false') . "\n";
echo "Accept All: " . ($acceptAll ? 'true' : 'false') . "\n";
echo "Result: " . $result . "\n";
echo "Reason: " . ($reason ?: 'N/A') . "\n";
echo "Role: " . ($role ? 'true' : 'false') . "\n";
echo "Free Email: " . ($free ? 'true' : 'false') . "\n";
echo "Disposable Email: " . ($disposable ? 'true' : 'false') . "\n";
echo "User: " . $user . "\n";
echo "Domain: " . $domain . "\n";
echo "Email: " . $email . "\n";
echo "Did You Mean: " . ($didYouMean ?: 'N/A') . "\n";
echo "Message: " . $message . "\n";

/*
The description for each parameter in the JSON response is as follows:

    success: Indicates if the email verification was successful. true for success, false otherwise.
    accept_all: Indicates if the email address is from an accept-all domain. true if it is an accept-all domain, false otherwise.
    result: Indicates the result of the email verification. Possible values are: "valid" for a valid email address, "invalid" for an invalid email address, "unknown" for an unknown email address, risky for accept all email address.
    reason: Provides a reason for the email address verification result. This field may be null for valid email addresses or provide additional information for invalid email addresses.
    role: Indicates if the email address is a role-based email. true if it is a role-based email, false otherwise.
    free: Indicates if the email address is from a free email provider. true if it is a free email address, false otherwise.
    disposable: Indicates if the email address is a disposable/temporary email. true if it is a disposable email, false otherwise.
    user: The user part of the email address.
    domain: The domain part of the email address.
    email: The complete email address being verified.
    did_you_mean: Provides a suggested email address if there was a typo in the provided email address. This field may be null if no suggestion is available.
    message: An additional message or information related to the email verification.
*/
?>
