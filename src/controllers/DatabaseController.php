<?php

use function PHPSTORM_META\type;

require_once 'src/controllers/AppController.php';
require_once 'Config.php';

class DatabaseController extends AppController{
    private $db;

    /**
     * DatabaseController constructor.
     */
    public function __construct() {
        // Ustaw połączenie z bazą danych (dostosuj do własnych parametrów).
        $this->db = new PDO('pgsql:host='.HOST.';port='.PORT.';dbname='.DBNAME, USERNAME, PASSWORD, ["sslmode" => "prefer"]);
    }
    
    /**
     * @param $sql
     * @param $params
     * 
     * @return PDOStatement
     * 
     * Wykonaj zapytanie SQL z parametrami $params.
     */
    public function execute($sql, $params): PDOStatement {
        // Wykonaj zapytanie SQL z parametrami $params.
        $stmt = $this->db->prepare($sql);
        $stmtStatus = $stmt->execute($params);

        if (!$stmtStatus) {
            $errorInfo = $stmt->errorInfo();
            // Display or log the error information for debugging
            echo "SQL Error | ";
            var_dump($errorInfo);
            echo "<br>Params | ";
            var_dump($params);
            die();
        }
        
        return $stmt;
    }

    /**
     * @return void
     * 
     * Test połączenia z bazą danych.
     */
    public function testConnection(): void {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            echo $user['user_id'] . ' ' . $user['login'] . ' ' . $user['email'] . '<br>';
        }
    }
}