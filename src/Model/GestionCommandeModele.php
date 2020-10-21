<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace APP\Modele;

use APP\Entity\Commande;
use Tools\Connexion;
use PDO;

/**
 * Description of GestionCommandeModele
 *
 * @author user
 */
class GestionCommandeModele {
    //put your code here
    
    public function find(string $id) : Commande{
        
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from COMMANDE where id=:id";
        $ligne = $unObjetPdo->prepare($sql);
        $ligne->bindValue(':id', $id, PDO::PARAM_INT);
        $ligne->execute();
        
        return $ligne->fetchObject(Commande::class);
    }
    
    public function findAll() : array{
        
        $unObjetPdo = Connexion::getConnexion();
        $sql = "select * from COMMANDE";
        $res = $unObjetPdo->prepare($sql);
        $res->execute();
        
        return $res->fetchAll(PDO::FETCH_CLASS, Commande::class);
        
    } 
}
