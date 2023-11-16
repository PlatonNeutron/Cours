<?php
#1)
$VentesV = array(
    "P505" => array(
        "Intitule" => "Peugeot 505",
        "Puissance" => 115,
        "PrixU" => 5500,
        "Ventes" => 1200,
        "Prix" => 0
    ), 
    "VPAS1" => array(
        "Intitule" => "VW Passat 1",
        "Puissance" => 105,
        "PrixU" => 5000,
        "Ventes" => 1250,
        "Prix" => 0
    ),  
    "R16" => array(
        "Intitule" => "Renault 16",
        "Puissance" => 80,
        "PrixU" => 4000,
        "Ventes" => 1150,
        "Prix" => 0
    )
);

#2)
function prixTotalVoitureVendu(int $prixU, int $NbVoitures) : int {
    return $prixU * $NbVoitures;
}

#3)
function updateTableau() : void {
    global $VentesV;

    foreach ($VentesV as $key => $value) {
        $VentesV[$key]["Prix"] = prixTotalVoitureVendu($VentesV[$key]["PrixU"], $VentesV[$key]["Ventes"]);
    }
}

#4)
#Intitule, Puissance, PrixU, Ventes, Prix
#des arrays

#5)
#4000

#6)
function ensembleVentes(array $tab) : void {
    $result = "";

    foreach ($tab as $key => $value) {
        $result .= $tab[$key]["Intitule"]." ($key) : ".$tab[$key]["Prix"]."€, ";
    }
    echo("Les voitures se sont vendus comme suit : $result");
}

#7)
function modèleMoinsPuissant(array $tab) : void {
    $result = "";

    foreach ($tab as $key => $value) {
        if ($result == "" || $tab[$key]["Puissance"] < $tab[$result]["Puissance"]) {
            $result = $key;
        }
    }

    echo("Le le modèle moins puissant est la ".$tab[$result]["Intitule"]." code : $result");
}

#8)
$VentesV["R16"]["PrixU"] = 4200;
updateTableau();


#================================================
#2)
#updateTableau($VentesV);
#echo($VentesV["P505"]["Prix"]."<br>");
#echo($VentesV["VPAS1"]["Prix"]."<br>");
#echo($VentesV["R16"]["Prix"]."<br>");

#6)
#updateTableau();
#ensembleVentes($VentesV);

#7)
#modèleMoinsPuissant($VentesV);
?>