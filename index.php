<?php 
session_start();
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
                if (isset($_SESSION['id']) AND isset($_SESSION['username'])) {
                    if (isset($_GET['id']) && $_GET['id'] > 0){
                        $commentController = new CommentController;
                        $getComments = $commentController->getComments();
                        $postController = new PostController;
                        $getOnePost = $postController->getOnePost($getComments);
                    }else{
                        throw new Exception('Aucun id de post envoyé');
                    }
                    
                }else{
                    header('Location: index.php?action=showLogin');
                }

                break;

            case 'writePost':
                $controller = new PostController;
                $controller->writePost();
                break;

            case 'addPost':
                    $controller = new PostController;
                    $addPost = $controller->addPost();
                break;
            case 'addComment':
                    $controller = new CommentController;
                    $addComment = $controller->addComment();
                break;
            case 'showSignup':
                $controller = new UserController;
                $showSignup = $controller->showFormSignup();
                break;
            case 'signup':
                $controller = new UserController;
                $signup = $controller->signup();
                break;
            case 'showLogin':
                $controller = new UserController;
                $showLogin = $controller->showFormLogin();
                break;
            case 'login':
                $controller = new UserController;
                $login = $controller->login();
                break;
            case 'logout':
                $controller = new UserController;
                $logout = $controller->logout();
                break;

        }
    }
}
catch(Exception $e) {
    echo 'Erreur :' . $e->getMessage();
}
