<?php

require_once 'model/UserManager.php';
require_once 'model/User.php';

class UserController
{
    public function showFormSignup()
    {
        require 'view/signupView.php';
    }
    public function showFormLogin()
    {
        require 'view/loginView.php';
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
            throw new Exception('Incomplete form');

        }
    }
    public function login ()
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
                    $_SESSION['id'] = $user->id();
                    $_SESSION['username'] = $user->username();
                    $_SESSION['admin'] = $user->admin();
                    
                    header('Location: index.php?action=getPosts');
                    
                }else{
                    throw new Exception('Mauvais identifiant ou mot de passe !');
                }
            }        
        }
    }
}