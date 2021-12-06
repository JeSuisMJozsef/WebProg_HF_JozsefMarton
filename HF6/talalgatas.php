<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>
<body>
<?php
    session_start();
    if (isset($_POST['elkuld'])) {
        
        if (isset($_SESSION['gszam'])) {
            logika($_POST['talalgatas'], $_SESSION['gszam']);
        } else {
            $gszam = rand(1, 10);
            $_SESSION['gszam'] = $gszam;
            logika($_POST['talalgatas'], $gszam);
        }
        
    }
    function logika(int $sszam, int $gszam)
    {
        if ($sszam > $gszam) {
            echo "<h3>A szám kisebb!</h3>";
            echo "<br>Nem nyert,játsszon újra!<br>";
        } else {
            if ($sszam < $gszam) {
                echo "<h3>A szám nagyobb!</h3>";
                echo "<br>Nem nyert,játsszon újra!<br>";
            } else {
                session_destroy();
                echo "<br>A szám, amire gondoltam: $gszam, Ön nyert! Játsszon újra!<br>";
            }
        }
    }

?>
<form method="POST" action="">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="text">
    <br>
    <br>
    <input type="submit" name="elkuld" value="Elküld">
</form>
</body>
</html>