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
    if (isset($_REQUEST['nick_uzytkownika', 'email'])) {
    
    $admin_email = "noreply@ycsv.pl";
    $email = $_REQUEST['email'];
    $subject = "Weryfikacja nowego użytkownika IINEntertainment";
    $nazwa_uzytkownika = $_REQUEST['nazwa'];
    
    mail($admin_email, "$subject", "$nazwa_uzytkownika", "From:" . $email);
    
    echo "Test";
    }
    else {
    ?>
    
    <form method="post">
    Twój adres e-mail <input name="email" type="text" /><br />
    Twoja nazwa użytkownika Discord <input name="nazwa" type="text" />
    <input type="submit" value="Zweryfikuj" />
    
<?php
}
?>
