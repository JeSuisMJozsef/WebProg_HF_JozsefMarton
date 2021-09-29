<?php
declare(strict_types=1);
//HF 1. Feladat
$date = date("D");

switch ($date) {
    case ("Mon"):
        echo "Ma hétfő van";
        break;
    case ("Tue"):
        echo "Ma kedd van";
        break;
    case ("Wed"):
        echo "Ma szerda van";
        break;
    case ("Thu"):
        echo "Ma csütörtök van";
        break;
    case ("Fri"):
        echo "Ma péntek van";
        break;
    case ("Sat"):
        echo "Ma szombat van";
        break;
    case ("Sun"):
        echo "Ma vasarnap van";
        break;
}
echo "<br>";

// 2.Feladat
function szamol(float $var1, float $var2, string $operator)
{
    return match ($operator) {
        "+" => $var1 + $var2,
        "-" => $var1 - $var2,
        "*" => $var1 * $var2,
        "/" => $var1 / $var2,
        default => "Nem helyes operatort adott meg",
    };
}

$eredmeny = szamol(10, 5, "a");
echo $eredmeny . "<br>";

//3.feladat
function osztotabla()
{
    echo "<h1>Osztótábla két tizedes pontossággal</h1>";
    echo "<table border='3px solid black'>";
    for ($sor = 1; $sor <= 10; $sor++) {
        echo "<tr>";
        for ($oszl = 1; $oszl <= 10; $oszl++) {
            echo "<td>" . $oszl . "/" . $sor . "=" . round($oszl / $sor, 2) . "</td> ";
        }
        echo "</tr>";
    }
    echo "</table>";
}
osztotabla();
//4.feladat

function sakktabla(){
    echo "<h1>Sakktábla</h1>";
    echo "<table border='3px solid black' width='300px' height='300px'>";
    for ($sor = 0; $sor < 8; $sor++) {
        echo "<tr >";
        for ($oszl = 0; $oszl < 8; $oszl++) {
            if($sor%2 == 0 && $oszl%2==0 ){
                echo" <td style='background-color:#ffff'></td>";
            }
            else if($sor%2 == 0 && $oszl%2!=0){
                echo "<td style='background-color: black'></td>";
            }
            else if($sor%2 != 0 && $oszl%2==0){
                echo "<td style='background-color: black'></td>";
            }
            else if($sor%2 != 0 && $oszl%2!=0){
                echo "<td style='background-color: #ffff'></td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

}
sakktabla();



