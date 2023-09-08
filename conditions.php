<?php

// if

$temperature = 20;

if ( $temperature >= 20 ) {
    echo "<p>Il fait chaud</p>";
}

$value = 0;

if ($value >= 0) {
    echo "<p>la valeur est positive ou nulle</p>";
} else {
    echo "<p>la valeur est négative</p>";
}

if($value > 0) {
    echo "<p>la valeur est positive</p>";
} elseif ($value < 0) {
    echo "<p>la valeur est négative</p>";
} else {
    echo "<p>la valeur est nulle</p>";
}

if($temperature <= 0) {
    echo "<p>Il fait très froid</p>";
} elseif ($temperature > 0 && $temperature <= 15) { // ]0; 15]
    echo "<p>Il fait froid</p>";
} elseif ( $temperature > 15 && $temperature <= 25) {
    echo "<p>Il fait chaud</p>";
} else { // $temperature > 25
    echo "<p>Il fait très chaud</p>";
}


// switch

$day = date('N'); // 1 - lundi ... 7 - dimanche

switch ($day) {
    case 1:
        echo "<p>Nous sommes lundi</p>";
        break; // met fin au switch
    case 2:
        echo "<p>Nous sommes mardi</p>";
        break;
    case 3:
        echo "<p>Nous sommes mercredi</p>";
        break;
    case 4:
    case 5:
        echo "<p>Nous sommes jeudi ou vendredi</p>";
        break;
    default:
        echo "<p>Nous sommes en week end</p>";
}

/**
 * depuis php8 => match
 *
 * $result = match($day) {
 *      '1' => "Nous sommes lundi",
 *      '2' => "Nous sommes mardi",
 *      '3' => "Nous sommes mercredi",
 *      '4', '5' => "Nous sommes jeudi ou vendredi",
 *      default => "Nous sommes en week end",
 * };
 * echo "<p>".$result."</p>";
 */
