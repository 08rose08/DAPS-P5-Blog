<?php

require 'model/CommentManager.php';

class CommentController
{
    function getComments($id)
    {
        $commentManager = new CommentManager;
        $comments = $commentManager->getComments($id);
        //require 'view/commentsView.php';
        return $comments;
    }
}