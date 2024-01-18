<?php
require_once 'src/repositories/UserRepo.php';
$userRepo = new UserRepo();
$user = $userRepo->getUser($_SESSION['user_id']);
if ($user->getUserRole() != 'admin') {
    header('Location: /index');
    exit;
}
phpinfo();
