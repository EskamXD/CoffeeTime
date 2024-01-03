<?php

require_once 'src/controllers/AppController.php';

// require_once 'src/repositories/PhotoRepo.php';
require_once 'src/repositories/UserRepo.php';


class AdminController extends AppController {
    const PHOTO_PATH = 'public/uploads/';

    // private $photoRepo;
    private $userRepo;

    public function __construct() {
        parent::__construct();
        
        // $this->photoRepo = new PhotoRepo();
        $this->userRepo = new UserRepo();
    }

    public function admin() {
        if (!$this->isPost()) {
            return $this->render('admin', ['messages' => ['Błąd logowania!']]);
        }

        $user = $this->userRepo->getUserByLogin($_POST['login']);
        if (!$user) {
            $this->render('admin', ['messages' => ['Nieprawidłowy login!']]);
            return;
        }

        $adminChoice = $_POST['submit'];
        if ($adminChoice == 'Zablokuj') {
            $this->userRepo->blockUser($user->getId());
        } else if ($adminChoice == 'Odblokuj') {
            $this->userRepo->unblockUser($user->getId());
        } else if ($adminChoice == 'Usuń') {
            $this->userRepo->deleteUser($user->getId());
        }
    }
}