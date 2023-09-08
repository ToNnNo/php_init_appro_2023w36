<?php

// le fichier index.php est le fichier qui s'ouvre par défaut quand on accède à un répertoire

// la fonction echo permet d'afficher une chaine de caractère sur l'interface
echo "<h1>Bienvenue sur notre application PHP !</h1>";

// les variables + type primitif (=/= type référence)
$firstname = "Stéphane";    // string
$integer = 10;              // int
$float = 2.50;               // float
$bool = true;               // boolean (false)

// concaténation
echo "<p>Bonjour ". $firstname .", comment se passe la formation ?</p>";

// alternative à la concaténation
echo "<p>Bonjour $firstname</p>"; // dans les chaines de caractère avec des doubles quote (""), les variables sont directement interprété.

printf("<p>Bonjour %s</p>", $firstname);

echo sprintf("<p>Bonjour %s</p>", $firstname);

// ----- exemple printf avec un réel
printf("<p>Le prix d'une pomme est de %.2f€</p>", $float);

// opérateurs mathématiques

/**
 * addition                     -> +
 * soustraction                 -> -
 * multiplication               -> *
 * division                     -> /
 * division entière (modulo)    -> %
 * exposant                     -> **
 */

echo "<p>2 + 3 = " . (2+3) . "</p>";
echo "<p>10 % 2 = ". (10%2) ."</p>";
echo "<p>3^2 = ". (3**2) ."</p>";

// opérateurs conditionnels
// https://www.php.net/manual/fr/types.comparisons.php

/**
 * non              -> !
 * égalité          -> ==
 * different        -> != (non égal)
 * supérieur        -> >
 * inférieur        -> <
 * supérieur égal   -> >=
 * inférieur égal   -> <=
 *
 * Compare la valeur et le type
 * égalité          -> ===
 * différent        -> !==
 */

var_dump("1" == 1);
var_dump( true == 1);

var_dump("1" === 1);
var_dump( true === 1);

// opérateurs logiques

/**
 *  non         -> !
 *  et          -> && ou and
 *  ou          -> || ou or
 *  ou exclusif -> xor (au moins 1 de vrai, mais pas plus)
 */









