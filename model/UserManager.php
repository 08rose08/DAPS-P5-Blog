<?php

//require_once 'Manager.php';
//require_once 'User.php';

class UserManager extends Manager
{
    public function signup()
    {
        if ($this->alreadyExist()){
            throw new Exception('Username already exists');

        }else{
            $passHash = password_hash($_POST['password1'], PASSWORD_DEFAULT);
            $data = array(
                'username' => $_POST['username'],
                'password'=> $passHash,
            );
            $user = new User($data);

            $db = $this->dbConnect();
            $addUser = $db->prepare('INSERT INTO user VALUES (NULL, :username, :pass, 0)');
            $addUser->bindValue(':username', $user->username());
            $addUser->bindValue(':pass', $user->password());

            $affectedLines = $addUser->execute();

            return $affectedLines;

        }
    }

    public function alreadyExist()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT username FROM user WHERE username = ?');
        $req->execute(array($_POST['username']));
        
        if($req->rowCount() > 0) {
            return true;
        }else{
            return false;

        }

    }
    public function login()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE username = ?');
        $req->execute(array($_POST['username']));
        $data = $req->fetch();
        
        $user = new User($data);

        return $user;

        
    }
}