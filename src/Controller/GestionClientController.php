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
use Tools\MyTwig;
use Exception;

/**
 * Description of GestionClientController
 *
 * @author lautrette.antoine
 */
class GestionClientController {
    //put your code here
    
    public function chercheUn(array $params) : void{
        
        $modele = new GestionClientModele();
        //dans tous les cas on récupère les Ids des clients
        $ids = $modele->findIds();
        //on place ces Ids dans le tableau de paramètres que l'on va envoyer 
        //à la vue
        $params['lesId'] = $ids;
        //on teste si l'id du client à rechercher a été passé dans l'URL
        if(array_key_exists('id', $params)){
            $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT);
            $unClient = $modele->find($id);
            //on place le client trouvé dans le tableau de paramètres que l'on 
            //va envoyer à la vue
            $params['unClient'] = $unClient;
        }
        $r = new ReflectionClass($this);
        $vue = str_replace('Controller', 'View', 
                $r->getShortName()) . "/unClient.html.twig";
        MyTwig::afficheVue($vue, $params);                
    }
    
    public function chercheTous() : void {
        $modele = new GestionClientModele();
        $clients = $modele->findAll();               
        $r = new ReflectionClass($this);
        $vue = str_replace('Controller', 'View', $r->getShortName()) . "/tousClients.html.twig"; 
        MyTwig::afficheVue($vue, array('clients' => $clients));                
    }
    
    public function creerClient() : void{
        $vue = "GestionClientView\\creerClient.html.twig";
        MyTwig::afficheVue($vue, array());
    }
    
    public function enregistreClient(array $params): void{
        
        $client = new Client($params);
        $modele = new GestionClientModel();
        $modele->enregistreClient($client);
    }
}
