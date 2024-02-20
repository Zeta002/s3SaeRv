<?php

namespace App\src\model\Database;

use PDO;

class UnityWebRequest
{
    private PDO $dbPDO;
    private string $ResultaField;

    public function __construct(string $maVariable)
    {
        $db = new DatabaseConnexion();
        $this->dbPDO = $db->getPDO();
        $this->ResultaField = $_POST['ResultaField'];
    }

    public function verify() {
        if (isset($this->ResultaField)) {
            return true;
            // TODO: Add the logic to verify the variable
        } else
            return false;
    }
}