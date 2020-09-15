<?php

require_once 'Manager.php';
require 'Post.php';

class PostManager extends Manager
{
   //CRUD
    public function getPosts()
    {
        $posts = [];
        $db = $this->dbConnect();
        $req = $db->query('SELECT post.id, post.id_author, post.title, post.content, post.chapo, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date, user.name FROM post JOIN user ON post.id_author = user.id ORDER BY last_update_date DESC');
        
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($data);
        }
        
        /**
         * $req->setFetchMode(PDO::FETCH_CLASS, 'Post');
         * $post = $req->fetch()
         */

        return $posts;
        
    }

    /**public function getOnePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post.id, post.id_author, post.title, post.content, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date_fr, user.name FROM post JOIN user ON post.id_author = user.id WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }**/
}