<?php
#Exercice 1:
#Variables Gobales

#Variable static
$n = 1;

function compteur(){
    static $c = 0;
    echo $c;
    $c++;
}

compteur();
compteur();
compteur();

#Exercice 2:
#1)
$joueurs = array(
    'mmartin26' => array(
        'prenom' => 'Mark',
        'nom' => 'Martin',
        'age' => 36,
        'score' => 400,
        "code" => 0
    ),
    'ndupont'=> array(
        'prenom' => 'Nicholas',
        'nom' => 'Dupont',
        'age' => 24,
        'score' => 300,
        "code" => 0
    ),
    'malbert12' => array(
        'prenom' => 'Mark',
        'nom' => 'Albert',
        'age' => 40,
        'score' => 100,
        "code" => 0
    ),
    'jmarin3' => array(
        'prenom' => 'Jean',
        'nom' => 'Marin',
        'age' => 34,
        'score' => 750,
        "code" => 0
    ),
    'lroos' => array(
        'prenom' => 'Lara',
        'nom' => 'Roos',
        'age' => 28,
        'score' => 563,
        "code" => 0
    ),
    'rdavid' => array(
        'prenom' => 'Robert',
        'nom' => 'David',
        'age' => 34,
        'score' => 300,
        "code" => 0
    )
);

#2)
function creerCode() : int {
    static $c = 1534;
    $c++;
    return $c;
}

#3)
foreach ($joueurs as $key => $value) {
    $joueurs[$key]["code"] = creerCode();
}

#4)
function afficherJoueur($pseudo, $tab){
    $prenom = $tab[$pseudo]["prenom"];
    $nom = $tab[$pseudo]["nom"];
    $age = $tab[$pseudo]["age"];
    $score = $tab[$pseudo]["score"];
    $code = $tab[$pseudo]["code"];

    echo "<table>";

    echo "<tr>";

    echo "<td>";
    echo "prénom";
    echo "</td>";

    echo "<td>";
    echo "nom";
    echo "</td>";

    echo "<td>";
    echo "age";
    echo "</td>";

    echo "<td>";
    echo "score";
    echo "</td>";

    echo "<td>";
    echo "code";
    echo "</td>";

    echo "</tr>";

    #==============

    echo "<tr>";

    echo "<td>";
    echo "$prenom";
    echo "</td>";

    echo "<td>";
    echo "$nom";
    echo "</td>";

    echo "<td>";
    echo "$age";
    echo "</td>";

    echo "<td>";
    echo "$score";
    echo "</td>";

    echo "<td>";
    echo "$code";
    echo "</td>";

    echo "</tr>";

    echo "</table>";
}

#5)
foreach ($joueurs as $key => $value) {
    afficherJoueur($key, $joueurs);
}
?>