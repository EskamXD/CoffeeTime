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

    <meta name="google-signin-client_id" content="60330635765-85t7ub0gnpuhq0t550df4iokr5r9g4di.apps.googleusercontent.com">
</head>

<body>
    <button onclick="topFunction()" id="button-top" title="Go to top">
        <div id="button-arrow"></div>
    </button>
    <!-- Header -->
    <header class="header content-flex" id="main">
        <div class="content-row screen mobile-switch">
            <!-- Logo -->
            <a href="/" class="logo"><img src="public/icons/webp_compressed/coffee-cup.webp" alt="logo"></a>
            <!-- Hamburger icon -->
            <!-- <input class="side-menu" type="checkbox" id="side-menu" />
            <label class="hamb" for="side-menu"><span class="hamb-line"></span></label> -->
            <!-- Menu -->
            <!-- <nav class="nav">
                <ul class="menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">O nas</a> </li>
                    <li><a href="/merch">Merch</a></li>
                    <li><a href="/book">Umów się</a></li>
                </ul>
            </nav> -->
            <!-- Login and Notification icon -->
            <!-- <a href="/notification" class="icons-navbar image-hover"><img src="public/icons/oryginal/notification-white.png"
                    alt="Notification icon"></a>
            <a href="/login" class="icons-navbar image-hover"><img src="public/icons/oryginal/account-white.png"
                    alt="Login icon"></a>  -->
        </div>
    </header>
    <!-- Title content -->
    <main class="title-screen content-flex">
        <div class="content-column screen">
            <h2>Zaloguj się<h2>
            <form class="content-column" style="width: 50%;">
                <input type="text" name="login-input" class="input" placeholder="Login"> 
                <input type="password" name="password-input" class="input" placeholder="Hasło">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <button class="button">Zaloguj</button>
            </form>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>
<script src="js.js"></script>
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