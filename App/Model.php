<?php
namespace Gray\Test;

use Gray\Test\Config;
use PDO;
use PDOException;

abstract class Model{
    protected static function getDB(){
        static $db = null;
        if ($db === null) {
            try{
                $dsn = 'mysql:host=' . Config::HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
                $db = new PDO($dsn, Config::USER, Config::PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e){
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return $db;
    }
}