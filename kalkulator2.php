<?php
//prosty kalkulator (z użyciem Exception)
function dodawanie($a, $b) {
    return $a + $b;
}
function odejmowanie($a, $b) {
    return $a - $b;
}
function mnozenie($a, $b) {
    return $a * $b;
}
function dzielenie($a, $b) {
    if($b == 0) {
        echo "Nie dzielimy przez 0";
    } else {
        return $a / $b;
    }
}

$liczba1 = $_POST['liczba1'];
$liczba2 = $_POST['liczba2'];
$znak = $_POST['znak'];

if(is_numeric($liczba1) || is_numeric($liczba2)) {
    $liczba1 = $_POST['liczba1'];
    $liczba2 = $_POST['liczba2'];
} else {
    echo "Błędne dane w formularzu!";
    die();
}
try {
if($znak == "+" || $znak == "-" || $znak == "*" || $znak == "/") {
    $znak = $_POST['znak'];
    
} else {
    throw new Exception("Błędne dane w formularzu! Wpisz jeden ze znaków: +, -, *, /");
    //echo "Błędne dane w formularzu! Wpisz jeden ze znaków: +, -, *, /";
    //die();
}
}
catch(Exception $e) {
    echo $e->getMessage();
    die();
}

switch($znak) {
    case "+":
        $wynik = dodawanie($liczba1, $liczba2);
        break;
    case "-":
        $wynik = odejmowanie($liczba1, $liczba2);
        break;
    case "*":
        $wynik = mnozenie($liczba1, $liczba2);
        break;
    case "/":
        $wynik = dzielenie($liczba1, $liczba2);
        break;
}
echo "$liczba1 $znak $liczba2 = $wynik";
