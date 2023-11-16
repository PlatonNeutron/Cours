<?php 
# Exercice 1 :
# 1)
function surfaceCercle($rayon){
    return ($rayon * $rayon) * M_PI;
}

function perimetreCercle($rayon){
    return 2 * M_PI * $rayon; 
}

# 2)
echo ("La superficie du cercle de rayon 3m est : ".surfaceCercle(3)."<br>");
echo ("Le périmètre du cercle de rayon 3m est : ".perimetreCercle(3)."<br>");

echo ("<br>La superficie du cercle de rayon 5m est : ".surfaceCercle(5)."<br>");
echo ("Le périmètre du cercle de rayon 5m est : ".perimetreCercle(5)."<br>");

# 3)
function surfaceRectangle($L, $l){
    return $L * $l;
}

function perimetreRectangle($L, $l){
    return 2 * ($L + $l); 
}

# 4)
echo ("<br>La superficie du rectangle de longueur 3m et de largeur 5m est : ".surfaceRectangle(3, 5)."<br>");
echo ("Le périmètre du rectangle de longueur 3m et de largeur 5m est : ".perimetreRectangle(3, 5)."<br>");

echo ("<br>La superficie du carré de côté 4m est : ".surfaceRectangle(4, 4)."<br>");
echo ("Le périmètre du carré de côté 4m est : ".perimetreRectangle(4, 4)."<br>");

echo ("<br> ------------------------------------ <br>");

#Exercice 2:
# 1) mmartin26 => string, ndupont2 => string, malbert12 => string, jmarin3 => string, lroos => string, rdavid => string
# 2) ce sont des arrays
# 3) array('prenom => 'Lara', 'nom' => 'Roos', 'age' => 28, 'score' => 563)

$joueurs = array(
    'mmartin26' => array(
        'prenom' => 'Mark',
        'nom' => 'Martin',
        'age' => 36,
        'score' => 400
    ),
    'ndupont'=> array(
        'prenom' => 'Nicholas',
        'nom' => 'Dupont',
        'age' => 24,
        'score' => 300
    ),
    'malbert12' => array(
        'prenom' => 'Mark',
        'nom' => 'Albert',
        'age' => 40,
        'score' => 100
    ),
    'jmarin3' => array(
        'prenom' => 'Jean',
        'nom' => 'Marin',
        'age' => 34,
        'score' => 750
    ),
    'lroos' => array(
        'prenom' => 'Lara',
        'nom' => 'Roos',
        'age' => 28,
        'score' => 563
    ),
    'rdavid' => array(
        'prenom' => 'Robert',
        'nom' => 'David',
        'age' => 34,
        'score' => 300
    )
);

# 4)
function JoueurPlusgrandScore($tab){
    $score = 0;
    $joueur = "";

    foreach ($tab as $key => $value) {
        if ($value["score"] > $score) {
            $score = $value["score"];
            $joueur = $key;
        }
    }

    return $joueur;
}

# 5)
function ageInferieurA($tab, $n = 30){
    $result = "";

    foreach ($tab as $key => $value) {
        if ($value["age"] < $n) {
            $result .= "$key<br>";
        }
    }

    echo $result;
}

# 6)
function modifierScore($joueur, $nouveauScore, $tab){
    #echo $tab[$joueur]['score'];
    #echo "<br>";
    $tab[$joueur]['score'] = $nouveauScore;
    #echo $tab[$joueur]['score'];
}

# 7)
function afficherJoueur($pseudo , $tab, $version){
    #Version question 7
    if ($version == 1) {
        $infos = "";

    foreach ($tab[$pseudo] as $key => $value) {
        $infos .= "<b>$key :</b> $value<br>";
    }
    echo ("<b><u>$pseudo :<br></u></b>");
    echo("$infos<br>");
    }
    

    #Version question 12
    if ($version == 2) {
        $prenom = $tab[$pseudo]["prenom"];
    $nom = $tab[$pseudo]["nom"];
    $age = $tab[$pseudo]["age"];
    $score = $tab[$pseudo]["score"];

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

    echo "</tr>";
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

    echo "</tr>";

    echo "</table>";
    }
}

# 8)
function afficherAllJoueurs($tab, $version){
    foreach ($tab as $key => $value) {
        afficherJoueur($key, $tab, $version);
    }
}

# 9)
function infosMeileurJoueur($tab){
    afficherJoueur(JoueurPlusgrandScore($tab), $tab);
}

# 10)
function ageInferieur2($tab, $n = 30){
    $result = "";

    foreach ($tab as $key => $value) {
        if ($value["age"] < $n) {
            afficherJoueur($key, $tab);
        }
    }
}

# 11)
#ageInferieur2($joueurs, 40);
#ageInferieur2($joueurs, 20);

#afficherJoueur("lroos", $joueurs);
afficherAllJoueurs($joueurs, 1);
afficherAllJoueurs($joueurs, 2);
#infosMeileurJoueur($joueurs);
?>