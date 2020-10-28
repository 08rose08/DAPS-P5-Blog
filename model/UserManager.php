<?php

//require_once 'Manager.php';
//require_once 'User.php';

class UserManager extends Manager
{
    public function signup($username, $password)
    {
        if ($this->alreadyExists($username)){
            throw new Exception('Username already exists');

        }else{
            $passHash = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                'username' => $username,
                'pass'=> $passHash,
            );
            $user = new User($data);

            $getdb = $this->dbConnect();
            $addUser = $getdb->prepare('INSERT INTO user VALUES (NULL, :username, :pass, 0)');
            $addUser->bindValue(':username', $user->username());
            $addUser->bindValue(':pass', $user->pass());

            $affectedLines = $addUser->execute();

            return $affectedLines;

        }
    }

    public function alreadyExists($username)
    {
        $getdb = $this->dbConnect();
        $req = $getdb->prepare('SELECT username FROM user WHERE username = ?');
        $req->execute(array($username));
        
        if($req->rowCount() > 0) {
            return true;
        }else{
            return false;

        }

    }
    public function login($username)
    {   
        if ($this->alreadyExists($username)){
            $getdb = $this->dbConnect();
            $req = $getdb->prepare('SELECT * FROM user WHERE username = ?');
            $req->execute(array($username));
            $data = $req->fetch();
            //if $data est ok tableau
            $user = new User($data);
            
            return $user;
            
        }else{
            throw new Exception('Mauvais identifiant ou mot de passe !');
        }
        
    }

    public function getAdmins()
    {   
        $admins = [];
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, username FROM user WHERE user.admin = 1');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $admins[] = new User($data);
        }

        return $admins;
    }
}