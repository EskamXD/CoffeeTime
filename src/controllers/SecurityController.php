<?php

require_once 'src/controllers/AppController.php';

require_once 'src/repositories/PhotoRepo.php';
require_once 'src/repositories/UserRepo.php';


class SecurityController extends AppController {
    const PHOTO_PATH = 'public/uploads/';

    private $photoRepo;
    private $userRepo;

    public function __construct() {
        parent::__construct();
        
        $this->photoRepo = new PhotoRepo();
        $this->userRepo = new UserRepo();
    }

    public function login() {
        if (!$this->isPost()) {
            return $this->render('loginPage', ['messages' => ['Błąd logowania!']]);
        }

        $user = $this->userRepo->getUserByLogin($_POST['login']);
        if (!$user) {
            $this->render('loginPage', ['messages' => ['Nieprawidłowy login!']]);
            return;
        }
        
        if (password_verify($_POST['password'], $user->getPassword())) {
            $this->render('loginPage', ['messages' => ['Nieprawidłowe hasło!']]);
            return;
        }

        if ($user['user_blocked'] == true) {
            session_unset();
            session_destroy();
            header('Location: /blocked');
            exit;
        }

        self::setSessionParams($user);

        $photo = $this->photoRepo->getPhoto($user->getId());
        if($photo) {
            $_SESSION['profilePhoto'] = self::PHOTO_PATH.$photo;
        }

        setcookie(session_name(), session_id(), 3600, '/', 'localhost', true, true);

        return $this->render('home', ['messages' => ['Witaj '.$user->getName().'!</br>', 'Umów się!']]);
    }

    public function logout() {
        session_unset();
        session_destroy();
        setcookie(session_name(), session_id(), time() - 3600, '/', 'localhost', true, true);

        $this->render('home', ['messages' => ['Wylogowano!']]);
    }

    public function register() {
        if (!$this->isPost()) {
            return $this->render('register', ['messages' => ['Błąd rejestracji!']]);
        }

        $login = $_POST['login'];

        $this->userRepo->createUser(
            $_POST['email'],
            $login,
            $_POST['password'],
            $_POST['name'],
            $_POST['surname'],
            $_POST['roomNumber']
        );

        self::setSessionParams($this->userRepo->getUserByLogin($login));

        $this->render('home', ['messages' => ['Zarejestrowano!']]);
    }

    public function setSessionParams($user) {
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user'] = $user->getLogin();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['name'] = $user->getName();
        $_SESSION['surname'] = $user->getSurname();
        $_SESSION['room_number'] = $user->getRoomNumber();
        $_SESSION['profilePhoto'] = self::PHOTO_PATH.'default.png';
    }
}
