<?php

class Post
{
    private $_id,
            $_id_author,
            $_username,
            $_title,
            $_content,
            $_last_update_date,
            $_chapo;

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
    public function id_author()
    {
        return $this->_id_author;
    }
    public function username()
    {
        return $this->_username;
    }
    public function title()
    {
        return $this->_title;
    }
    public function content()
    {
        return $this->_content;
    }
    public function last_update_date()
    {
        return $this->_last_update_date;
    }
    public function chapo()
    {
        return $this->_chapo;
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
    public function setTitle($title)
    {
        if (is_string($title))
        {
            $this->_title = $title;
        }
    }
    public function setContent($content)
    {
        if (is_string($content)) //is_string ??
        {
            $this->_content = $content;
        }
    }
    public function setLast_update_date($last_update_date)
    {
        //if () //if quoi ? is_date n'existe pas
        //{
            $this->_last_update_date = $last_update_date;
        //}
    }
    public function setChapo($chapo)
    {
        if (is_string ($chapo))
        {
            $this->_chapo = $chapo;
        }
    }
}