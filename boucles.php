<?php

/**
 * incrémentation
 * $i++ => $i = $i + 1
 * $i += 1 => $i = $i + 1
 * $i += 2 => $i = $i + 2
 *
 *
 * $i = 1;
 * 5 + $i++; //6 | $i = 2
 * 5 + (++$i); //7 | $i = 2
 */

// nombre d'itération connu
for ($i = 0; $i < 10; $i++) {
    echo "itération " . $i . "<br />";
}

// nombre d'itération inconnu
$j = 0;
while ($j < 10) {
    echo "itération (while) " . $j . "<br />";
    $j += 1; // $j = $j + 1;
}

// nombre d'itération inconnu, mais avec au moins 1 itération
$k = 10;
do {
    echo "itération (do while) " . $k . "<br />";
    $k += 1; // $k = $k + 1;
} while ($k < 10);






