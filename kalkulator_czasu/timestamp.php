//Kalkulator czasu z użyciem timestamp
<!DOCTYPE html>
<html>
<body>

<form action="" method="POST">    
        <form>
           
            Wpisz znak (/, -, ., dzien) oraz co chcesz dodać (1 godzinę, dzień, tydzień, miesiąc)<br/><br/>
                    Znak: <input type="text" name="znak"><br/><br/>
                    Dodaję: <input type="text" name="znak2"><br/><br/>
                    <input type="submit" name="submit" value="Wynik"><br/><br/>
        </form>

<?php
if(isset($_POST['znak']) && isset($_POST['znak2']) && isset($_POST['submit'])) {
function format1() {
    return date("Y/m/d H:i:s");
}
function format2() {
    return date("Y.m.d H:i:s");
}
function format3() {
    return date("Y-m-d H:i:s");
}
function format4() {
    return date("l H:i:s");
}
switch($_POST['znak']) {
    case "/":
        $wynik = format1();
        break;
    case ".":
        $wynik = format2();
        break;
    case "-";
        $wynik = format3();
        break;
    case "dzien";
        $wynik = format4();
        break;
}
define("WYNIK", "$wynik"); //próba zdefiniowania stałej wynik i włożenia jej w funkcje dodajgodzine zamiast Y-m-d. Wychodzi, ale dziwny format
function dodajgodzine() {
    $time = strtotime('+1 hour');
    return date('WYNIK H:i:s', $time);
}
function dodajdzien() {
    $time = strtotime('+1 day');
    return date('D H:i:s', $time);
}
function dodajtydzien() {
    $time = strtotime('+1 week');
    return date('Y-m-d H:i:s', $time);
}
function dodajmiesiac() {
    $time = strtotime('+1 month');
    return date('Y-m-d H:i:s', $time);
}
switch($_POST['znak2']) {
    case "dzien":
        $wynik2 = dodajdzien();
        break;
    case "tydzien":
        $wynik2 = dodajtydzien();
        break;
    case "miesiac":
        $wynik2 = dodajmiesiac();
        break;
    case "godzine":
        $wynik2 = dodajgodzine();
        break;
}
echo "$wynik oraz $wynik2";
}
?>

</body>
</html>
