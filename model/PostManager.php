<?php

//require_once 'Manager.php';
//require 'Post.php';

class PostManager extends Manager
{
   //CRUD
    public function getPosts()
    {
        $posts = [];
        $getdb = $this->dbConnect();
        $req = $getdb->query('SELECT post.id, post.id_author, post.title, post.content, post.chapo, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date, user.username FROM post JOIN user ON post.id_author = user.id ORDER BY post.last_update_date DESC');
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

    public function getOnePost($getId)
    {
        $getdb = $this->dbConnect();
        $req = $getdb->prepare('SELECT post.id, post.id_author, post.title, post.content, post.chapo, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date, user.username FROM post JOIN user ON post.id_author = user.id WHERE post.id = ?');
        $req->execute(array($getId));
        $data = $req->fetch();
        $post = new Post($data);
        return $post;
    }

    public function addPost($post)
    {


        $getdb = $this->dbConnect();
        $addPost = $getdb->prepare('INSERT INTO post VALUES (NULL, :id_author, :title, :content, NOW(), :chapo)');
        $addPost->bindValue(':id_author', $post->id_author());
        $addPost->bindValue(':title', $post->title());
        $addPost->bindValue(':content', $post->content());
        $addPost->bindValue(':chapo', $post->chapo());


        $affectedLines = $addPost->execute();

        return $affectedLines;
    }

    public function deletePost($getId)
    {
        $getdb = $this->dbConnect();
        $req = $getdb->prepare('DELETE FROM post WHERE id = ?');
        $affectedLines = $req->execute(array($getId));

        return $affectedLines;
 
    }

    public function updatePost($post)
    {
        $getb = $this->dbConnect();
        $addPost = $getdb->prepare('UPDATE post SET id_author = :id_author, title = :title, content = :content, last_update_date = NOW(), chapo = :chapo WHERE id = :id');
        $addPost->bindValue(':id_author', $post->id_author());
        $addPost->bindValue(':title', $post->title());
        $addPost->bindValue(':content', $post->content());
        $addPost->bindValue(':chapo', $post->chapo());
        $addPost->bindValue(':id', $post->id());

        $affectedLines = $addPost->execute();

        return $affectedLines;

    }
}