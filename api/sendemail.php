<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
//require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
require("./sendgrid_php_composed/vendor/autoload.php");

// If not using Composer, uncomment the above line
$email = new \SendGrid\Mail\Mail();
$email->setFrom("mailerdaemon@kuroash.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("kuroash.esamili@gmail.com", "Example User");
$email->addContent(
    "text/plain", "and easy to do anywhere, even with PHP"
);
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>