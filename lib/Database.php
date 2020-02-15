<?php

include('Config.php');

class Database{

    private static $pdo;
    
    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    public static function connection() {

        if(!self::$pdo) {
            try{
                self::$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, self::$options);
            }catch(PDOException $e) {
                die('something wrong happend'.$e->getMessage());
            }
        }

        return self::$pdo;
        
    }

    public static function prepare($sql) {
        return self::connection()->prepare($sql);
    }
    
}



?>