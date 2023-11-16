<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once 'DatabaseController.php';

class SecurityController extends AppController {
    private $databaseController;

    public function __construct() {
        parent::__construct();
        $this->databaseController = new DatabaseController();
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
        $user = $this->databaseController->getUserByLogin($login);

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
}
