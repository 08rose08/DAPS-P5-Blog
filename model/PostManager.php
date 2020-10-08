<?php

//require_once 'Manager.php';
//require 'Post.php';

class PostManager extends Manager
{
   //CRUD
    public function getPosts()
    {
        $posts = [];
        $db = $this->dbConnect();
        $req = $db->query('SELECT post.id, post.id_author, post.title, post.content, post.chapo, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date, user.username FROM post JOIN user ON post.id_author = user.id ORDER BY last_update_date DESC');
        //var_dump($req);
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

    public function getOnePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post.id, post.id_author, post.title, post.content, post.chapo, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date, user.username FROM post JOIN user ON post.id_author = user.id WHERE post.id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        $post = new Post($data);
        return $post;
    }

    public function addPost($post)
    {


        $db = $this->dbConnect();
        $addPost = $db->prepare('INSERT INTO post VALUES (NULL, :id_author, :title, :content, NOW(), :chapo)');
        $addPost->bindValue(':id_author', $post->id_author());
        $addPost->bindValue(':title', $post->title());
        $addPost->bindValue(':content', $post->content());
        $addPost->bindValue(':chapo', $post->chapo());


        $affectedLines = $addPost->execute();

        return $affectedLines;
    }

    public function deletePost()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE id = ?');
        $affectedLines = $req->execute(array($_GET['id']));
 
    }
}