<?php

namespace App\Core;

// Import PDO and PDOException
use PDO;
use PDOException;

class Db extends PDO
{

    // Unique instance of this class
    private static $instance;

    private const DBHOST = 'ecfquaaadmin.mysql.db';
    private const DBUSER = 'ecfquaaadmin';
    private const DBPASS = 'A1Z2E3R4T5Y6U7I8O9P0a';
    private const DBNAME = 'ecfquaaadmin';

    private function __construct()
    {

        // Set DSN informations
        $_dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . ';charset=utf8mb4';

        // Call constructor of parent "PDO"
        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
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
