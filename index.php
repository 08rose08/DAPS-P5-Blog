<?php 
session_start();

include_once 'config.php';

try {
    if (empty($_GET)){
        $controller = new IndexController;
        $controller->showIndex();
    }else{
        switch ($_GET['action']){
            case 'getPosts':
                $controller = new PostController;
                $getPost = $controller->getPosts();
                break;

            case 'getOnePost': //login
                if (isset($_SESSION['id']) AND isset($_SESSION['username'])) {
                        $postController = new PostController;
                        $getOnePost = $postController->getOnePost();                    
                        break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

            case 'writePost': //admin
                if ($_SESSION['admin'] != 1){
                    
                }else{
                    $controller = new PostController;
                    $controller->writePost();
                    break;
                }

            case 'addPost': //admin
                $controller = new PostController;
                $addPost = $controller->addPost();
                break;
                
            case 'addComment': //login
                if (isset($_SESSION['id']) AND isset($_SESSION['username'])) {
                    $controller = new CommentController;
                    $addComment = $controller->addComment();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

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

            case 'logout': //login
                if (isset($_SESSION['id']) AND isset($_SESSION['username'])) {
                    $controller = new UserController;
                    $logout = $controller->logout();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }


            case 'showAdmin':
                //if pas admin -> modal?? 'espace reserve à l'admin"
                //else if admin 
                if ($_SESSION['admin'] != 1){

                }else{
                    $controller = new IndexController;
                    $controller->showAdmin();
                    break;
                }

            case 'getInvalidComments':
                if ($_SESSION['admin'] != 1){
                }else{
                    $controller = new CommentController;
                    $controller->getInvalidComments();
                }
        }
    }
}
catch(Exception $e) {
    echo 'Erreur :' . $e->getMessage();
}
