<?php
session_start();
$dni=365;
if(!isset($_COOKIE['visits'])) {
    $ilewizyt = 1;
    $_SESSION['uniqid'] = uniqid();
    $uniqid = uniqid();
    setCookie('visits', "$ilewizyt", time()+60*60*24*$dni);
    echo "Jesteś na tej stronie pierwszy raz, witamy!";
} elseif(isset($_COOKIE['visits'])) {
    $ilewizyt = intval($_COOKIE['visits']);
    $ilewizyt++;
    setCookie('visits', "$ilewizyt", time()+60*60*24*$dni);
    echo "Jesteś na tej stronie $ilewizyt raz, Twoje ID to: ".$_SESSION['uniqid'];
}
    define('SITE_KEY', '6LfdVaUUAAAAANUzvqodEK40LgxReC-5644pq1ro');
    define('SECRET_KEY', '6LfdVaUUAAAAAEO4HTbA1HnXwtujg8eOZ3IZzSwF');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Formularz rejestracji użytkownika</title>
</head>
<body>
        <form action="zarejestrowanyOOP.php" method="POST">
        <form>
        Zarejestruj się<br/><br/>
                Imię:
                    <input type="text" name="imie"><br/><br/>
                Nazwisko:
                    <input type="text" name="nazwisko"><br/><br/>
                E-mail:
                    <input type="email" name="email"><br/><br/>
                Hasło:
                    <input type="password" name="haslo"><br/><br/>
                Powtórz hasło:
                    <input type="password" name="haslo2"><br/><br/>
                    
                <label>
                    <input type="checkbox" name="regulamin" /> Akceptuję regulamin
                </label><br/>

                <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div><br/>

                <input type="submit" name="submit" value="Zarejestruj"><br/><br/>
        </form>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
