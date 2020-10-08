<?php

global $hostC, $dbnameC, $usernameC, $passwordC;

abstract class Manager
{
    protected function dbConnect()
    {
        //$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
        global $hostC, $dbnameC, $usernameC, $passwordC;

        $db = new PDO('mysql:host=' . $hostC . ';dbname=' . $dbnameC . ';charset=utf8', $usernameC, $passwordC);
        return $db;
    }
}