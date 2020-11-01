<?php

namespace APP\Entity;

class Client {
    private $id;
    private $titreCli;
    private $nomCli;
    private $prenomCli;
    private $adresseRue1Cli;
    private $adresseRue2Cli;
    private $cpCli;
    private $villeCli;
    private $telCli;

    public function __construct($params = null) {
        if (!is_null($params)) {
            foreach ($params as $cle => $valeur) {
                if(strlen($valeur)>0){
                $this->$cle = $valeur;
                } else{
                     $this->$cle = null;
                }
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getTitreCli() {
        return $this->titreCli;
    }

    public function getNomCli() {
        return $this->nomCli;
    }

    public function getPrenomCli() {
        return $this->prenomCli;
    }

    public function getAdresseRue1Cli() {
        return $this->adresseRue1Cli;
    }

    public function getAdresseRue2Cli() {
        return $this->adresseRue2Cli;
    }

    public function getCpCli() {
        return $this->cpCli;
    }

    public function getVilleCli() {
        return $this->villeCli;
    }

    public function getTelCli() {
        return $this->telCli;
    }

    public function __toString() {
        return "Le client dont le numéro est égal à " . $this->noCli . " s'appelle " . $this->titreCli . " " . $this->nomCli . " " . $this->prenomCli . "<br>";
    }
    
    function setAdresseRue1Cli($adresseRue1Cli): void {
        $this->adresseRue1Cli = $adresseRue1Cli;
    }

    function setAdresseRue2Cli($adresseRue2Cli): void {
        $this->adresseRue2Cli = $adresseRue2Cli;
    }

    function setCpCli($cpCli): void {
        $this->cpCli = $cpCli;
    }

    function setVilleCli($villeCli): void {
        $this->villeCli = $villeCli;
    }

    function setTelCli($telCli): void {
        $this->telCli = $telCli;
    }

}
