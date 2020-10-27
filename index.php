<?php 
session_start();

include_once 'config.php';

try {
    if (empty($_GET)){
        $controller = new IndexController;
        $controller->showIndex();
    }elseif (!empty($_GET['action'])){
        //var_dump($_GET);
        if(empty($_POST)){ $_POST = NULL; }
        if(empty($_SESSION)){ $_SESSION = NULL; }
        $request = new Request($_GET,$_POST,$_SESSION);
        //var_dump($request->get());
        $getArray = $request->get();
        //var_dump($get['action']);
        $postArray = $request->post();
        $sessionArray = $request->session();

        $admin = (isset($sessionArray['admin']) AND $sessionArray['admin'] == 1);
        $login = (isset($sessionArray['id']) AND isset($sessionArray['username']));

        switch ($getArray['action']){
            case 'legal':
                $controller = new IndexController;
                $controller->showLegal();
                break;
                
            case 'getPosts':
                $controller = new PostController;
                //$getPost = $controller->getPosts();
                $getPosts = $controller->getPostsPage($getArray['numPage']);
                break;
    
            case 'getOnePost': //login
                if ($login){
                        $postController = new PostController;
                        $getOnePost = $postController->getOnePost($getArray['id']);                    
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
                    $addPost = $controller->addPost($postArray);
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }
                
            case 'addComment': //login
                if ($login){
                    $controller = new CommentController;
                    $addComment = $controller->addComment($getArray, $postArray, $sessionArray);
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
                $signup = $controller->signup($postArray);
                break;

            case 'showLogin':
                $controller = new UserController;
                $showLogin = $controller->showFormLogin();
                break;

            case 'login':
                $controller = new UserController;
                $login = $controller->login($postArray);
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
                    $controller->deletePost($getArray, $sessionArray);
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

            case 'updatePost':
                if ($admin){
                    $controller = new PostController;
                    $controller->updatePost($getArray, $postArray, $sessionArray);
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }
                
            case 'deleteComment':
                if ($admin){
                    $controller = new CommentController;
                    $controller->deleteComment($getArray, $sessionArray);
                    break;
                }else{
                    header('Location: index.php?action=showLogin');
                }

            case 'validateComment':
                if ($admin){
                    $controller = new CommentController;
                    $controller->validateComment($getArray, $sessionArray);
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
