<?php

require 'model/PostManager.php';

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
}