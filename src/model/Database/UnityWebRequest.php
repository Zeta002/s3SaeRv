<?php

namespace App\src\model\Database;

use PDO;

/**
 * UnityWebRequest class to handle Unity web requests.
 */
class UnityWebRequest
{
    private PDO $dbPDO;
    private string $ResultaField;

    /**
     * UnityWebRequest class constructor.
     *
     * @param string $maVariable A variable to be used in the class.
     */
    public function __construct(string $maVariable)
    {
        $db = new DatabaseConnexion();
        $this->dbPDO = $db->getPDO();
        $this->ResultaField = $_POST['ResultaField'];
    }

    /**
     * Checks if the ResultaField field is set.
     *
     * @return bool Returns true if the ResultaField field is set, false otherwise.
     */
    public function verify() {
        if (isset($this->ResultaField)) {
            return true;
            // TODO: Add the logic to verify the variable
        } else
            return false;
    }
}