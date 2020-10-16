<?php

//require_once 'Manager.php';
//require 'Comment.php';

class CommentManager extends Manager
{
    public function getComments($getId)
    {
        $comments = [];
        $getdb = $this->dbConnect();
        $req = $getdb->prepare('SELECT comment.id, comment.id_post, comment.id_author, comment.content, DATE_FORMAT(comment.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, user.username FROM comment JOIN user ON comment.id_author = user.id WHERE comment.id_post = ? AND comment.valid = 1 ORDER BY creation_date DESC');
        $req->execute(array($getId));

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        return $comments; 
    }
    public function addComment($comment)
    {
        //var_dump($comment);
        $getdb = $this->dbConnect();
        $addComment = $getdb->prepare('INSERT INTO comment VALUES (NULL, :id_post, :id_author, :content, NOW(), 0)');
        $addComment->bindValue(':id_post', $comment->id_post());
        $addComment->bindValue(':id_author', $comment->id_author());
        $addComment->bindValue(':content', $comment->content());

        $affectedLines = $addComment->execute();

        return $affectedLines;
    }

    public function getInvalidComments()
    {
        $comments = [];
        $getdb = $this->dbConnect();
        $req = $getdb->query('SELECT comment.id, comment.id_post, comment.id_author, comment.content, DATE_FORMAT(comment.creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, user.username FROM comment JOIN user ON comment.id_author = user.id WHERE comment.valid = 0 ORDER BY creation_date DESC');

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        return $comments; 
    }

    public function deleteComment($getId)
    {
        $getdb = $this->dbConnect();
        $req = $getdb->prepare('DELETE FROM comment WHERE id = ?');
        $affectedLines = $req->execute(array($getId));

        return $affectedLines;
    }

    public function validateComment($getId)
    {
        $getdb = $this->dbConnect();
        $req = $getdb->prepare('UPDATE comment SET valid = 1 WHERE id = ?');
        $affectedLines = $req->execute(array($getId));

        return $affectedLines;

    }
}