<?php

use function PHPSTORM_META\type;

require_once 'src/controllers/AppController.php';
require_once 'Config.php';

class DatabaseController extends AppController{
    private $db;

    public function __construct() {
        // Ustaw połączenie z bazą danych (dostosuj do własnych parametrów).
        $this->db = new PDO('pgsql:host='.HOST.';port='.PORT.';dbname='.DBNAME, USERNAME, PASSWORD, ["sslmode" => "prefer"]);
    }
    
    public function execute($sql, $params) {
        // Wykonaj zapytanie SQL z parametrami $params.
        $stmt = $this->db->prepare($sql);
        $stmtStatus = $stmt->execute($params);

        if (!$stmtStatus) {
            $errorInfo = $stmt->errorInfo();
            // Display or log the error information for debugging
            echo "SQL Error | ";
            var_dump($errorInfo[2]);
            die();
        }
        
        // echo 'Execute | ';
        // var_dump($stmt, $stmtStatus);
        // die();
        
        return $stmt;
    }
    
    public function getUserByLogin($login) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // echo 'getUserByLogin | ';
        // var_dump((int)$user['userId'],  gettype($user['userId']));
        // die();

        if ($user) {
            return new User(
                $user['userid'],
                $user['email'],
                $user['login'],
                $user['password'],
                $user['name'],
                $user['surname']
            );
        }

        return null;
    }

    public function testConnection() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            echo $user['userid'] . ' ' . $user['login'] . ' ' . $user['email'] . '<br>';
        }
    }
}