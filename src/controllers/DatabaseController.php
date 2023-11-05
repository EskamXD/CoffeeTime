<?php

class DatabaseController {
    private $db;

    public function __construct() {
        // Ustaw połączenie z bazą danych (dostosuj do własnych parametrów).
        $this->db = new PDO('pgsql:host=localhost;port=5432;dbname=test_db', 'root', 'root', ["sslmode" => "prefer"]);
    }

    public function getUserByLogin($login) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User(
                $user['id'],
                $user['email'],
                $user['password'],
                $user['login'],
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
            echo $user['id'] . ' ' . $user['login'] . ' ' . $user['email'] . '<br>';
        }
    }
}
