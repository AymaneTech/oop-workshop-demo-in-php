<?php

namespace App\Core;

use PDO;
use Exception;
use PDOException;
use const Src\Config\{DB_NAME, DB_HOST, DB_CHARSET, DB_USER, DB_PASSWORD};

class Database
{
    private static ?Database $instance = null;
    private PDO $connection;

    private function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        try {
            $this->connection = new PDO($dsn, DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance == null)
            self::$instance = new Database();

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}