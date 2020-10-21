<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools;

use Twig_Loader_Filesystem;
use Twig_Environment;

/**
 * Description of MyTwig
 *
 * @author user
 */
abstract class MyTwig {
    //put your code here
    
    private static function getLoader() : Twig_Environment{
        $loader = new Twig_Loader_Filesystem(PATH_VIEW);
        
        return new Twig_Environment($loader, array(
            'cache' => false
        ));
    }
    
    public static function afficheVue(string $vue,array $params) : void {
        $twig = self::getLoader();
        $template = $twig->loadTemplate($vue);
        echo $template->render($params);
    }
}
