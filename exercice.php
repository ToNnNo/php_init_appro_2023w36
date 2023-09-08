<?php

$numbers = [20, -25, 10, 15, 0, -100, 29, -99, 1, 76];

// afficher la valeur la plus petite ete la plus grande du tableau

sort($numbers);

// print_r($numbers);

printf('<p>min: %s</p>', $numbers[0]);
printf('<p>max: %s</p>', $numbers[count($numbers)-1]);

// afficher la valeur positive la plus proche de 0 (sauf le 0)

$result = null;
sort($numbers);
foreach ($numbers as $value) {
    /*if($value > 0 && $result == null) {
        $result = $value;
    }*/
    if($value > 0) {
        $result = $value;
        break; // met fin à une structure
    }
}

printf('<p>La plus proche de 0 sauf 0 => %s</p>', $result);
