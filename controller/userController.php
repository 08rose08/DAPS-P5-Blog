<?php

require_once 'model/UserManager.php';

class UserController
{
    public function showForm()
    {
        require 'view/signupView.php';
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
}