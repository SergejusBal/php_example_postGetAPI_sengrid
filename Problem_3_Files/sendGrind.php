<?php
require __DIR__ . '/../vendor/autoload.php';


use SendGrid\Mail\Mail;
function sendPasswordReset($resetkey, $emailto)
{

    $apiKey = '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'; // Replace with your actual API key
    $sendgrid = new SendGrid($apiKey);

    $text = "Hello,\n\n" . "Please fallow the link bellow to reset your password.\n\n" . "https://pokerdash.fun/Sergejus/Problem_3_Files/passwordResetPage.php?key=$resetkey";

    $email = new Mail();
    $email->setFrom("sergejus.balciunas@gmail.com", "Your Name");
    $email->setSubject("Test Email");
    $email->addTo("$emailto", "Recipient Name");
    $email->addContent("text/plain", "$text");


    try {
        $response = $sendgrid->send($email);
//        echo "Status Code: " . $response->statusCode() . "\n";
//        echo "Response Body: " . $response->body() . "\n";
//        echo "Response Headers: " . print_r($response->headers(), true) . "\n";
    } catch (Exception $e) {
//        echo 'Caught exception: ' . $e->getMessage() . "\n";
    }

}

?>
