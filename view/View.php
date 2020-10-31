<?php

class View
{
    private $file;
    private $title;
    private $page;

    public function __construct($thing){
        $this->file ='view/' . $thing . 'View.php';
    }

    function render($data=null)
    {
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('view/template.php', array('title' => $this->title, 'page' => $this->page, 'content' => $content));
        echo $view;
    }

    private function renderFile($file, $data)
    {
        if (file_exists($file)){
            if(is_array($data)){
                extract($data);
            }
            ob_start();
            require $file;
            return ob_get_clean();
        }else{
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}