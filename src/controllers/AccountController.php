<?php
session_start();

require_once 'src/controllers/AppController.php';
require_once 'src/controllers/PhotoController.php';

class AccountController extends AppController {
    public function createAccount() {
        die();
    }

    public function updateAccount() {
        if($this->isPost()) {
            if(isset($_FILES['file'])) {
                $photo = new PhotoController();
                $photo->addPhoto($_FILES['file']);
            }

            # if user is logged in and input is null take placeholder
            # else take input

            if(isset($_POST['user'])) {
                $user = $_POST['user'];
            } else {
                $user = $_SESSION['user'];
            }

            if(isset($_POST['name'])) {
                $name = $_POST['name'];
            } else {
                $name = $_SESSION['name'];
            }

            if(isset($_POST['surname'])) {
                echo $_POST['surname'];
                $surname = $_POST['surname'];
            } else {
                $surname = $_SESSION['surname'];
            }

            if(isset($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $email = $_SESSION['email'];
            }

            $_SESSION['user'] = $user;
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;
            
            echo $_SESSION['user'].', '.$_SESSION['name'].', '.$_SESSION['surname'].', '.$_SESSION['email'].'<br>';
            $this->render('settings');
        }

    }
}