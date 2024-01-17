<?php

require_once 'src/repositories/Repo.php';
require_once 'src/models/User.php';

class UserRepo extends Repo
{
    public function createUser($email, $username, $password, $name, $surname, $room_number, $user_role = "user", $user_blocked = 0)
    {
        $sql = "INSERT INTO users (email, login, password, name, surname, room_number, user_role, user_blocked) VALUES (:email, :username, :password, :name, :surname, :room_number, :user_role, :user_blocked)";
        $params = array(
            ':email' => $email,
            ':username' => $username,
            ':password' => $password,
            ':name' => $name,
            ':surname' => $surname,
            ':room_number' => $room_number,
            ':user_role' => $user_role,
            ':user_blocked' => $user_blocked,
        );

        $this->databaseController->execute($sql, $params);
    }

    public function updateUser($userId, $newEmail, $newName, $newSurname)
    {
        $sql = "UPDATE users SET email = :newEmail, name = :newName, surname = :newSurname WHERE user_id = :userId";

        $params = array(
            ':newEmail' => $newEmail,
            ':newName' => $newName,
            ':newSurname' => $newSurname,
            ':userId' => $userId
        );

        $this->databaseController->execute($sql, $params);
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM photos WHERE user_id = :userId";
        $params = array(':userId' => $userId);

        $this->databaseController->execute($sql, $params);

        $sql = "DELETE FROM users WHERE user_id = :userId AND user_role != 'admin'";
        $params = array(':userId' => $userId);

        $this->databaseController->execute($sql, $params);
    }

    public function blockUser($userId)
    {
        $sql = "UPDATE users SET user_blocked = true WHERE user_id = :userId";
        $params = array(':userId' => $userId);

        $this->databaseController->execute($sql, $params);
    }

    public function unblockUser($userId)
    {
        $sql = "UPDATE users SET user_blocked = false WHERE user_id = :userId";
        $params = array(':userId' => $userId);

        $this->databaseController->execute($sql, $params);
    }

    public function getUser($userId)
    {
        $sql = "SELECT * FROM users WHERE user_id = :userId";
        $params = array(':userId' => $userId);

        $stmt = $this->databaseController->execute($sql, $params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User(
                $user['user_id'],
                $user['email'],
                $user['login'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['room_number'],
                $user['user_role'],
                $user['user_blocked']
            );
        }

        return null;
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM public."userReservationsMeetings"';
        $stmt = $this->databaseController->execute($sql, null);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usersArray = array();

        foreach ($users as $user) {
            $usersAssosiationArray = array();
            $usersAssosiationArray['user_id'] = $user['user_id'];
            $usersAssosiationArray['email'] = $user['email'];
            $usersAssosiationArray['login'] = $user['login'];
            $usersAssosiationArray['password'] = $user['password'];
            $usersAssosiationArray['name'] = $user['name'];
            $usersAssosiationArray['surname'] = $user['surname'];
            $usersAssosiationArray['room_number'] = $user['room_number'];
            $usersAssosiationArray['user_role'] = $user['user_role'];
            $usersAssosiationArray['user_blocked'] = $user['user_blocked'];
            $usersAssosiationArray['reservations_count'] = $user['reservations_count'];
            $usersAssosiationArray['meetings_count'] = $user['meetings_count'];

            array_push($usersArray, $usersAssosiationArray);
        }

        return $usersArray;
    }

    public function getUserByLogin($login)
    {
        $sql = "SELECT * FROM users WHERE login = :login";
        $params = array(':login' => $login);

        $stmt = $this->databaseController->execute($sql, $params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User(
                $user['user_id'],
                $user['email'],
                $user['login'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['room_number'],
                $user['user_role'],
                $user['user_blocked']
            );
        }

        return null;
    }
}
