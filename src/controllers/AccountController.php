<?php

session_start();

require_once 'src/controllers/AppController.php';
require_once 'src/controllers/PhotoController.php';
require_once 'src/repositories/UserRepo.php'; // Dodaj nowy plik dla UserRepo, gdzie zdefiniowana jest klasa UserRepo

class AccountController extends AppController {
    public function createAccount() {
        $userRepo = new UserRepo();
        $userRepo->createUser($_POST['email'], $_POST['user'], $_POST['password'], $_POST['name'], $_POST['surname']);
    }

    public function updateAccount() {
        if ($this->isPost()) {
            // Jeśli przekazano plik, dodaj go do zdjęć
            if (isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['name'] != '') {
                if ($_FILES['profilePhoto']['error'] == 0) {
                    $photo = new PhotoController();
                    $photo->addPhoto($_FILES['profilePhoto']);
                }
                else {
                    echo 'Wystąpił błąd podczas przesyłania zdjęcia <br>';
                    var_dump($_FILES['profilePhoto']['error']);
                    die();
                }
            }

            // Pobierz istniejące dane użytkownika z sesji
            $user = $_SESSION['user'];
            $name = $_SESSION['name'];
            $surname = $_SESSION['surname'];
            $email = $_SESSION['email'];            
            
            // Aktualizuj dane użytkownika, jeśli zostaną przekazane przez formularz
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = $_POST['name'];
            }
            
            if (isset($_POST['surname']) && !empty($_POST['surname'])) {
                $surname = $_POST['surname'];
            }

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = $_POST['email'];
            }
            
            // Aktualizuj dane użytkownika w bazie danych za pomocą UserRepo
            $userRepo = new UserRepo();
            $userRepo->updateUser($_SESSION['user_id'], $email, $name, $surname);

            // Aktualizuj dane w sesji
            $_SESSION['user'] = $user;
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;

            // Przekieruj lub wykonaj inne akcje
            $this->render('settings');
        }
    }
}
