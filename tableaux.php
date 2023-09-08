<?php

// array() ou []

// tableau indexé commence par défaut à 0
$fruits = ['pomme', 'poire', 'cerise', 'orange'];

echo "<p>Le premier fruit de mon tableau est un(e) " . $fruits[0] . "</p>";

echo "<p>Il y a " . count($fruits) . " fruit(s) dans mon tableau";

$last_index = count($fruits) - 1;

echo "<p>Le dernier fruit de mon tableau est un(e) " . $fruits[$last_index] . "</p>";

// ajouter une valeur
$fruits[] = "clémentine";

// Afficher les valeurs d'un tableau

// echo $fruits;
var_dump($fruits);
print_r($fruits);
echo "<br />";

// modifier une valeur existante
$fruits[0] = "pomme golden";
print_r($fruits);
echo "<br />";

$fruits[-1] = "kaki";
$fruits[10] = "mangue";
print_r($fruits);
echo "<br />";

// reindexé le tableau
$fruits = array_values($fruits);
print_r($fruits);
echo "<br />";

// supprimer une valeur du tableau
// array_pop retire la dernière valeur du tableau
// array_shift retire la première valeur du tableau
$fruit = array_pop($fruits);
echo "<p>La valeur <b>" . $fruit . "</b> a été retiré du tableau</p>";
print_r($fruits);
echo "<br />";

// unset détruit une variable
unset($fruits[2]);
$fruits = array_values($fruits);
print_r($fruits);
?>

    <h4>Parcourir un tableau</h4>
    <ul>
        <?php
        foreach ($fruits as $fruit) {
            echo "<li>" . $fruit . "</li>";
        }
        ?>
    </ul>

    <ul>
        <?php
        foreach ($fruits as $index => $fruit) {
            $style = "";
            if ($index % 2 == 0) {
                $style = " style='color:#05e'";
            }

            echo "<li" . $style . ">" . $fruit . "</li>";
        }
        ?>
    </ul>

<?php
// tableaux associatif ($_POST, $_GET, etc ..)

$client = [
    'firstname' => "John",
    'lastname' => "Doe",
    'email' => "john.doe@gmail.com",
    'phone' => "06 118 218 00"
];

printf("<p>L'adresse email de %s %s est %s</p>", $client['firstname'], $client['lastname'], $client['email']);

$client['factures'] = [
    ['number' => "FA2023001", 'total' => 199.99],
    ['number' => "FA2023002", 'total' => 25.6],
    ['number' => "FA2023003", 'total' => 99.00],
];

echo "<pre>";
print_r($client);
echo "</pre>";
