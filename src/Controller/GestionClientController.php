<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace APP\Controller;

use ReflectionClass;
use APP\Modele\GestionClientModele;
use APP\Entity\Client;

/**
 * Description of GestionClientController
 *
 * @author lautrette.antoine
 */
class GestionClientController {
    //put your code here
    
    public function chercheUn(array $params) : void{
        
        $modele = new GestionClientModele();
        $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT);
        $unClient = $modele->find($id);
        if($unClient){
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/unClient.php";           
        } else {
            throw new Exception("Client " . $id . "inconnu");
        }
    }
    
    public function chercheTous() : void {
        $modele = new GestionClientModele();
        $clients = $modele->findAll();               
        $r = new ReflectionClass($this);
        include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/plusieursClients.php";                
    }
}
