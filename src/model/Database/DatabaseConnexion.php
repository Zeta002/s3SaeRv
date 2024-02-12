<?php
namespace App\src\model\Database;

use PDO;
use PDOException;

class DatabaseConnexion
{
    private PDO $pdo;

    private string $host = 'localhost';
    private string $db_name = 'hbznqhgb_saerv';
    private string $username = 'hbznqhgb_root';
    private string $password = 'o!o9okksd9Mo!=M9vM';

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->pdo->exec('set names utf8');
        } catch (PDOException $exception) {
            echo 'Erreur de connexion : ' . $exception->getMessage();
        }
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }
}
