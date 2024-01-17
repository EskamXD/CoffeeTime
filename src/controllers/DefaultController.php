<?php
require_once 'src/controllers/AppController.php';

class DefaultController extends AppController {

    public function about() {
        $this->render('about', []);
    }

    public function admin() {
        $this->render('admin', []);
    }

    public function book() {
        $this->render('book', ["messages" => ["Umów się!"]]);
    }

    public function blocked() {
        $this->render('blocked', []);
    }
    
    public function index() {
        $this->render('home', ["messages" => ["Tutaj zaczyna się dobra znajomość..."]]);
    }

    public function info() {
        $this->render('info', []);
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