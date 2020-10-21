<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace APP\Controller;

use APP\Modele\GestionCommandeModele;
use ReflectionClass;

/**
 * Description of GestionCommandeController
 *
 * @author user
 */
class GestionCommandeController {
    //put your code here
    
    public function chercheUne(array $params) : void{
        $modele = new GestionCommandeModele();
        $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT);
        $uneCommande = $modele->find($id);
        if($uneCommande){
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/uneCommande.php";           
        } else {
            throw new Exception("Client " . $id . "inconnu");
        }
    }
    
    public function chercheToutes() : void{
        $modele = new GestionCommandeModele();
        $commandes  = $modele->findAll();
        $r = new ReflectionClass($this);
        include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/plusieursCommandes.php";
    }
}
