<?php 

$hostC = 'host'; 
$dbnameC = 'db'; 
$usernameC = 'username'; 
$passwordC = 'pass';

function autoload($class_name){
    $folders = array('controller/', 'model/', 'view/');

    foreach($folders as $folder){
        if (file_exists($folder . $class_name . '.php')){
            require_once $folder . $class_name . '.php';
            return;
        }
    }
   
}

spl_autoload_register('autoload');

