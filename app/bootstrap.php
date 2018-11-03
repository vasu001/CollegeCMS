<?php

    // Load Config File
    require_once('config/config.php');

    // Load Helper Functions
    require_once('helpers/url_helper.php');
    require_once('helpers/session_helper.php');

    // Load Libraries
    spl_autoload_register(function($classname){
        require_once('libraries/'. $classname. '.php');
    });

    // Initialize Core Controller
    $init = new Core;