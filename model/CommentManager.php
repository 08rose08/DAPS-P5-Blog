<?php

//require_once 'Manager.php';
//require 'Comment.php';

class CommentManager extends Manager
{
    public function getComments()
    {
        $comments = [];
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT comment.id, comment.id_post, comment.id_author, comment.content, DATE_FORMAT(comment.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, user.username FROM comment JOIN user ON comment.id_author = user.id WHERE comment.id_post = ? ORDER BY creation_date DESC');
        $req->execute(array($_GET['id']));

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        return $comments; 
    }
    public function addComment($comment)
    {
        $db = $this->dbConnect();
        $addComment = $db->prepare('INSERT INTO comment VALUES (NULL,:id_post, :id_author, :content, NOW())');
        $addComment->bindValue(':id_post', $comment->id_post());
        $addComment->bindValue(':id_author', $comment->id_author());
        $addComment->bindValue(':content', $comment->content());

        $affectedLines = $addComment->execute();

        return $affectedLines;
    }
}