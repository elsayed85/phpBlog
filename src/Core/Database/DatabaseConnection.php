<?php

namespace Blog\Core\Database;

use PDO;
use PDOException;

class DatabaseConnection
{
    private static ?DatabaseConnection $instance = null;
    private PDO $conn;

    private function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection(): void
    {
        $config = $this->loadDatabaseConfig();

        $dsn = $this->generateDSN($config);

        $this->createPDOConnection($dsn, $config['username'], $config['password']);
    }

    private function loadDatabaseConfig(): array
    {
        return require_once(__DIR__ . '/../../config/database.php');
    }

    private function generateDSN(array $config): string
    {
        return "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']}";
    }

    private function createPDOConnection(string $dsn, string $username, string $password): void
    {
        try {
            $this->conn = new PDO($dsn, $username, $password);
        } catch (PDOException $exc) {
            echo 'Connection error: ' . $exc->getMessage();
        }
    }

    public static function getInstance(): DatabaseConnection
    {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }
}
