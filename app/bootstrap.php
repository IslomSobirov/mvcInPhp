<?php 
    require_once 'config/config.php';
   
    //helper functions
    require_once 'helpers/session_helper.php';

    spl_autoload_register(function($loader){
        require_once 'libraries/' . $loader . '.php';
    });