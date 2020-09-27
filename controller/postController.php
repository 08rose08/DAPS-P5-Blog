<?php

require_once 'model/PostManager.php';

class PostController
{
    /**function __construct()
    {
        $postManager = new PostManager;
    }**/

    function getPosts()
    {
        $postManager = new PostManager;
        $posts = $postManager->getPosts();
        //print_r($posts);
        require 'view/listPostsView.php';
    }
    function getOnePost($comments)
    {
        $postManager = new PostManager;
        $post = $postManager->getOnePost($_GET['id']);
        
        require 'view/postView.php';
    }
    function writePost()
    {
        require 'view/addPostView.php';
    }
    function addPost()
    {
        if (isset($_SESSION['id']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['chapo'])){

            $postManager = new PostManager;
            $affectedLines = $postManager->addPost(); //???
            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter le post!');
            }else{
                header('Location: index.php?action=getPosts');
            }
        }else{
            throw new Exception('Donnée.s manquante.s');
        }

    }
}