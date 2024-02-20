<?php

namespace App\src\model\Database;

use PDO;


class dbTest {
    private PDO $dbPDO;

    public function __construct()
    {
        $db = new DatabaseConnexion();
        $this->dbPDO = $db->getPDO();
    }

    public function test() {
        $sql = 'SELECT * FROM question';
        $stmt = $this->dbPDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}