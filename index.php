<?php 

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('about', 'DefaultController');
Routing::get('merch', 'DefaultController');
Routing::get('book', 'DefaultController');
Routing::get('notification', 'DefaultController');
Routing::get('login', 'DefaultController');

Routing::post('login', 'SecurityController');

Routing::run($path);
?>