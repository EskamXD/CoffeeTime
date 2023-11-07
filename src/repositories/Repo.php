<?php

require_once 'src/controllers/DatabaseController.php';

class Repo {
    protected $db;

    public function __construct() {
        // Ustaw połączenie z bazą danych (dostosuj do własnych parametrów).
        $this->db = new DatabaseController();
    }
}