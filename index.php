<?php
// grab recaptcha library
require_once “recaptchalib.php";

// secret key
$secret = “6LciZKsUAAAAAMkNdVZRXujAivr8Iny_vaI29eqP”;

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
        );
    }

if ($response != null && $response->success) {



?>
