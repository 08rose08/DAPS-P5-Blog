<?php

require 'model/CommentManager.php';

class CommentController
{

    function addComment()
    {
        if (isset($_SESSION['id']) && isset($_GET['id']) && isset($_POST['content'])){
            
            $comment = new Comment($_POST);
            $comment->setId_post($_GET['id']);
            $comment->setId_author($_SESSION['id']);

            $commentManager = new CommentManager;
            $affectedLines = $commentManager->addComment($comment); 

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter le commentaire!');
            }else{
                header('Location: index.php?action=getOnePost&id=' . $_GET['id']); // récupérer l'id du post
            }
        }else{
            throw new Exception('Pas de commentaire envoyé');
        }

    }
}