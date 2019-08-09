<?php


class Connection
{
    private static $instance;

    private function __construct(){}

    public static function get(){

        if(self::$instance !== null) {
            return self::$instance;
        }

        try{
            self::$instance = new PDO("mysql:host=" . DB['host'] . ";dbname=" . DB['database'], DB['username'], DB['password']);
        }catch(PDOException $exception){
            die ("Connection error: " . $exception->getMessage());
        }

        return self::$instance;
    }
}