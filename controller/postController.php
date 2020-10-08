<?php

//require_once 'model/PostManager.php';
//require_once 'model/CommentManager.php';
//require_once 'view/View.php';

class PostController
{
    function getPosts()
    {
        $postManager = new PostManager;
        $posts = $postManager->getPosts();
        //print_r($posts);
        $view = new View('listPosts');
        $view->render(array('posts' => $posts));

        //require 'view/listPostsView.php';
    }
    
    function getOnePost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0){
            $commentManager = new CommentManager;
            $comments = $commentManager->getComments();
            
            $postManager = new PostManager;
            $post = $postManager->getOnePost($_GET['id']);
            
            $view = new View('post');
            $view->render(array('post' => $post, 'comments' => $comments));
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
        $view = new View('addPost');
        $view->render();
        //require 'view/addPostView.php';
    }

    function addPost()
    {
        if (isset($_SESSION['id']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['chapo'])){
            /*$data = array(
                'id_author' => $_SESSION['id'],
                'title' => $_POST['title'],
                'content'=> $_POST['content'],
                'chapo' => $_POST['chapo']
            );*/
    
            $post = new Post($_POST);
            $post->setId_author($_SESSION['id']);

            if(empty($post->title())){
                return $this->writePost($post, 'titre vide');
            }elseif(empty($post->chapo())){
                return $this->writePost($post, 'chapô vide');
            }elseif(empty($post->content())){
                return $this->writePost($post, 'contenu vide');
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
        if (isset($_SESSION) && $_SESSION['admin'] == 1){
            $postManager = new PostManager;
            $postManager->deletePost();
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le post!');
            }else{
                header('Location: index.php?action=getPosts');
            }
        }else{
            throw new Exception('Il faut être admin');
        }
    }

}