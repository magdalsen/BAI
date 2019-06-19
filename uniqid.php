<?php
//Nadaje użytkownikowi ID i liczy wejścia na stronę dla tego ID. W ciastku przechowywana jest liczba wejść na stronę :)
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

?>