<?php

class PostController extends Controller
{
    function getPosts()
    {
        $postManager = new PostManager;
        $posts = $postManager->getPosts();

        $userManager = new UserManager;
        $admins = $userManager->getAdmins();

        $view = new View('listPosts');
        $view->render(array('posts' => $posts, 'admins' => $admins));
    }

    function getPostsPage($numPage)
    {   
        if(empty($numPage)) {$numPage = 1;}
        $postManager = new PostManager;
        $nbPosts = $postManager->nbPosts();
        $nbPostsPage = 5;
        $nbPages = ceil($nbPosts / $nbPostsPage);
        $post1 = ($numPage - 1) * $nbPostsPage;
        $posts = $postManager->getPostsPage($post1, $nbPostsPage);
        $userManager = new UserManager;
        $admins = $userManager->getAdmins();

        $view = new View('listPosts');
        $view->render(array('posts' => $posts, 'admins' => $admins, 'nbPages' => $nbPages));
    }  

    function getOnePost($getId, $postUp=null, $messageUp=null)
    {
        if (isset($getId) && $getId > 0){

            $commentManager = new CommentManager;
            $comments = $commentManager->getComments($getId);
            
            $postManager = new PostManager;
            $post = $postManager->getOnePost($getId);
            
            $userManager = new UserManager;
            $admins = $userManager->getAdmins();    

            $postBB = $this->switchBB($post);

            $view = new View('post');
            $view->render(array('post' => $post, 'comments' => $comments, 'admins' => $admins, 'postBB' => $postBB));
        }else{
            throw new Exception('Aucun id de post envoyé');
        }

    }

    function writePost($post=null, $message=null)
    {
        $userManager = new UserManager;
        $admins = $userManager->getAdmins();
        $view = new View('addPost');
        $view->render(array('admins' => $admins));
    }

    function addPost($postArray)
    {
        if (!empty($postArray['id_author']) && !empty($postArray['title']) && !empty($postArray['content']) && !empty($postArray['chapo'])){
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
            $affectedLines = $postManager->addPost($post);
            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter le post!');
            }else{
                if (isset($_FILES['picture']) AND $_FILES['picture']['error'] == 0){
                    if(!$this->pictureIsOk()){
                        return $this->writePost($post, 'image invalide');
                    } 
                }else{
                    header('Location: index.php?action=getPosts');
                }
            }
        }else{
            throw new Exception('Donnée.s manquante.s');
        }

    }

    function deletePost($getArray, $sessionArray)
    {
        if ($sessionArray['admin'] == 1){
            $postManager = new PostManager;
            $post = $postManager->getOnePost($getArray['id']);
            $affectedLines = $postManager->deletePost($getArray['id']);
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le post!');
            }else{
                if(!empty($post->picture())) {
                    unlink($post->picture());
                }
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
                
                $post = new Post($postArray);
                $post->setId($getArray['id']);
                $post->setId_author($sessionArray['id']);
                
                if(empty($post->title())){
                    return $this->getOnePost($post->id(), $post, 'titre vide');
                }elseif(empty($post->chapo())){
                    return $this->getOnePost($post->id(), $post, 'chapô vide');
                }elseif(empty($post->content())){
                    return $this->getOnePost($post->id(), $post, 'contenu vide');
                }elseif (empty($post->id_author())) {
                    return $this->getOnePost($post->id(), $post, 'auteur.e non sélectionné.e');
                }
                $postManager = new PostManager;
                $affectedLines = $postManager->updatePost($post);

                if ($affectedLines === false) {
                    throw new Exception('Impossible de modifier le post!');
                }else{
                    if (isset($_FILES['picture']) AND $_FILES['picture']['error'] == 0){
                        if(!$this->pictureIsOk()){
                            return $this->getOnePost($post, 'image invalide');
                        } 
                    }else{
                        header('Location: index.php?action=getPosts');
                    }
                }
            }else{
                throw new Exception('Donnée.s manquante.s'); 
            }
        }else{
            throw new Exception('Il faut être admin');
        }
    }

    private function pictureIsOk()
    {
        if ($_FILES['picture']['size'] <= 1048576) {
            $infosfichier = pathinfo($_FILES['picture']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'png');

            if (in_array($extension_upload, $extensions_autorisees)) {
                $postManager = new PostManager;
                $posts = $postManager->getPosts();

                $src = 'public/img/uploads/' . basename($posts[0]->id()) . '.' . $infosfichier['extension'];
                move_uploaded_file($_FILES['picture']['tmp_name'], $src);
                
                $affectedLines = $postManager->addPicture($posts[0]->id(), $src);

                if ($affectedLines === false) {
                    throw new Exception('Impossible d\'ajouter l\'image!');
                }else{
                    header('Location: index.php?action=getPosts');
                }
            }
        }else{
            throw new Exception('Impossible d\'ajouter l\'image!');
        }
    }
}