<?php
// 1. feladat
echo "<br>1. feladat <br><br>";

$tomb = ([5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200']);
foreach ($tomb as $item) {
    if (is_numeric($item)) {
        echo gettype($item) . " igen <br>";
    } else
        echo gettype($item) . " nem <br>";
}
//2. feladat
echo "<br>2. feladat <br><br>";

$orszagok = array(" Magyarország " => " Budapest", " Románia" => " Bukarest", "Belgium" => "Brussels", "Austria" => "Vienna", "Poland" => "Warsaw");

foreach ($orszagok as $item => $value) {
    echo $item . " fővárosa " . $value . "<br>";
}

//3. feladat
echo "<br>3. feladat <br><br>";
$napok = array("HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"), "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"), "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);
foreach ($napok as $nyelv => $nap) {
    echo $nyelv . ": ";
    foreach ($nap as $rovid) {
        echo $rovid . ", ";

    }
    echo "<br>";
}
//4. feladat
echo "<br>4. feladat <br><br>";
$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');
function atalakit(array $tomb, string $tipus)
{

    switch ($tipus) {
        case  "kisbetus":
        {
            foreach ($tomb as $item => $value) {
                if (is_string($value)) {
                    $tomb[$item] = strtolower($value);
                }

            }
            break;
        }
        case "nagybetus":
        {
            foreach ($tomb as $item => $value) {
                if (is_string($value)) {
                    $tomb[$item] = strtoupper($value);
                }
            }
            break;
        }
    }
    return $tomb;
}

$szinek = atalakit($szinek, "kisbetus");
echo "Kisbetüs<br>";
foreach ($szinek as $item => $value) {
    if (is_string($value)) {
        echo $item . " : " . $value . "<br>";
    } else {
        echo $item . " : ezért nem alakitható <br>";
    }
};
$szinek = atalakit($szinek, "nagybetus");
echo "<br> Nagybetüs<br>";
foreach ($szinek as $item => $value) {
    if (is_string($value)) {
        echo $item . " : " . $value . "<br>";
    } else {
        echo $item . " : nem string, ezért nem alakitható <br>";
    }

};