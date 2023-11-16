<?php
# Exercice 1

function maxTableau($tab){
    $max = 0;

    for ($i = 0; $i < count($tab); $i++){
        if ($tab[$i] > $max){
            $max = $tab[$i];
        }
    }
        
    echo "max du tableau : $max";
}

function isIn($tab, $v){
    for ($i = 0; $i < count($tab); $i++){
        if ($tab[$i] == $v){
            return "$v est dans le tableau";
        }
    }

    return "$v n'est pas dans le tableau";
}

# Cette fonction est juste pour le fun (c'est une version alternative, coder de façon "récursive" pour ceux que ça intéresse la bonne fonction est fiboIteratif juste en dessous
function fibonnaciRecursif($n){
    if ($n == 0){
        return 0;

    }elseif ($n == 1){
        return 1;

    }else{
        return (fibonnaciRecursif($n - 1) + fibonnaciRecursif($n - 2));
    }
}

function fiboIteratif($n){
    $tab = array();

    if ($n == 0){
        $tab[] = 0;

    }elseif ($n == 1){
        $tab[] = 1;

    }else{
        $a = 0;
        $b = 1;

        for($i = 2; $i <= $n; $i++){
            $c = $a + $b;
            $a = $b;
            $b = $c;

            $tab[] = $c;
        }
    }

    foreach($tab as $v){
        echo "$v - ";
    }
}

$t = array(-13, 0, 53, 26, -513, 685, 23, 11);

#maxTableau($t);
#echo isIn($t, 27);
#echo fibonnaciRecursif(20);
#fiboIteratif(10);


# Exercice 2

$année = array(
    "Janvier" => 31,
    "Février" => 28,
    "Mars" => 31,
    "Avril" => 30,
    "Mai" => 31,
    "Juin" => 30,
    "Juillet" => 31,
    "Août" => 31,
    "Septembre" => 30,
    "Octobre" => 31,
    "Novembre" => 30,
    "Décembre" => 31,
);

function parcoursTableau($tab){
    foreach($tab as $key => $value){
        echo "$key -> $value jours </br>";
    } 
}

#parcoursTableau($année);

# Exercice 3

$commandes = array(
    "Janvier" => array(
        "Papier" => 23,
        "Stylos" => 123,
        "Crayon" => 265,
        "Cartouche" => 5,
    ),
    "Février" => array(
        "Papier" => 24,
        "Stylos" => 324,
        "Crayon" => 345,
        "Cartouche" => 3,
    ),
    "Mars" => array(
        "Papier" => 40,
        "Stylos" => 234,
        "Crayon" => 340,
        "Cartouche" => 2,
    ),
    "Avril" => array(
        "Papier" => 34,
        "Stylos" => 256,
        "Crayon" => 230,
        "Cartouche" => 4,
    ),
    "Mai" => array(
        "Papier" => 34,
        "Stylos" => 236,
        "Crayon" => 240,
        "Cartouche" => 5,
    ),
    "Juin" => array(
        "Papier" => 41,
        "Stylos" => 237,
        "Crayon" => 270,
        "Cartouche" => 2,
    ),
    "Juillet" => array(
        "Papier" => 23,
        "Stylos" => 170,
        "Crayon" => 98,
        "Cartouche" => 1,
    ),
    "Août" => array(
        "Papier" => 2,
        "Stylos" => 10,
        "Crayon" => 23,
        "Cartouche" => 1,
    ),
    "Septembre" => array(
        "Papier" => 23,
        "Stylos" => 123,
        "Crayon" => 123,
        "Cartouche" => 9,
    ),
    "Octobre" => array(
        "Papier" => 25,
        "Stylos" => 145,
        "Crayon" => 140,
        "Cartouche" => 10,
    ),
    "Novembre" => array(
        "Papier" => 87,
        "Stylos" => 240,
        "Crayon" => 150,
        "Cartouche" => 5,
    ),
    "Décembre" => array(
        "Papier" => 56,
        "Stylos" => 259,
        "Crayon" => 180,
        "Cartouche" => 7,
    ),
);

$prix_u = array(
    "Papier" => 2.25,
    "Stylos" => 0.50,
    "Crayon" => 0.20,
    "Cartouche" => 8
);

function depenseAnnuelleOnProduct($produit){
    global $commandes;
    global $prix_u;
    $totalCommandes = 0;

    foreach($commandes as $v){
        $totalCommandes += $v[$produit];
    }

    $total = $totalCommandes * $prix_u[$produit];

    return $total;
}

function depenseAnnuelleTotal(){
    global $prix_u;
    $total = 0;

    foreach($prix_u as $key => $value){
        $total += depenseAnnuelleOnProduct($key);
    }

    echo "Dépense total annuelle de l'entreprise : $total";
}

depenseAnnuelleTotal();
?>
