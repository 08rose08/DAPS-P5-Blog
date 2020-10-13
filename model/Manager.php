<?php

abstract class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=' . HOSTC . ';dbname=' . DBNAMEC . ';charset=utf8', USERNAMEC, PASSWORDC);
        return $db;
    }
}