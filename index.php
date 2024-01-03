<?php
// error_reporting(E_ERROR | E_PARSE);

session_start();

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

// Views
Routing::get('', 'DefaultController');
Routing::get('about', 'DefaultController');
Routing::get('blocked', 'DefaultController');
Routing::get('book', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('info', 'DefaultController');
Routing::get('loginPage', 'DefaultController');
Routing::get('logoutPage', 'DefaultController');
Routing::get('merch', 'DefaultController');
Routing::get('notification', 'DefaultController');
Routing::get('notifications', 'NotificationController');
Routing::get('registerPage', 'DefaultController');
Routing::get('settings', 'DefaultController');

// Fetch functions
Routing::post('addPhotoForm', 'PhotoController');
Routing::post('bookForm', 'BookingController');
Routing::post('bookAgain', 'BookingController');
Routing::post('checkUserBookings', 'BookingController');
Routing::post('getUserActiveNotifications', 'NotificationController');
Routing::post('procesFinalMeeting', 'MatchController');
Routing::post('notificationAnswer', 'NotificationController');
Routing::post('updateAccountForm', 'AccountController');

// Security functions
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');


Routing::run($path);
