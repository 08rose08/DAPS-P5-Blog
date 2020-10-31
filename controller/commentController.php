<?php

class CommentController extends Controller
{

    function addComment($getArray, $postArray, $sessionArray)
    {
        if (!empty($sessionArray['id']) && !empty($getArray['id']) && !empty($postArray['content'])){
            $comment = new Comment($postArray);
            $comment->setId_post($getArray['id']);
            $comment->setId_author($sessionArray['id']);

            $commentManager = new CommentManager;
            $affectedLines = $commentManager->addComment($comment); 

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter le commentaire!');
            }else{
                header('Location: index.php?action=getOnePost&id=' . $getArray['id']); 
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

    public function deleteComment($getArray, $sessionArray)
    {
        if ($sessionArray['admin'] == 1){
            $commentManager = new CommentManager;
            $affectedLines = $commentManager->deleteComment($getArray['id']);
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le commentaire!');
            }else{
                header('Location: index.php?action=getInvalidComments');
            }
        }else{
            throw new Exception('Il faut être admin');
        }
    }

    public function validateComment($getArray, $sessionArray)
    {
        if (!empty($getArray['id']) && $sessionArray['admin'] == 1){
            $commentManager = new CommentManager;
            $affectedLines = $commentManager->validateComment($getArray['id']);
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