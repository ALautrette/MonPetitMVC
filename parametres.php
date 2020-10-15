<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('PATH_CSS', RACINE . "assets" . DS . "css" . DS);
define('PATH_JS', RACINE . "assets" . DS . "js" . DS);
define('PATH_VENDOR', RACINE . "vendor".DS);
define('PATH_VIEW', RACINE . "template" . DS);

define('DATABASE_URL', "localhost");
define('DATABASE_USER', "benoit");
define('DATABASE_PWD', "motdepasse");
define('DATABASE_NAME', "clicom");
define('CNSTRING', "mysql:host=". DATABASE_URL . ";dbname=" . DATABASE_NAME . ";charset=UTF8");