<?php

namespace App\Core;

// Import PDO and PDOException
use PDO;
use PDOException;

class Db extends PDO
{

    // Unique instance of this class
    private static $instance;

    private function __construct()
    {
        if ($_SERVER["SERVER_NAME"] !== "quai-antique.local") {
            $host = "ecfquaaadmin.mysql.db";
            $user = "ecfquaaadmin";
            $dbname = "ecfquaaadmin";
            $pass = "A1Z2E3R4T5Y6U7I8O9P0a";
        } else {
            $host = "localhost";
            $user = "root";
            $pass = "";
            $dbname = "quai-antique";
        }

        // Set DSN informations
        $_dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8mb4';

        // Call constructor of parent "PDO"
        try {
            parent::__construct($_dsn, $user, $pass);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
