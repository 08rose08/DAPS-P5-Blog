<?php
class Request extends Controller
{
    public $get;
    public $post;
    public $session;

    public function __construct($get, $post, $session)
    {
        
        $this->get = $get;
        
        if(!empty($get['action'])){$this->get['action'] = $this->checkForm($get['action']);}
        if(!empty($get['id'])){$this->get['id'] = $this->checkForm($get['id']);}
        //var_dump($this->get);

        $this->post = $post;
        if(!empty($post['username'])){$this->post['username'] = $this->checkForm($post['username']);}
        if(!empty($post['password'])){$this->post['password'] = $this->checkForm($post['password']);}
        if(!empty($post['password1'])){$this->post['password1'] = $this->checkForm($post['password1']);}
        if(!empty($post['password2'])){$this->post['password2'] = $this->checkForm($post['password2']);}
        if(!empty($post['title'])){$this->post['title'] = $this->checkForm($post['title']);}
        if(!empty($post['chapo'])){$this->post['chapo'] = $this->checkForm($post['chapo']);}
        if(!empty($post['content'])){$this->post['content'] = $this->checkForm($post['content']);}
        if(!empty($post['id_author'])){$this->post['id_author'] = $this->checkForm($post['id_author']);}
        //var_dump($this->post);

        $this->session = $session;
        if(!empty($session['id'])){$this->session['id'] = $this->checkForm($session['id']);}
        if(!empty($session['username'])){$this->session['username'] = $this->checkForm($session['username']);}
        if(!empty($session['admin'])){$this->session['admin'] = $this->checkForm($session['admin']);}
        //var_dump($this->session);
    }

    public function get()
        {
            return $this->get;
        }
    public function post()
    {
        return $this->post;
    }
    public function session()
    {
        return $this->session;
    }

}