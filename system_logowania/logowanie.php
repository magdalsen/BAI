<?php
session_start();
if((!isset($_SESSION['email'])) && !isset($_SESSION['haslo'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Formularz logowania użytkownika</title>
</head>
<body>
        <form action="zalogowanyOOP.php" method="POST">    
        <form>    
        Zaloguj się<br/><br/>
                E-mail:
                    <input type="email" name="email"><br/><br/>
                Hasło:
                    <input type="password" name="haslo"><br/><br/>
                    <input type="submit" name="submit" value="Loguj"><br/><br/>
        </form>
</body>
</html>

<?php
} else {
    echo "Witaj, jesteś już zalogowana/y"."</br>";
    echo "<a href='wylogowanie.php'>Wyloguj się</a>";
}
//sprawdzić czy plik o wprowadzanej nazwie jest obecny wśród plików zapisanych (czy email wprowadzony równa się nazwie pliku).
//jeśli istnieje, to wyświetl ekran powitania, a jeśli nie, to błąd - użytkownik nie istnieje
?>

