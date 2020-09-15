<?php

class Comment
{
    private $_id,
            $_id_author,
            $_name,
            $_id_post,
            $_content,
            $_creation_date;

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
    public function name()
    {
        return $this->_name;
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
    public function setName($name)
    {
        if (is_string($name)){
            $this->_name = $name;
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
        if (is_string($content)) //is_string ??
        {
            $this->_content = $content;
        }
    }
    public function setCreation_date($creation_date)
    {
        //if () //if quoi ? is_date n'existe pas
        //{
            $this->_creation_date = $creation_date;
        //}
    }
}