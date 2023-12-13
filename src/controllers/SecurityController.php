<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once 'DatabaseController.php';
require_once 'PhotoController.php';

class SecurityController extends AppController {
    private $databaseController;
    private $photoController;
    private $photoPath = 'public/uploads/';

    public function __construct() {
        parent::__construct();
        $this->databaseController = new DatabaseController();
        $this->photoController = new PhotoController();

        // var_dump($this->databaseController);
        // die();
    }

    public function login() {
        // $user = new User(1, 'ktos@cos.pl', '1234', 'admin', 'Janusz', 'Promocja');

        if (!$this->isPost()) {
            return $this->render('loginPage', ['messages' => ['Błąd logowania!']]);
        }

        $login = $_POST['login-input'];
        $password = $_POST['password-input'];

        // Pobierz użytkownika z bazy danych przy użyciu DatabaseController.
        $user = $this->getUserByLogin($login);

        if (!$user) {
            $this->render('loginPage', ['messages' => ['Nieprawidłowy login!']]);
            return;
        }
        
        // Sprawdź, czy hasło pasuje do hasła w bazie danych.
        if ($password !== $user->getPassword()) {
            $this->render('loginPage', ['messages' => ['Nieprawidłowe hasło!']]);
            return;
        }

        // Udało się zalogować, ustaw sesję z danymi użytkownika.
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user'] = $user->getLogin();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['name'] = $user->getName();
        $_SESSION['surname'] = $user->getSurname();

        $photo = $this->photoController->getPhotoByUserId($this->databaseController, $user->getId());
        if($photo) {
            $_SESSION['profilePhoto'] = $this->photoPath.$photo->getPhotoName();
        } else {
            $_SESSION['profilePhoto'] = $this->photoPath.'default.png';
        }

        return $this->render('home', ['messages' => ['Witaj '.$user->getName().'!</br>', 'Umów się!']]);
    }

    public function logout() {
        session_unset();
        session_destroy();

        $this->render('home', ['messages' => ['Wylogowano!']]);
    }

    public function register() {
        if (!$this->isPost()) {
            return $this->render('register', ['messages' => ['Błąd logowania!']]);
        }

        $login = $_POST['register-login'];
        $password = $_POST['register-password'];
        $passwordCheck = $_POST['register-password-check'];
        $email = $_POST['register-email'];
        $name = $_POST['register-name'];
        $surname = $_POST['register-surname'];
        $birthday = $_POST['register-birthday'];
        $room = $_POST['register-room'];

        // var_dump($login, $password, $passwordCheck, $email, $name, $surname, $birthday, $room);
        // die();
    }

    private function getUserByLogin($login) {
        $stmt = $this->databaseController->execute("SELECT * FROM users WHERE login = :login", [':login' => $login]);
        $stmtStatus = $stmt->execute();

        if (!$stmtStatus) {
            $errorInfo = $stmt->errorInfo();
            // Display or log the error information for debugging
            echo "SQL Error | ";
            var_dump($errorInfo[2]);
            die();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // $stmt = $this->databaseController->db->prepare("SELECT * FROM users WHERE login = :login");
        // $stmt->bindParam(':login', $login);
        // $stmt->execute();
        // $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // echo 'getUserByLogin | ';
        // var_dump((int)$user['user_id'],  gettype($user['user_id']));
        // die();

        if ($user) {
            return new User(
                $user['user_id'],
                $user['email'],
                $user['login'],
                $user['password'],
                $user['name'],
                $user['surname']
            );
        }

        return null;
    }
}
