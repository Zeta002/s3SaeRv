<?php

    namespace App\src\Database;

    use PDO;
    use PDOException;

    /**
     * Singleton class responsible for managing the database connection.
     */
    class DatabaseConnexion
    {
        private static ?DatabaseConnexion $instance = null;
        private ?PDO $conn = null;

        private string $host = 'mysql-saes3.go.yj.fr';
        private string $db_name = 'hbznqhgb_saerv';
        private string $username = 'hbznqhgb_root';
        private string $password = '0TTNTzB0G&XT?NN0TB';

        /**
         * Private constructor to establish the database connection.
         * Ensures that the connection is established only once (Singleton Pattern).
         */
        private function __construct()
        {
            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->exec('set names utf8');
            } catch (PDOException $exception) {
                echo 'Connection Error: ' . $exception->getMessage();
            }
        }

        /**
         * Gets the singleton instance of the DatabaseConnexion class.
         *
         * @return DatabaseConnexion|null The instance of the DatabaseConnexion class.
         */
        public static function getInstance(): ?DatabaseConnexion
        {
            if (self::$instance == null) {
                self::$instance = new DatabaseConnexion();
            }
            return self::$instance;
        }

        /**
         * Gets the PDO database connection object.
         *
         * @return PDO The PDO database connection object.
         * @throws PDOException if the connection is not successfully established.
         */
        public function getConnection(): PDO
        {
            if ($this->conn === null) {
                throw new PDOException('Connection not established.');
            }

            return $this->conn;
        }
    }
