<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function about() {
        $this->render('about', []);
    }

    public function book() {
        $this->render('book', ["messages" => ["Umów się!"]]);
    }
    
    public function index() {
        $this->render('home', []);
    }

    public function loginPage() {
        $this->render('loginPage', []);
    }

    public function logoutPage() {
        $this->render('logoutPage', []);
    }

    public function merch() {
        $this->render('merch', []);
    }

    public function notification() {
        $this->render('notification', []);
    }

    public function registerPage() {
        $this->render('registerPage', []);
    }

    public function settings() {
        $this->render('settings', []);
    }
}

?>