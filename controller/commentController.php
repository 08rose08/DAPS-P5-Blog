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
    function addComment($dataComment, $id_post)
    {
        $commentManager = new CommentManager;
        
        $affectedLines = $commentManager->addComment($dataComment, $id_post); //???

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire!');
        }else{
            header('Location: index.php?action=getOnePost&id=' . $id_post); // récupérer l'id du post
        }
    }
}