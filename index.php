<?php 
// Rozpocznij sesję
session_start();


require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('about', 'DefaultController');
Routing::get('book', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('loginPage', 'DefaultController');
Routing::get('logoutPage', 'DefaultController');
Routing::get('merch', 'DefaultController');
Routing::get('notification', 'DefaultController');
Routing::get('registerPage', 'DefaultController');
Routing::get('settings', 'DefaultController');

Routing::post('login', 'SecurityController');
// Routing::post('logout', 'SecurityController');
Routing::post('register', 'SecurityController');

Routing::post('updateAccount', 'AccountController');

Routing::run($path);
?>