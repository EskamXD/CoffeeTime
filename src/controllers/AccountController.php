<?php

// session_start();

require_once 'src/controllers/AppController.php';
require_once 'src/controllers/PhotoController.php';
require_once 'src/controllers/MatchController.php';
require_once 'src/repositories/BookRepo.php';
require_once 'src/repositories/UserRepo.php'; // Dodaj nowy plik dla UserRepo, gdzie zdefiniowana jest klasa UserRepo

class AccountController extends AppController {
    const PHOTO_PATH = 'public/uploads/';

    private $matchController;
    private $photoController;
    private $bookRepo;
    private $photoRepo;
    private $userRepo;

    public function __construct() {
        parent::__construct();
        $this->matchController = new MatchController();
        $this->photoController = new PhotoController();
        $this->bookRepo = new BookRepo();
        $this->photoRepo = new PhotoRepo();
        $this->userRepo = new UserRepo();
    }

    public function updateAccount() {
        if ($this->isPost()) {
            // Jeśli przekazano plik, dodaj go do zdjęć
            if (isset($_FILES['profilePhoto']) || $_FILES['profilePhoto']['error'] != 0) {
                $this->photoController->addPhotoController($_FILES['profilePhoto']);

                $_SESSION['profilePhoto'] = self::PHOTO_PATH.$this->photoRepo->getPhoto($_SESSION['user_id']);
            } else {
                echo 'Wystąpił błąd podczas przesyłania zdjęcia <br>';
                var_dump($_FILES['profilePhoto']['error']);
                die();
            }

            // Pobierz istniejące dane użytkownika z sesji
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
            $this->userRepo->updateUser($_SESSION['user_id'], $email, $name, $surname);

            // Aktualizuj dane w sesji
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;

            // Przekieruj lub wykonaj inne akcje
            $this->render('settings');
        }
    }

    public function bookForm() {
        $this->bookRepo->addBooking($_SESSION['user_id'], $_POST['date'], $_POST['time-from'], $_POST['time-upto'], $_POST['room-number'], intval($_POST['room-preferences']), 0);

        $userBookings = $this->bookRepo->getAllUserBookings($_SESSION['user_id']);
        $notUserBookings = $this->bookRepo->getAllNotUserBookings($_SESSION['user_id']);

        $matchArray = $this->matchController->findMatchingTimeSlot($userBookings, $notUserBookings);
        var_dump($matchArray);
        die();

        if (empty($matchArray)) {
            $this->render('book', ["messages" => ["Umówiono spotkanie!"]]);
        }

        $this->matchController->addFinalMeeting($matchArray);

        $this->render('book', ["messages" => ["Umówiono spotkanie!"]]);
    }
}
