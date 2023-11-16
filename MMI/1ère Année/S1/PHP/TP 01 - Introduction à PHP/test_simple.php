<?php 
    # Excercie 1 :

    $i = 5;
    $date = date("l d F ");
    
    echo "<b><center>Hello World \n</center></b>";
    echo "<b><center>$i \n</center></b>";
    echo "<b><center>$date \n</center></b>";

    if ($i > 0) {
        echo "i est positif et sa valeur est : $i \n";
    } else if ($i < 0) {
        echo "i est négatif et sa valeur est : $i \n";
    };

    # Exercice 2:

    $unA20 = 1;
    while ($unA20 <= 20) {
        echo "<p>$unA20 \n</p>";
        $unA20 += 1;
    };

    for ($i=1; $i < 21; $i++) { 
        echo "<p>$i \n</p>";
    }

    for ($y=0; $y < 19; $y++) { 
        $etoiles = "";
        for ($i=0; $i < 20; $i++) { 
            $etoiles .= "*";
        };
        echo "<p>$etoiles \n</p>";
    }

    for ($y=0; $y < 20; $y++) { 
        $etoilesT = "";
    
        for ($i=0; $i < 20; $i++) {
            $char = "*";

            if ($i >= $y && $i != 0) {
                $char = " ";
            };
            $etoilesT .= $char;
        };
        echo "<p>$etoilesT \n</p>";
    }
?>