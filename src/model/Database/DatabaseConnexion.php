<?php

namespace App\src\model\Database;

use PDO;
use PDOException;

/**
 * Class DatabaseConnexion
 *
 * This class is used for establishing a connection to the database.
 */
class DatabaseConnexion
{
    /**
     * @var PDO $pdo
     * The PDO instance for database operations.
     */
    private PDO $pdo;

    /**
     * @var string $host
     * The hostname of the database server.
     */
    private string $host = 'localhost';

    /**
     * @var string $db_name
     * The name of the database.
     */
    private string $db_name = 'hbznqhgb_saerv';

    /**
     * @var string $username
     * The username for the database connection.
     */
    private string $username = 'hbznqhgb_root';

    /**
     * @var string $password
     * The password for the database connection.
     */
    private string $password = 'o!o9okksd9Mo!=M9vM';

    /**
     * DatabaseConnexion constructor.
     *
     * Initializes the PDO instance for database operations.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Connects to the database.
     *
     * Establishes a PDO connection to the database using the provided host, database name, username, and password.
     */
    private function connect(): void {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->pdo->exec('set names utf8');
        } catch (PDOException $exception) {
            echo 'Connection error: ' . $exception->getMessage();
        }
    }

    /**
     * Gets the PDO instance.
     *
     * @return PDO The PDO instance for database operations.
     */
    public function getPDO(): PDO
    {
        return $this->pdo;
    }
}