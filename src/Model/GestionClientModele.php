<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionClientModele
 *
 * @author lautrette.antoine
 */
namespace APP\Modele;

use Tools\Connexion;
use PDO;
use APP\Entity\Client;

class GestionClientModele {
    //put your code here
    
    public function find(string $id) : Client{
        
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from CLIENT where id=:id";
        $ligne = $unObjetPdo->prepare($sql);
        $ligne->bindValue(':id', $id, PDO::PARAM_INT);
        $ligne->execute();
        return $ligne->fetchObject(Client::class);
    }
}
