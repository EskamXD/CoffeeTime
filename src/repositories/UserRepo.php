<?php

require_once 'src/repositories/Repo.php';
require_once 'src/models/User.php';

class UserRepo extends Repo {
    public function createUser($email, $username, $password, $name, $surname, $room_number) {
        $sql = "INSERT INTO users (email, login, password, name, surname, room_number) VALUES (:email, :username, :password, :name, :surname, :room_number)";
        $params = array(
            ':email' => $email,
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':name' => $name,
            ':surname' => $surname,
            ':room_number' => $room_number
        );

        $this->databaseController->execute($sql, $params);
    }

    public function updateUser($userId, $newEmail, $newName, $newSurname) {
        $sql = "UPDATE users SET email = :newEmail, name = :newName, surname = :newSurname WHERE user_id = :userId";

        $params = array(
            ':newEmail' => $newEmail,
            ':newName' => $newName,
            ':newSurname' => $newSurname,
            ':userId' => $userId
        );

        $this->databaseController->execute($sql, $params);
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE userid = :userid";
        $params = array(':userid' => $userId);

        $this->databaseController->execute($sql, $params);
    }

    public function getUser($userId) {
        $sql = "SELECT * FROM users WHERE user_id = :userId";
        $params = array(':userId' => $userId);

        $stmt = $this->databaseController->execute($sql, $params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            return new User(
                $user['user_id'],
                $user['email'],
                $user['login'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['room_number']
            );
        }

        return null;
    }

    public function getUserByLogin($login) {
        $sql = "SELECT * FROM users WHERE login = :login";
        $params = array(':login' => $login);

        $stmt = $this->databaseController->execute($sql, $params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            return new User(
                $user['user_id'],
                $user['email'],
                $user['login'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['room_number']
            );
        }

        return null;
    }
}
