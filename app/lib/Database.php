<?php 

namespace App\lib;

use PDO;

class Database
{
    private static $instance = null;
    private function __construct()
    {

    }

    public static function connect(): PDO
    {
        if (!static::$instance) {
            static::$instance = new PDO(PDO_DNS, DB_ROOT_USER, DB_ROOT_PASSWORD,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }

        return static::$instance;
    }
}