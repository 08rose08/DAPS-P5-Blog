<?php

require_once 'model/UserManager.php';
require_once 'model/User.php';
require_once 'view/View.php';

class UserController
{
    public function showFormSignup()
    {
        $view = new View('signup');
        $view->render();
        //require 'view/signupView.php';
    }
    public function showFormLogin()
    {
        $view = new View('login');
        $view->render();

        //require 'view/loginView.php';
    }

    public function signup()
    {
        if (isset($_POST['username']) &&  isset($_POST['password1']) && isset($_POST['password2'])){
            if ($_POST['password1'] != $_POST['password2']){
                throw new Exception('Not the same password');
            }else{
                $userManager = new UserManager;
                $affectedLines = $userManager->signup();

                if ($affectedLines === false) {
                    throw new Exception('Impossible d\'ajouter l\'utilisateur');
                }else{
                    header('Location: index.php?action=showLogin');
                }
            }
        }else{
            throw new Exception('Données manquantes');

        }
    }

    public function login()
    {
        if(isset($_POST['username']) && isset($_POST['password'])){
            $userManager = new UserManager;
            $user = $userManager->login();
            

            $isPasswordCorrect = password_verify($_POST['password'], $user->pass());

            if (!$user) {
                throw new Exception('Mauvais identifiant ou mot de passe !');

            }else{
                if ($isPasswordCorrect) {
                    session_start();

                    // Création des variables de session
                    $_SESSION['id'] = $user->id();
                    $_SESSION['username'] = $user->username();
                    $_SESSION['admin'] = $user->admin();
                    var_dump($_SESSION);

                    header('Location: index.php?action=getPosts');
                    
                }else{
                    throw new Exception('Mauvais identifiant ou mot de passe !');
                }
            }        
        }
    }

    public function logout(){
        session_start();

        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        header('Location: index.php');
    }
}