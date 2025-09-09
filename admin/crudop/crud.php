<?php
include_once 'dbconfig.php';

/**
 * Class Crud
 *
 * Provides methods for interacting with the database.
 */
class Crud extends DbConfig {
    /**
     * Constructor
     *
     * Initializes the database connection.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Retrieve data based on a query.
     *
     * @param string $query The SQL query to execute.
     * @param string $types The types of parameters in the query (optional).
     * @param array $params The parameters for the query (optional).
     * @return array The fetched data.
     */
    public function getData($query, $types = "", $params = []) {        
        return $this->execute_query($query, $types, $params);
    }
    
    /**
     * Execute a query (non-SELECT).
     *
     * @param string $query The SQL query to execute.
     * @param string $types The types of parameters in the query (optional).
     * @param array $params The parameters for the query (optional).
     * @return bool True on success, false on failure.
     */
    public function execute($query, $types = "", $params = []) {
        return $this->execute_query($query, $types, $params);
    }

    /**
     * Insert a record and return the last inserted ID.
     *
     * @param string $query The SQL query to execute.
     * @param string $types The types of parameters in the query (optional).
     * @param array $params The parameters for the query (optional).
     * @return int The last inserted ID, or 0 on failure.
     */
    public function insertLastId($query, $types = "", $params = []) {
        if ($this->execute_query($query, $types, $params)) {
            return $this->connection->insert_id;
        }
        return 0;
    }
    
    /**
     * Delete a record by ID.
     *
     * @param int $id The ID of the record to delete.
     * @param string $table The name of the table.
     * @return bool True on success, false on failure.
     */
    public function delete($id, $table) { 
        $query = "DELETE FROM $table WHERE id = ?";
        return $this->execute_query($query, 'i', [$id]);
    }

    /**
     * Escape a string for use in a query.
     *
     * @param string $value The string to escape.
     * @return string The escaped string.
     */
    public function escape_string($value) {
        return $this->connection->real_escape_string($value);
    }

    /**
     * Execute a query with optional parameter binding.
     *
     * @param string $query The SQL query to execute.
     * @param string $types The types of parameters in the query (optional).
     * @param array $params The parameters for the query (optional).
     * @return mixed The result of the query execution.
     */
    private function execute_query($query, $types = "", $params = []) {
        // Debugging: Print query and parameters
        
        // echo "Executing query: " . $query . "<br>";
        // if (!empty($params)) {
        //     echo "With parameters: " . implode(", ", $params) . "<br>";
        //     echo "Parameter types: " . $types . "<br>";
        // }
        // exit;
        
        // Prepare the statement
        $stmt = $this->connection->prepare($query);
        if ($stmt === false) {
            return false;
        }
        
        // Bind parameters if any
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        
        // Execute the statement
        $result = $stmt->execute();
        
        // Check for errors
        if ($result === false) {
            return false;
        }
        
        // For SELECT queries, fetch results
        if (stripos(trim($query), 'SELECT') === 0) {
            $result = $stmt->get_result();
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        
        return true;
    }
}
?>
