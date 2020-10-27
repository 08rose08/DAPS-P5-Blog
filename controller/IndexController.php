<?php

class IndexController
{
    /*function __construct()
    {
        require 'view/indexView.php';
    }*/
    public function showIndex()
    {
        require 'view/indexView.php';
    }

    public function showAdmin()
    {
        $view = new View('showAdmin');
        $view->render();
    }
    public function showLegal()
    {
        $view = new View('legal');
        $view->render();
    }
}