<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once PATH_VIEW . "header.html";

echo "Nombre de commandes trouvées : " . count($commandes) . "<br>";
foreach ($commandes as $commande) {
    if (is_null($commande->getNoFacture())){
        $noFacture = "Non Facturée";
    } else{
        $noFacture = $commande->getNoFacture();
    }
        
    echo "<br>" . $commande->getId() . " - " . $commande->getDateCde() 
            . " - " . $noFacture . " - " . $commande->getIdClient();
}
include_once PATH_VIEW . "footer.html";