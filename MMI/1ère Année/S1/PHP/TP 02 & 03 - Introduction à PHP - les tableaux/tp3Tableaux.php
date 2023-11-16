<?php 
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
function afficherInfosJoueurs($tab){
    foreach ($tab as $key => $value) {
        $infos = "";

        foreach ($value as $key2 => $value2) {
            $infos .= "$key2 : $value2<br>";
        }
        echo("$key :<br>$infos<br>");
    }
}

# 5)
function afficherJoueurPlusgrandScore($tab){
    $score = 0;
    $joueur = "";

    foreach ($tab as $key => $value) {
        if ($value["score"] > $score) {
            $score = $value["score"];
            $joueur = $key;
        }
    }

    echo $joueur;
}

# 6)
function ageInferieurA($tab, $n = 30){
    $result = "";

    foreach ($tab as $key => $value) {
        if ($value["age"] < $n) {
            $result .= "$key<br>";
        }
    }

    echo $result;
}

# 7)
function modifierScore($joueur, $nouveauScore, $tab){
    #echo $tab[$joueur]['score'];
    #echo "<br>";
    $tab[$joueur]['score'] = $nouveauScore;
    #echo $tab[$joueur]['score'];
}


#afficherInfosJoueurs($joueurs);
#afficherJoueurPlusgrandScore($joueurs);
#ageInferieurA($joueurs);
#modifierScore("jmarin3", 1000, $joueurs);


?>