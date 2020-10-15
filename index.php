<?php 
session_start();

include_once 'config.php';

try {
    if (empty($_GET)){
        $controller = new IndexController;
        $controller->showIndex();
    }elseif (!empty($_GET['action'])){
        $action = stripslashes($_GET['action']);
        $action = trim($action);
        $action = htmlspecialchars($action);

        $admin = (isset($_SESSION['admin']) AND $_SESSION['admin'] == 1);
        $login = (isset($_SESSION['id']) AND isset($_SESSION['username']));

        switch ($action){
            case 'getPosts':
                $controller = new PostController;
                $getPost = $controller->getPosts();
                break;
    
            case 'getOnePost': //login
                if ($login){
                        $postController = new PostController;
                        $getOnePost = $postController->getOnePost();                    
                        break;
                }else{
                    header('Location: index.php?action=showLogin');
                }
    
            case 'writePost': //admin
                if ($admin){
                    $controller = new PostController;
                    $controller->writePost();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

            case 'addPost': //admin
                if ($admin){
                    $controller = new PostController;
                    $addPost = $controller->addPost();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }
                
            case 'addComment': //login
                if ($login){
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
                if ($login){
                    $controller = new UserController;
                    $logout = $controller->logout();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }


            case 'showAdmin':
                //if pas admin -> modal?? 'espace reserve à l'admin"
                //else if admin 
                if ($admin){
                    $controller = new IndexController;
                    $controller->showAdmin();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

            case 'getInvalidComments':
                if ($admin){
                    $controller = new CommentController;
                    $controller->getInvalidComments();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

            case 'deletePost':
                if ($admin){
                    $controller = new PostController;
                    $controller->deletePost();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

            case 'updatePost':
                if ($admin){
                    $controller = new PostController;
                    $controller->updatePost();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }
                
            case 'deleteComment':
                if ($admin){
                    $controller = new CommentController;
                    $controller->deleteComment();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

            case 'validateComment':
                if ($admin){
                    $controller = new CommentController;
                    $controller->validateComment();
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }
                
            default:
                $controller = new IndexController;
                $controller->showIndex();

        }
    }
}
catch(Exception $e) {
    echo 'Erreur :' . $e->getMessage();
}
