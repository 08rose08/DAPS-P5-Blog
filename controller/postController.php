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
    function getOnePost($id, $comments)
    {
        $postManager = new PostManager;
        $post = $postManager->getOnePost($id);
        
        require 'view/postView.php';
    }
    function writePost()
    {
        require 'view/addPostView.php';
    }
    function addPost($dataPost)
    {
        $postManager = new PostManager;
        $affectedLines = $postManager->addPost($dataPost); //???

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le post!');
        }else{
            header('Location: index.php?action=getPosts');
        }
    }
}