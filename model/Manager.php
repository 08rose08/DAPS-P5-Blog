<?php

abstract class Manager
{
    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=' . HOSTC . ';dbname=' . DBNAMEC . ';charset=utf8', USERNAMEC, PASSWORDC);
            return $db;
        } 
        catch (Exception $e)
        {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
        
    }
}