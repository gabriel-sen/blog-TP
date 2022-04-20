<?php

abstract class Model{
    private static $pdo;

    private static function setbdd(){
        self::$pdo = new PDO('mysql:host=localhost;dbname=blog_tp_opcr;charset=utf8', 'root', '');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    protected function getBdd(){
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }
}