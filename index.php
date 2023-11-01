<?php 
// Ustaw nazwę sesji (jeśli potrzebujesz zmienić domyślną nazwę "PHPSESSID")
session_name("UserSession");

// Konfiguruj parametry ciasteczka sesji (opcjonalne)
$sessionParams = session_get_cookie_params();
$sessionParams['lifetime'] = 3600; // Ustaw czas życia sesji na 1 godzinę
$sessionParams['path'] = '/'; // Dostępne na całej stronie
$sessionParams['secure'] = true; // Wymaga protokołu HTTPS
$sessionParams['httponly'] = true; // Zapobiega dostępowi z poziomu JavaScript

session_set_cookie_params($sessionParams);

// Rozpocznij sesję
session_start();


require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('about', 'DefaultController');
Routing::get('merch', 'DefaultController');
Routing::get('book', 'DefaultController');
Routing::get('notification', 'DefaultController');
Routing::get('loginPage', 'DefaultController');
Routing::get('logoutPage', 'DefaultController');
Routing::get('settings', 'DefaultController');

Routing::post('login', 'SecurityController');
// Routing::post('logout', 'SecurityController');
// Routing::post('register', 'SecurityController');

Routing::post('updateAccount', 'AccountController');

Routing::run($path);
?>