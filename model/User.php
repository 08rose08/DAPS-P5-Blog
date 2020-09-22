<?php

class User
{
    private $_id,
            $_username,
            $_password,
            $_admin;

    public function __construct(array $data) //Qd je fais new Post(['title' => $_Post['title']]), va être appelé par addPost() 
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    //getter

    public function id()
    {
        return $this->_id;
    }
    public function username()
    {
        return $this->_username;
    }
    public function password()
    {
        return $this->_password;
    }
    public function admin()
    {
        return $this->_admin;
    }
    

    //setter

    public function setId($id)
    {
        $id = (int) $id; //Pourquoi pas is_int ?
        if ($id > 0)
        {
            $this->_id = $id;
        }
    }
    public function setUsername($username)
    {
        if (is_string($username)){
            $this->_username = $username;
        }
    }
    public function setPassword($password)
    {
        if (is_string($password)) //is_string ??
        {
            $this->_password = $password;
        }
    }
    public function setAdmin($admin)
    {
        $admin = (int) $admin;
        if ($admin > 0)
        {
            $this->_admin = $admin;
        }
    }
}