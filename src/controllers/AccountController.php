<?php

// session_start();

require_once 'src/controllers/AppController.php';
require_once 'src/controllers/PhotoController.php';
require_once 'src/controllers/MatchController.php';
require_once 'src/repositories/BookRepo.php';
require_once 'src/repositories/UserRepo.php'; 

class AccountController extends AppController {
    const PHOTO_PATH = 'public/uploads/';

    private $userRepo;

    /**
     * AccountController constructor.
     */
    public function __construct() {
        parent::__construct();

        $this->userRepo = new UserRepo();
    }

    /**
     * @return void
     * 
     * Aktualizuje dane uytkownika w bazie danych i na stronie
     */
    public function updateAccountForm(): void {
        if ($this->isPost()) {   
            // Aktualizuj dane użytkownika, jeśli zostaną przekazane przez formularz
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
        
            // Aktualizuj dane użytkownika w bazie danych za pomocą UserRepo
            $this->userRepo->updateUser($_SESSION['user_id'], $email, $name, $surname);

            // Aktualizuj dane w sesji
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;

            $response = [
                'status' => 'success',
                'message' => 'AccountController->updateAccountform(): Zaktualizowano dane użytkownika',
                'data' => [
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email
                ] 
            ];

            echo json_encode($response);
            exit;
        }
    }
}
