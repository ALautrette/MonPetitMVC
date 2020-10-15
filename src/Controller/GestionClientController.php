<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace APP\Controller;

/**
 * Description of GestionClientController
 *
 * @author lautrette.antoine
 */
class GestionClientController {
    //put your code here
    
    public function chercheUn(array $params){
        
        $modele = new \APP\Modele\GestionClientModele();
        $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT);
        $unClient = $modele->find($id);
        if($unClient){
            $r = new \ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/unClient.php";           
        } else {
            throw new Exception("Client " . $id . "inconnu");
        }
    }
}
