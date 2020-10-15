<?php

abstract class Manager
{
    protected function dbConnect()
    {
        try {
            $getdb = new PDO('mysql:host=' . HOSTC . ';dbname=' . DBNAMEC . ';charset=utf8', USERNAMEC, PASSWORDC);
            return $getdb;
        } 
        catch (Exception $e)
        {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
        
    }
}