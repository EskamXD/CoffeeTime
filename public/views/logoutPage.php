<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    
    $logout = new SecurityController();
    $logout->logout();
?>