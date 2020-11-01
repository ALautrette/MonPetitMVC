<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IdentificationController
 *
 * @author lautrette.antoine
 */
namespace APP\Controller;

use Tools\MyTwig;

class IdentificationController {
    //put your code here
    
    public function login(): void {
        $vue = "GestionClientView\\filtreClients.html.twig";
        MyTwig::afficheVue($vue, array());
    }
}
