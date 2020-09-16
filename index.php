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
            case 'getOnePost':
                if (isset($_GET['id']) && $_GET['id'] > 0){
                    $commentController = new CommentController;
                    $getComments = $commentController->getComments($_GET['id']);
                    $postController = new PostController;
                    $getOnePost = $postController->getOnePost($_GET['id'], $getComments);
                }else{
                    throw new Exception('Aucun id de post encoyé');
                }
                break;
            
        }
    }
}
catch(Exception $e) {
    echo 'Erreur :' . $e->getMessage();
}
