<?php

namespace App\src\model\Database;

use PDO;

class UnityWebRequest
{
    private PDO $dbPDO;
    private string $maVariable;

    public function __construct(string $maVariable)
    {
        $db = new DatabaseConnexion();
        $this->dbPDO = $db->getPDO();
        $this->maVariable = $_POST['maVariable'];
    }

    public function verify() {
        if (isset($this->maVariable)) {
            // TODO: Add the logic to verify the variable
        }
    }

}