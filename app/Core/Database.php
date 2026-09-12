<?php

if (!class_exists('Database')) {
    class Database {
        private $conn;

        public function getConnection() {
            $this->conn = null;
            $config = require __DIR__ . '/../../config/database.php';

            try {
                // Format DSN PDO untuk MySQL
                $dsn = "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'];
                $this->conn = new PDO($dsn, $config['username'], $config['password']);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->conn->exec("SET NAMES " . $config['charset']);
            } catch (PDOException $exception) {
                echo "Koneksi Database Error: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }
}