<?php

abstract class Controller
{

    protected function checkForm($data)
    {
        
            //$data = stripslashes($data);
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = nl2br($data);
            //BBCode ?
            return $data;
        
    } 
}