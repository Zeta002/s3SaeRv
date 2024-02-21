<?php

namespace App\src\model\Database;

use PDO;

/**
 * Class dbTest
 *
 * This class is used for testing database operations.
 */
class dbTest {
    /**
     * @var PDO $dbPDO
     * The PDO instance for database operations.
     */
    private PDO $dbPDO;

    /**
     * dbTest constructor.
     *
     * Initializes the PDO instance for database operations.
     */
    public function __construct()
    {
        $db = new DatabaseConnexion();
        $this->dbPDO = $db->getPDO();
    }

    /**
     * Test function.
     *
     * Executes a test query on the 'question' table and returns the result.
     *
     * @return array The result of the query.
     */
    public function test() {
        $sql = 'SELECT * FROM question';
        $stmt = $this->dbPDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}