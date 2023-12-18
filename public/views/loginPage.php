<?php
    // Ustaw nazwę sesji (jeśli potrzebujesz zmienić domyślną nazwę "PHPSESSID")
    // session_name("UserSession");
    // session_start();

    // session_set_cookie_params($sessionParams);
    // setcookie(session_name(), session_id(), 3600, '/', 'localhost', true, true);

    // $securityController = new SecurityController();
?>

<html>

<head>
    <!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#edc098">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Strona główna kawiarni Pokój 315">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>Pokój 315 - Strona główna</title>
    <link rel="icon" href="public/icons/webp_compressed/coffee-cup.webp">
    
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 768px)" href="public/css/pc.css">
    <link rel="stylesheet" type="text/css" media="screen and (max-width: 768px)" href="public/css/phone.css">
    
    <link rel="stylesheet" type="text/css" href="public/css/fonts.css">

    <!-- <meta name="google-signin-client_id" content="60330635765-85t7ub0gnpuhq0t550df4iokr5r9g4di.apps.googleusercontent.com"> -->
</head>

<body>
    <!-- Top arrow -->
    <?php include 'public/views/top-arrow.php'; ?>
    <!-- Title content -->
    <main class="content-row full-screen">
        <div class="content-flex full-screen half-bigger bg-white round-right mobile-display-none">
            <img src="public/icons/webp_compressed/coffee-cup.webp" alt="Photo" loading="lazy" class="image-round profile">
        </div>
        <div class="content-column half-smaller">
            <form class="content-column gap-h-5" action="login" method="POST">
                <h1>Zaloguj się</h1>
                <div class="relative">
                    <input type="text" name="login" placeholder="Login" required> 
                    <span class="border"></span>
                </div>
                <div class="relative">
                    <input type="password" name="password" placeholder="Hasło" required>
                    <span class="border"></span>
                </div>
                <!-- <div class="g-signin2" data-onsuccess="onSignIn" style="width: 350px; height: 70px; border-radius: 20px !important;"></div> -->
                <button id="button" type="submit" class="hover-scale">Zaloguj</button>
                <p>Nie masz konta? <strong><a href="/registerPage" style="font-family: Roboto;">Zarejestruj się</a></strong></p>
                <p>
                    <?php 
                        if(isset($messages)) {
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </p>
            </form>
        </div>
    </main>
    <!-- Footer -->
</body>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    }
</script>
</html>