<?php

require_once 'src/controllers/DatabaseController.php';

class Repo {
    protected $databaseController;

    public function __construct() {
        // Ustaw połączenie z bazą danych (dostosuj do własnych parametrów).
        $this->databaseController = new DatabaseController();
    }

    public function __destruct()
    {
        $this->databaseController = null;
    }
}