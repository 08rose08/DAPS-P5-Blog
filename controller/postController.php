<?php

//require_once 'model/PostManager.php';
//require_once 'model/CommentManager.php';
//require_once 'view/View.php';

class PostController extends Controller
{
    function getPosts()
    {
        $postManager = new PostManager;
        $posts = $postManager->getPosts();
        //print_r($posts);
        $userManager = new UserManager;
        $admins = $userManager->getAdmins();

        $view = new View('listPosts');
        $view->render(array('posts' => $posts, 'admins' => $admins));

        //require 'view/listPostsView.php';
    }
    
    function getOnePost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0){
            $getId = $this->checkForm($_GET['id']);

            $commentManager = new CommentManager;
            $comments = $commentManager->getComments($getId);
            
            $postManager = new PostManager;
            $post = $postManager->getOnePost($getId);
            
            $userManager = new UserManager;
            $admins = $userManager->getAdmins();    

            $view = new View('post');
            $view->render(array('post' => $post, 'comments' => $comments, 'admins' => $admins));
            //require 'view/postView.php';
        }else{
            throw new Exception('Aucun id de post envoyé');
        }

    }
    function writePost($post=null, $message=null)
    {
        /*if (!$post){
            $post = new Post;
        }*/
        $userManager = new UserManager;
        $admins = $userManager->getAdmins();
        $view = new View('addPost');
        $view->render(array('admins' => $admins));
        //require 'view/addPostView.php';
    }

    function addPost()
    {
        if (isset($_POST['id_author']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['chapo'])){
            /*$title = $this->checkForm($_POST['title']);
            $content = $this->checkForm($_POST['content']);
            $chapo = $this->checkForm($_POST['chapo']);*/
            
            $data = array(
                'id_author' => $this->checkForm($_POST['id_author']),
                'title' => $this->checkForm($_POST['title']),
                'content'=> $this->checkForm($_POST['content']),
                'chapo' => $this->checkForm($_POST['chapo'])
            );
    
            $post = new Post($data);
            //$post->setId_author($_SESSION['id']);

            if(empty($post->title())){
                return $this->writePost($post, 'titre vide');
            }elseif(empty($post->chapo())){
                return $this->writePost($post, 'chapô vide');
            }elseif(empty($post->content())){
                return $this->writePost($post, 'contenu vide');
            }elseif(empty($post->id_author())){
                return $this->writePost($post, 'auteur.e non sélectionné.e');
            }

            $postManager = new PostManager;
            $affectedLines = $postManager->addPost($post); //???
            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter le post!');
            }else{
                header('Location: index.php?action=getPosts');
            }
        }else{
            throw new Exception('Donnée.s manquante.s');
        }

    }
    function deletePost()
    {
        if (isset($_SESSION) && (int)$_SESSION['admin'] == 1){
            $getId = $this->checkForm($_GET['id']);
            $postManager = new PostManager;
            $affectedLines = $postManager->deletePost($getId);
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le post!');
            }else{
                header('Location: index.php?action=getPosts');
            }
        }else{
            throw new Exception('Il faut être admin');
        }
    }
    function updatePost()
    {
        if (isset($_SESSION) && (int)$_SESSION['admin'] == 1){
            
            if (isset($_POST['id_author']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['chapo'])){
                $data = array(
                    'id_author' => $this->checkForm($_SESSION['id']),
                    'title' => $this->checkForm($_POST['title']),
                    'content'=> $this->checkForm($_POST['content']),
                    'chapo' => $this->checkForm($_POST['chapo']),
                    'id' => $this->checkForm($_GET['id'])
                );
                
                $post = new Post($data);
                //$post->setId_author($_SESSION['id']);
    
                if(empty($post->title())){
                    return $this->writePost($post, 'titre vide');
                }elseif(empty($post->chapo())){
                    return $this->writePost($post, 'chapô vide');
                }elseif(empty($post->content())){
                    return $this->writePost($post, 'contenu vide');
                }elseif (empty($post->id_author())) {
                    return $this->writePost($post, 'auteur.e non sélectionné.e');
                }
    
                $postManager = new PostManager;
                $postManager->updatePost($post);
                if ($affectedLines === false) {
                    throw new Exception('Impossible de modifier le post!');
                }else{
                    header('Location: index.php?action=getPosts');
                }
            }else{
                throw new Exception('Donnée.s manquante.s');
                
            }
        }else{
            throw new Exception('Il faut être admin');
        }
    }

}