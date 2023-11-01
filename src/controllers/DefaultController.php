<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function index() {
        $this->render('home', []);
    }

    public function about() {
        $this->render('about', []);
    }

    public function merch() {
        $this->render('merch', []);
    }

    public function book() {
        $this->render('book', ["messages" => ["Umów się!"]]);
    }

    public function notification() {
        $this->render('notification', []);
    }

    public function loginPage() {
        $this->render('loginPage', []);
    }

    public function logoutPage() {
        $this->render('logoutPage', []);
    }

    public function settings() {
        $this->render('settings', []);
    }
}

?>