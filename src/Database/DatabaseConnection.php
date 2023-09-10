<?php
namespace Blog\Database;

use PDO;
use PDOException;

class DatabaseConnection {
    private static ?DatabaseConnection $instance = null;
    private PDO $conn;

    private function __construct()
    {
        $config = require_once(__DIR__ . '/../config/database.php');

        $host = $config['host'];
        $port = $config['port'];
        $db = $config['database'];
        $user = $config['username'];
        $pass = $config['password'];

        try {
            $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
        } catch (PDOException $exc) {
            echo 'Connection error: ' . $exc->getMessage();
        }
    }

    public static function getInstance() : DatabaseConnection
    {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() : PDO
    {
        return $this->conn;
    }
}