<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace APP\Repository;

use Tools\Repository;

/**
 * Description of ClientRepository
 *
 * @author user
 */
class ClientRepository extends Repository {
    //put your code here
    
    public function __construct($entity){
        parent::__construct($entity);
    }
}
