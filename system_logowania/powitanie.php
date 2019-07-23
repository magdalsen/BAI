<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['haslo'])) {
    header("Location: logowanie.php");
    session_destroy();
    die();
}
/*
echo $_SESSION["imie"];
echo $_SESSION["nazwisko"];
*/
echo "Witaj, ".$_SESSION["imie"]."".$_SESSION["nazwisko"]."!"."</br>";
echo "<a href='wylogowanie.php'>Wyloguj się</a>"."</br>";
echo session_status();
?>
