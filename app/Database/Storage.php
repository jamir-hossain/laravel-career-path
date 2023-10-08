<?php

namespace App\Database;

use PDO;
use PDOException;

// Singleton pattern implementation for the DB class
class Storage
{
    public ?PDO $connect = null;
    private static string $hostName = 'localhost';
    private static string $databaseName = 'banking';
    private static string $userName = 'root';
    private static string $password = '';

    function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=" . self::$hostName . ";dbname=" . self::$databaseName . "", self::$userName, self::$password);

            // set the PDO error mode to exception
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . PHP_EOL;
        }
    }

    public function createTable(string $sql)
    {
        try {
            $this->connect->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function payload(string $sql)
    {
        try {
            $this->connect->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function prepare(string $sql)
    {
        try {
            return $this->connect->prepare($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->connect = null;
    }
}
