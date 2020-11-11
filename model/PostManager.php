<?php

class PostManager extends Manager
{
   //CRUD

   //Get all posts
    public function getPosts()
    {
        $posts = [];
        $getdb = $this->dbConnect();
        $req = $getdb->query('SELECT post.id, post.id_author, post.title, post.content, post.chapo, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date, post.picture, user.username FROM post JOIN user ON post.id_author = user.id ORDER BY post.last_update_date DESC');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($data);
        }
        return $posts;  
    }

    //Get how many posts there are in the db
    public function nbPosts()
    {
        $getdb = $this->dbConnect();
        $req = $getdb->query('SELECT COUNT(*) AS nb_posts FROM post');
        $data = $req->fetch();
        return $data['nb_posts'];
    }

    //get the posts for one page
    public function getPostsPage($post1, $nbPostsPage)
    {
        $posts = [];
        $getdb = $this->dbConnect();
        $req = $getdb->prepare('SELECT post.id, post.id_author, post.title, post.content, post.chapo, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date, post.picture, user.username FROM post JOIN user ON post.id_author = user.id ORDER BY post.last_update_date DESC LIMIT :post , :nbPostsPage' );
        $req->bindValue(':post', $post1, PDO::PARAM_INT);
        $req->bindValue(':nbPostsPage', $nbPostsPage, PDO::PARAM_INT);
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getOnePost($getId)
    {
        $getdb = $this->dbConnect();
        $req = $getdb->prepare('SELECT post.id, post.id_author, post.title, post.content, post.chapo, DATE_FORMAT(post.last_update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update_date, post.picture, user.username FROM post JOIN user ON post.id_author = user.id WHERE post.id = ?');
        $req->execute(array($getId));
        $data = $req->fetch();
        $post = new Post($data);
        return $post;
    }

    public function addPost($post)
    {
        $getdb = $this->dbConnect();
        $addPost = $getdb->prepare('INSERT INTO post VALUES (NULL, :id_author, :title, :content, NOW(), :chapo, NULL)');
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
        $getdb = $this->dbConnect();
        $updatePost = $getdb->prepare('UPDATE post SET id_author = :id_author, title = :title, content = :content, last_update_date = NOW(), chapo = :chapo WHERE id = :id');
        $updatePost->bindValue(':id_author', $post->id_author());
        $updatePost->bindValue(':title', $post->title());
        $updatePost->bindValue(':content', $post->content());
        $updatePost->bindValue(':chapo', $post->chapo());
        $updatePost->bindValue(':id', $post->id());

        $affectedLines = $updatePost->execute();

        return $affectedLines;
    }
    
    public function addPicture($postId, $src)
    {
        $getdb = $this->dbConnect();
        $addPicture = $getdb->prepare('UPDATE post SET picture = :src WHERE id = :id');
        $addPicture->bindValue(':src', $src);
        $addPicture->bindValue(':id', $postId);

        $affectedLines = $addPicture->execute();

        return $affectedLines;
    }
}