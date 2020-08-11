<?php

    // Load Config
    require_once 'config/config.php';
    // Load libraries
//    require_once ROOT_DIR .'/app/libraries/Core.php';
//    require_once ROOT_DIR .'/app/libraries/Controller.php';
//    require_once ROOT_DIR .'/app/libraries/Database.php';

    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });
