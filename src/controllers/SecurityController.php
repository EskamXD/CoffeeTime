<?php 

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    public function login() {
        $user = new User('malpa@gmail.com', 'admin', 'admin', 'Jan', 'Kowalski');

        if (!$this->isPost()) {
            return $this->render('loginPage', ['messages' => ['Błąd logowania!']]);
        } 

        $login = $_POST['login-input'];
        $password = $_POST['password-input'];

        if ($user->getLogin() !== $login) {
            $this->render('loginPage', ['messages' => ['Nieprawidłowy login!']]);
            return;
        }

        if ($user->getPassword() !== $password) {
            $this->render('loginPage', ['messages' => ['Nieprawidłowe hasło!']]);
            return;
        }
        
        $_SESSION['user'] = $user->getLogin();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['name'] = $user->getName();
        $_SESSION['surname'] = $user->getSurname();

        return $this->render('home', ['messages' => ['Witaj '.$user->getName().'!</br>', 'Umów się!']]);
    }
}