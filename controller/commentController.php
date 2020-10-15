<?php

//require 'model/CommentManager.php';

class CommentController extends Controller
{

    function addComment()
    {
        if (isset($_SESSION['id']) && isset($_GET['id']) && isset($_POST['content'])){
            $content = $this->checkForm($_POST['content']);

            $comment = new Comment($content);
            $comment->setId_post((int)$_GET['id']);
            $comment->setId_author((int)$_SESSION['id']);

            $commentManager = new CommentManager;
            $affectedLines = $commentManager->addComment($comment); 

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter le commentaire!');
            }else{
                header('Location: index.php?action=getOnePost&id=' . (int)$_GET['id']); // récupérer l'id du post
            }
        }else{
            throw new Exception('Pas de commentaire envoyé');
        }
    }

    public function getInvalidComments()
    {
        $commentManager = new CommentManager;
        $comments = $commentManager->getInvalidComments();

        $view = new View('invalidComments');
        $view->render(array('comments' => $comments));

    }

    public function deleteComment()
    {
        if (isset($_SESSION) && $_SESSION['admin'] == 1){
            $getId = $this->checkForm($_GET['id']);
            $commentManager = new CommentManager;
            $affectedLines = $commentManager->deleteComment($getId);
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le commentaire!');
            }else{
                header('Location: index.php?action=getInvalidComments');
            }
        }else{
            throw new Exception('Il faut être admin');
        }
    }

    public function validateComment()
    {
        if (isset($_SESSION) && $_SESSION['admin'] == 1){
            $getId = $this->checkLine($_GET['id']);
            $commentManager = new CommentManager;
            $commentManager->validateComment($getId);
            if ($affectedLines === false) {
                throw new Exception('Impossible de valider le commentaire!');
            }else{
                header('Location: index.php?action=getInvalidComments');
            }
        }else{
            throw new Exception('Il faut être admin');
        }

    }
}