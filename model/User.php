<?php

class User
{
    private $_id,
            $_username,
            $_pass,
            $_admin;

    public function __construct(array $data)
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
    public function pass()
    {
        return $this->_pass;
    }
    public function admin()
    {
        return $this->_admin;
    }
    

    //setter

    public function setId($id)
    {
        $id = (int) $id;
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
    public function setPass($pass)
    {
        if (is_string($pass)) 
        {
            $this->_pass = $pass;
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