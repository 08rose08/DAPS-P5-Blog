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
                    throw new Exception('Aucun id de post envoyé');
                }
                break;

            case 'writePost':
                $controller = new PostController;
                $controller->writePost();
                break;

            case 'addPost':
                if (/*isset($_POST['id_author'])*/isset($_POST['title']) && isset($_POST['content']) && isset($_POST['chapo'])){
                    $controller = new PostController;
                    $addPost = $controller->addPost($_POST);
                }else{
                    throw new Exception('Donnée.s manquante.s');
                }
                break;
            case 'addComment':
                if (/*isset($_POST['id_author']) &&  isset($_GET['id']) && */isset($_POST['content'])){
                    $controller = new CommentController;
                    var_dump($_POST);
                    $addComment = $controller->addComment($_POST, $_GET['id']);
                }else{
                    throw new Exception('Pas de commentaire envoyé');
                }
                break;
            case 'showSignup':
                $controller = new UserController;
                $showSignup = $controller->showForm();
                break;
            case 'signup':
                $controller = new UserController;
                $signup = $controller->signup();
                break;

        }
    }
}
catch(Exception $e) {
    echo 'Erreur :' . $e->getMessage();
}
