<?php

require 'model/CommentManager.php';

class CommentController
{
    function getComments()
    {
        $commentManager = new CommentManager;
        $comments = $commentManager->getComments();
        //require 'view/commentsView.php';
        return $comments;
    }
    function addComment()
    {
        if (isset($_SESSION['id']) && isset($_GET['id']) && isset($_POST['content'])){

            $commentManager = new CommentManager;
            
            $affectedLines = $commentManager->addComment(); //???

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