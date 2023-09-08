<?php

define("FORMATION", "PHP initiation + approfondissement");

if (defined("FORMATION")) {
    echo "Bienvenue à notre formation " . FORMATION;
}

if (defined("USELESS")) {
    echo "coucou";
}

const VERSION = "PHP 8";

echo "<p>" . VERSION . "</p>";

echo "<p>" . __FILE__ . "</p>";

echo "<p>" . __DIR__ . "</p>";

echo "<p> séparateur système: " . DIRECTORY_SEPARATOR . "</p>"; // linux/mac => / | windows => \
