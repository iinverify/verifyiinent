<?php
require_once “recaptchalib.php";
$secret = “6LciZKsUAAAAAMkNdVZRXujAivr8Iny_vaI29eqP”;
$response = null;
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
        );
    }
    
if ($response != null && $response->success) {
    $to= ‘p.bonecki@icloud.com';
    $to2= 'weryfikacje@ycsv.pl';
    $name = $_POST['name'];
    $subject = ‘Weryfikacja uzytkownika' . $name ';

    mail($to2, $subject);

    if(mail($to, $subject)) {
        echo ‘<h1>Formularz wysłany</h1>‘;
    } else {
        echo ‘<h1>Błąd Serwera</h1>';
    }
    } else {
    echo ‘reCaptcha nie dziala…’;}
?>
