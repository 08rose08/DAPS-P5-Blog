<?php

require_once 'Manager.php';
require 'Comment.php';

class CommentManager extends Manager
{
    public function getComments($id)
    {
        $comments = [];
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT comment.id, comment.id_post, comment.id_author, comment.content, DATE_FORMAT(comment.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, user.name FROM comment JOIN user ON comment.id_author = user.id WHERE comment.id_post = ? ORDER BY creation_date DESC');
        $req->execute(array($id));

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        
        return $comments;  
    }
}