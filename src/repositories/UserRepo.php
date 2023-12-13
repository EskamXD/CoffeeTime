<?php

require_once 'src/repositories/Repo.php';

class UserRepo extends Repo {
    public function createUser($email, $username, $password, $name, $surname) {
        // Przyjmujemy, że użytkownik jest reprezentowany w tabeli 'users' z kolumnami 'username', 'email' i 'password'.
        $sql = "INSERT INTO users (email, login, password, name, surname) VALUES (:email, :username, :password, :name, :surname)";
        $params = array(
            ':email' => $email,
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_DEFAULT),  // Haszowanie hasła
            ':name' => $name,
            ':surname' => $surname
        );

        $this->db->execute($sql, $params);
    }

    public function updateUser($userId, $newEmail, $newName, $newSurname) {
        // Aktualizacja danych użytkownika o określonym $userId.
        $sql = "UPDATE users SET email = :newEmail, name = :newName, surname = :newSurname WHERE user_id = :userId";

        $params = array(
            ':newEmail' => $newEmail,
            ':newName' => $newName,
            ':newSurname' => $newSurname,
            ':userId' => $userId
        );

        // echo 'updateUser | ';
        // var_dump($sql, $params);

        $this->db->execute($sql, $params);
    }

    public function deleteUser($userId) {
        // Usunięcie użytkownika o określonym $userId.
        $sql = "DELETE FROM users WHERE userid = :userid";
        $params = array(':userid' => $userId);

        $this->db->execute($sql, $params);
    }
}
