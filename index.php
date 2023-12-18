<?php
// error_reporting(E_ERROR | E_PARSE);

session_start();

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('about', 'DefaultController');
Routing::get('book', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('info', 'DefaultController');
Routing::get('loginPage', 'DefaultController');
Routing::get('logoutPage', 'DefaultController');
Routing::get('merch', 'DefaultController');
Routing::get('notification', 'DefaultController');
Routing::get('notificationCheck', 'DefaultController');
Routing::get('registerPage', 'DefaultController');
Routing::get('settings', 'DefaultController');

Routing::get('checkUserBookings', 'BookingController');
Routing::get('getUserActiveNotifications', 'NotificationController');

Routing::post('bookForm', 'AccountController');
Routing::post('notificationAnswerForm', 'NotificationController');
Routing::post('updateAccountForm', 'AccountController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');

Routing::run($path);
