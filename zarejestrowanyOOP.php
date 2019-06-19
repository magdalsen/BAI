<?php
session_start();

define('SITE_KEY', '6LfdVaUUAAAAANUzvqodEK40LgxReC-5644pq1ro');
define('SECRET_KEY', '6LfdVaUUAAAAAEO4HTbA1HnXwtujg8eOZ3IZzSwF');

$wszystko_OK = true;
if(!isset($_POST['regulamin']) && isset($_POST['submit'])) {
    $wszystko_OK = false;
    echo "Zaakceptuj regulamin!";
    echo "<a href='rejestracja.php'>Rejestracja</a>";
    die();
}

if(isset($_POST['submit'])) {
$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => SECRET_KEY,
    'response' => $_POST["g-recaptcha-response"]
);
$options = array(
    'http' => array (
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);
if ($captcha_success->success==false) {
    echo "<p>You are a bot! Go away!</p>";
    die();
} else if ($captcha_success->success==true) {
    echo ""; //<p>You are not a bot!</p>
}
}

class Rejestracja {

    public $imie;
    public $nazwisko;
    public $filename;
    public $haslo;
    public $haslo2;
    public $dane_do_zapisu;

    public function Valid() {

        $this->imie = $_POST['imie'];
        $this->nazwisko = $_POST['nazwisko'];
        $this->filename = $_POST['email'].".txt";
        $this->haslo = md5($_POST['haslo']);
        $this->haslo2 = md5($_POST['haslo2']);
        $this->dane_do_zapisu = $_POST['imie']."\r\n".$_POST['nazwisko']."\r\n".$_POST['email']."\r\n".md5($_POST['haslo'])."\r\n".md5($_POST['haslo2'])."\r\n";

        if($this->haslo != $this->haslo2) {
            return "Hasła muszą być takie same!"."<br/><br/>";
            die();
        }
    
        if(filter_var($this->filename, FILTER_VALIDATE_EMAIL)) {
            return ""; //Format e-mail jest poprawny
            die();
        }
        else {
            return "Niepoprawny adres e-mail";
            die();
        }
    }

    public function Search() {
        if(file_exists($this->filename)) {
            return "Użytkownik już istnieje!"."<br/>";
            die();
        } else {
            require_once 'phpMailer_example.php';
            file_put_contents($this->filename, $this->dane_do_zapisu); //włożyć tu serializację!
            return "Dodano nowego użytkownika"."<br/>";
            return $mail->send();
        }
    }
    }

$obiekt = new Rejestracja();
if($obiekt->Valid()) {
    echo $obiekt->Valid();
} else {
    echo $obiekt->Search();
}

//przydałoby się walidaję, która jest na początku włożyć do klasy
//można pobawić się w więcej opcji walidacji oraz posolić md5
?>