<?php
class Validd {
    public $email;
    public $haslo;
    public function CheckData() {
        $this->email = $_POST['email'];
        $this->haslo = md5($_POST['haslo']);
        if(empty($this->email && $this->haslo)) {
        return "Brak danych w formularzu"."</br>";
        return "<a href=/logowanie.php>Wróć do strony logowania</a>"."</br></br>";
        die();
        }
    }
}
class Login extends Validd {
    public $email;
    public $haslo;
    public $katalog;
    public $files;
    public $implode;
    public $data;
    public function Log() {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['haslo'] = $_POST['haslo'];
        $this->email = $_POST['email'];
        $this->haslo = md5($_POST['haslo']);
        $this->katalog = "../public/";
        $this->files = scandir($this->katalog);
        $this->implode = implode("</br>", $this->files);
        if(preg_match("/$this->email/", $this->implode)) {
            $this->data = file($this->email.".txt");
            $_SESSION["imie"] = $this->data[0];
            $_SESSION["nazwisko"] = $this->data[1];
        if($this->data[4] == $this->haslo) {
            header("Location: powitanie.php");
            die();
            } else {
            return "Złe hasło"."</br>";
            return "<a href=/logowanie.php>Wróć do strony logowania</a>";
            session_destroy();
            die();
        }
        } else {
            return "Brak użytkownika w bazie";
            session_destroy();
}
}
}
$obiekt = new Login();
if($obiekt->CheckData()) {
    echo $obiekt->CheckData();
    exit();
}
$obiekt->Log();
echo $obiekt->Log();
?>
