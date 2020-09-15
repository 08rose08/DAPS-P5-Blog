<?php 

function autoload($class_name){
    require 'controller/' . $class_name . '.php';
}

spl_autoload_register('autoload');

try {
    if (empty($_GET)){
        $controller = new IndexController;
    }else{
        switch ($_GET['action']){
            case 'getPosts':
                $controller = new PostController;
                $getPost = $controller->getPosts();
                break;
        }
    }
}
catch(Exception $e) {
    echo 'Erreur :' . $e->getMessage();
}
