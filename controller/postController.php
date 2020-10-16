<?php

//require_once 'model/PostManager.php';
//require_once 'model/CommentManager.php';
//require_once 'view/View.php';

class PostController extends Controller
{
    function getPosts()
    {
        $postManager = new PostManager;
        $posts = $postManager->getPosts();
        //print_r($posts);
        $userManager = new UserManager;
        $admins = $userManager->getAdmins();

        $view = new View('listPosts');
        $view->render(array('posts' => $posts, 'admins' => $admins));

        //require 'view/listPostsView.php';
    }
    
    function getOnePost($getId)
    {
        if (isset($getId) && $getId > 0){

            $commentManager = new CommentManager;
            $comments = $commentManager->getComments($getId);
            
            $postManager = new PostManager;
            $post = $postManager->getOnePost($getId);
            
            $userManager = new UserManager;
            $admins = $userManager->getAdmins();    

            $view = new View('post');
            $view->render(array('post' => $post, 'comments' => $comments, 'admins' => $admins));
            //require 'view/postView.php';
        }else{
            throw new Exception('Aucun id de post envoyé');
        }

    }
    function writePost($post=null, $message=null)
    {
        /*if (!$post){
            $post = new Post;
        }*/
        $userManager = new UserManager;
        $admins = $userManager->getAdmins();
        $view = new View('addPost');
        $view->render(array('admins' => $admins));
        //require 'view/addPostView.php';
    }

    function addPost($postArray)
    {
        if (!empty($postArray['id_author']) && !empty($postArray['title']) && !empty($postArray['content']) && !empty($postArray['chapo'])){
            /*$data = array(
                'id_author' => $this->checkForm($postArray['id_author']),
                'title' => $this->checkForm($postArray['title']),
                'content'=> $this->checkForm($postArray['content']),
                'chapo' => $this->checkForm($postArray['chapo'])
            );*/
            
    
            $post = new Post($postArray);

            if(empty($post->title())){
                return $this->writePost($post, 'titre vide');
            }elseif(empty($post->chapo())){
                return $this->writePost($post, 'chapô vide');
            }elseif(empty($post->content())){
                return $this->writePost($post, 'contenu vide');
            }elseif(empty($post->id_author())){
                return $this->writePost($post, 'auteur.e non sélectionné.e');
            }

            $postManager = new PostManager;
            $affectedLines = $postManager->addPost($post); //???
            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter le post!');
            }else{
                header('Location: index.php?action=getPosts');
            }
        }else{
            throw new Exception('Donnée.s manquante.s');
        }

    }
    function deletePost($getArray, $sessionArray)
    {
        if ($sessionArray['admin'] == 1){
            //$getId = $this->checkForm($_GET['id']);
            $postManager = new PostManager;
            $affectedLines = $postManager->deletePost($getArray['id']);
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le post!');
            }else{
                header('Location: index.php?action=getPosts');
            }
        }else{
            throw new Exception('Il faut être admin');
        }
    }
    function updatePost($getArray, $postArray, $sessionArray)
    {
        if ($sessionArray['admin'] == 1){
            if (!empty($postArray['id_author']) && !empty($postArray['title']) && !empty($postArray['content']) && !empty($postArray['chapo'])){
                $data = array(
                    'id_author' => $sessionArray['id'],
                    'title' => $postArray['title'],
                    'content'=> $postArray['content'],
                    'chapo' => $postArray['chapo'],
                    'id' => $getArray['id']
                );
                $post = new Post($data);    
                if(empty($post->title())){
                    return $this->writePost($post, 'titre vide');
                }elseif(empty($post->chapo())){
                    return $this->writePost($post, 'chapô vide');
                }elseif(empty($post->content())){
                    return $this->writePost($post, 'contenu vide');
                }elseif (empty($post->id_author())) {
                    return $this->writePost($post, 'auteur.e non sélectionné.e');
                }
                $postManager = new PostManager;
                $postManager->updatePost($post);
                if ($affectedLines === false) {
                    throw new Exception('Impossible de modifier le post!');
                }else{
                    header('Location: index.php?action=getPosts');
                }
            }else{
                throw new Exception('Donnée.s manquante.s'); 
            }
        }else{
            throw new Exception('Il faut être admin');
        }
    }

}