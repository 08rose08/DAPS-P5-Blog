<?php

class Comment
{
    private $_id,
            $_id_author,
            $_username,
            $_id_post,
            $_content,
            $_creation_date;

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
    public function id_author()
    {
        return $this->_id_author;
    }
    public function username()
    {
        return $this->_username;
    }
    public function id_post()
    {
        return $this->_id_post;
    }
    public function content()
    {
        return $this->_content;
    }
    public function creation_date()
    {
        return $this->_creation_date;
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
    public function setId_author($id_author)
    {
        $id_author = (int) $id_author;
        if ($id_author > 0)
        {
            $this->_id_author = $id_author;
        }
    }
    public function setUsername($username)
    {
        if (is_string($username)){
            $this->_username = $username;
        }
    }
    public function setId_post($id_post)
    {
        $id_post = (int) $id_post;
        if ($id_post > 0)
        {
            $this->_id_post = $id_post;
        }
    }
    public function setContent($content)
    {
        if (is_string($content)) 
        {
            $this->_content = $content;
        }
    }
    public function setCreation_date($creation_date)
    {
        $this->_creation_date = $creation_date;
    }
}