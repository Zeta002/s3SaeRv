<?php

namespace App\src\model\Database;

use PDO;

abstract class RequestSQL
{
    private PDO $dbPDO;

    public function __construct() {
        $db = new DatabaseConnexion();
        $this->dbPDO = $db->getPDO();
    }

    // All these methods are going to be defined in the child class which are going to be tables specific

    /**
     * Fetches all rows from a specified table.
     *
     * @param string $table The name of the table to select from.
     * @return array The result of the selection.
     * @author Angelo P.
     */
    public abstract function getTable(string $table): array;
    //$sql = 'SELECT * FROM ' . $table;
    //return $this->executeSQL($sql);

    /**
     * Fetches all rows from a specified table where a specific column matches a specific value.
     *
     * @param string $table The name of the table to select from.
     * @param string $column The name of the column to match against.
     * @param string $value The value to match in the specified column.
     * @return array The result of the selection.
     * @author Angelo P.
     */
    public abstract function getByColumn(string $table, string $column, string $value): array;
    //$sql = 'SELECT * FROM ' . $table . ' WHERE ' . $column . ' = :' . $column;
    //return $this->executeSQL($sql);

    /**
     * Fetches a row from a specified table by its ID.
     *
     * @param string $table The name of the table to select from.
     * @param int $id The ID of the row to fetch.
     * @return array The result of the selection.
     * @author Angelo P.
     */
    public abstract function getById(string $table, int $id): array;
    //$sql = 'SELECT * FROM ' . $table . ' WHERE id = ' . $id;
    //return $this->executeSQL($sql);

    /**
     * Updates a row in a specified table by its ID.
     *
     * @param string $table The name of the table to update.
     * @param array $data The data to update.
     * @param int $id The ID of the row to update.
     * @author Angelo P.
     */
    public abstract function updateById(string $table, array $data, int $id): void;
    //$super->update($table, $data, 'id = ' . $id);

    /**
     * Deletes a row from a specified table by its ID.
     *
     * @param string $table The name of the table to delete from.
     * @param int $id The ID of the row to delete.
     * @author Angelo P.
     */
    public abstract function deleteById(string $table, int $id): void;
    //$super->delete($table, 'id = ' . $id);

    // Generic methods for all tables

    /**
     * Selects data from a table based on a condition.
     *
     * @param string $table The name of the table to select from.
     * @param array $data The columns to select.
     * @param string $where The condition for the selection.
     * @return array The result of the selection.
     * @author Angelo P.
     */
    public function select(string $table, array $data, string $where): array {
        $sql = 'SELECT ';
        foreach ($data as $value) {
            $sql .= $value . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ' FROM ' . $table . ' WHERE ' . $where;
        return $this->executeSQL($sql);
    }

    /**
     * Updates data in a table based on a condition.
     *
     * @param string $table The name of the table to update.
     * @param array $data The data to update.
     * @param string $where The condition for the update.
     * @author Angelo P.
     */
    public function update(string $table, array $data, string $where): void {
        $sql = 'UPDATE ' . $table . ' SET ';
        foreach ($data as $key => $value) {
            $sql .= $key . ' = :' . $key . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ' WHERE ' . $where;
        $req = $this->dbPDO->prepare($sql);
        foreach ($data as $key => $value) {
            $req->bindValue(':' . $key, $value);
        }
        $req->execute();
    }

    /**
     * Inserts data into a table.
     *
     * @param string $table The name of the table to insert into.
     * @param array $data The data to insert.
     * @author Angelo P.
     */
    public function insert(string $table, array $data): void {
        $sql = 'INSERT INTO ' . $table . ' (';
        foreach ($data as $key => $value) {
            $sql .= $key . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ') VALUES (';
        foreach ($data as $key => $value) {
            $sql .= ':' . $key . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ')';
        $req = $this->dbPDO->prepare($sql);
        foreach ($data as $key => $value) {
            $req->bindValue(':' . $key, $value);
        }
        $req->execute();
    }

    /**
     * Deletes data from a table based on a condition.
     *
     * @param string $table The name of the table to delete from.
     * @param string $where The condition for the deletion.
     * @author Angelo P.
     */
    public function delete(string $table, string $where): void {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        $this->executeSQL($sql);
    }

    /**
     * Counts the total number of rows in a specified table.
     *
     * @param string $table The name of the table to count rows from.
     * @return int The total number of rows in the table.
     * @author Angelo P.
     */
    public function count(string $table): int {
        $sql = 'SELECT COUNT(*) FROM ' . $table;
        $result = $this->executeSQL($sql);
        return $result[0]['COUNT(*)'];
    }

    /**
     * Executes a SQL query and returns the result.
     *
     * @param string $sql The SQL query to execute.
     * @return array The result of the query.
     * @author Angelo P.
     */
    public function executeSQL(string $sql): array {
        $req = $this->dbPDO->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}