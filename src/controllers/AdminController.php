<?php

require_once 'src/controllers/AppController.php';

// require_once 'src/repositories/PhotoRepo.php';
require_once 'src/repositories/UserRepo.php';


class AdminController extends AppController
{
    const PHOTO_PATH = 'public/uploads/';

    // private $photoRepo;
    private $userRepo;

    public function __construct()
    {
        parent::__construct();

        // $this->photoRepo = new PhotoRepo();
        $this->userRepo = new UserRepo();
    }

    public function adminForm()
    {
        if (!$this->isPost()) {
            return $this->render('admin', ['messages' => ['Błąd logowania!']]);
        }

        $user = $this->userRepo->getUser($_POST['user_id']);
        if (!$user) {
            $this->render('admin', ['messages' => ['Nieprawidłowy użytkownik!']]);
            return;
        }

        $adminChoice = $_POST['action'];
        if ($adminChoice == 'block') {
            $this->userRepo->blockUser($user->getId());
        } else if ($adminChoice == 'unblock') {
            $this->userRepo->unblockUser($user->getId());
        } else if ($adminChoice == 'delete') {
            $this->userRepo->deleteUser($user->getId());
        }
    }
}
