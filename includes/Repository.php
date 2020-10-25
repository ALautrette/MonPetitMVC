<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools;

use PDO;
use Tools\Connexion;

/**
 * Description of Repository
 *
 * @author user
 */
class Repository {
    //put your code here
    private string $classeNameLong;
    private string $classeNamespace;
    private string $table;
    private PDO $connexion;

    public function __construct(string $entity) {
        $tablo = explode("\\", $entity);
        $this->table = array_pop($tablo);
        $this->classeNamespace = implode("\\", $tablo);
        $this->classeNameLong = $entity;
        $this->connexion = Connexion::getConnexion();
    }
    
    public static function getRepository(string $entity) : object {
        $repositoryName = str_replace('Entity', 'Repository' , $entity) 
                . 'Repository';
        $repository = new $repositoryName($entity);
        return $repository;
    }
    
    public function findAll() : array{
        $sql = "select * from " . $this->table;
        $lignes = $this->connexion->query($sql);
        $lignes->setFetchMode(PDO::FETCH_CLASS, $this->classeNameLong, null);
        
        return $lignes->fetchAll();
    }
    
    public function find($id) : object{
        $sql = "select * from " . $this->table;
        $ligne = $this->connexion->query($sql);
        $ligne->bindValue(':id', $id, PDO::PARAM_INT);
        $ligne->execute();
        
        return $ligne->fetchObject($this->classeNameLong);
    }
    
    public function findIds() : array{
        $sql = "select id from " . $this->table;
        $lignes  = $this->connexion->query($sql);
        $ids = $lignes->fetchAll(PDO::FETCH_ASSOC);
        
        return $ids;
    }
    
    public function insert(object $unObjet) : void{
        $attributs = (array)$unObjet;
        array_shift($attributs);
        $colonnes = "(";
        $colonnesParams = "(";
        $parametres = array();
        foreach ($attributs as $cle => $valeur){
            $cle = str_replace("\0", "", $cle);
            $c = str_replace($this->classeNameLong, "", $cle);
            //$p = ":" . $c;
            if($c != "id"){
                $colonnes .= $c . " ,";
                $colonnesParams .= " ? ,";
                $parametres[] = $valeur;
            }
        }
        $colonnes = substr($colonnes, 0, -1);
        $colonnesParams = substr($colonnesParams, 0, -1);
        $sql = "insert into " . $this->table . " " . $colonnes . ") values " 
                . $colonnesParams . ")";
        $unObjetPDO = Connexion::getConnexion();
        $unObjetPDO->prepare($sql)->execute($parametres);
        //$req->execute($parametres);
    }
    
    public function countRows() : int{
        $sql = "select count(*) from " . $this->table;
        $res = $this->connexion->query($sql);
        $nbLignes = $res->fetch();
        
        return $nbLignes[0];
    }
    
    public function __call(string $methode, array $params) : array {
        if(preg_match("#^findBy#", $methode)){
            return $this->traiteFindBy($methode, array_values($params[0]));
        }
    }
    
    private function traiteFindBy($methode, $params) : array{
        $criteres = explode("_and_", str_replace("findBy", "", $methode));
        if(count($criteres) > 0){
            $sql = "select * from " . $this->table . " where ";
            $pasPremier = false;
            foreach ($criteres as $critere){
                if($pasPremier){
                    $sql .= ' and ';
                }
                $sql .= $critere . " = ? ";
                $pasPremier = true;
            }
            
            $lignes = $this->connexion->prepare($sql);
            $lignes->execute($params);
            $lignes->setFetchMode(PDO::FETCH_CLASS, $this->classeNameLong, null);
            return $lignes->fetchAll();
        }
    }
    
    public function findColumnDistinctValues(string $colonne) : array{
        $sql = "select distinct " . $colonne . " libelle from " 
                . $this->table . " order by 1 ";
        $tab = $this->connexion->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        
        return $tab;
    }
    
    public function findBy(array $params) : array{
        $element = "Choisir...";
        while(in_array($element, $params)){
            unset($params[array_search($element, $params)]);
        }
        $cles = array_keys($params);
        $methode = "findBy";
        for($i = 0; $i < count($cles); $i++){
            if($i > 0){
                $methode .= "_and_";
            }
            $methode .= $cles[$i];
        }
        return $this->traiteFindBy($methode, array_values($params));
    }
}
