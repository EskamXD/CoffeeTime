<head>
    <link rel="stylesheet" href="public/css/navbar.css">
    <link rel="stylesheet" media="screen and (min-width: 768px)" href="public/css/pc.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="public/css/phone.css">

    <link rel="stylesheet" type="text/css" href="public/css/fonts.css">
</head>
<header class="header" id="main">
    <div class="content-beetwen screen-width">
        <div class="content-row">
            <!-- Logo -->
            <a href="/" class="icon"><img src="public/icons/webp_compressed/coffee-cup.webp" alt="logo"></a>
            <!-- Hamburger icon -->
            <input class="side-menu" type="checkbox" id="side-menu" unset/>
            <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
            <!-- Menu -->
            <nav class="nav">
                <ul class="menu">
                    <li>
                        <a class="floor" href="/">Home</a>
                    </li>
                    <li>
                        <a class="floor" href="/about">O nas</a> 
                    </li>
                    <li>
                        <a class="floor" href="/merch">Merch</a>
                    </li>
                    <li>
                        <a class="floor" href="/book">Umów się</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="content-row">
            <!-- Login and Notification icon -->
            <a href="/notification" class="icon hover-scale"><img src="public/icons/oryginal/notification-white.png"
            alt="Notification icon"></a>
            <?php
                if(!isset($_SESSION['user'])) {
                    echo '  <a href="/loginPage" class="icon hover-scale"><img src="public/icons/oryginal/account-white.png"
                            alt="Login icon"></a>';
                        } else {
                            echo '  <a href="/logoutPage" class="icon hover-scale"><img class="image-circle" src="'.$_SESSION['profilePhoto'].'"
                            alt="Login icon"></a>';
                        }
                        ?>
            <a href="/settings" class="icon hover-scale"><img src="public/icons/oryginal/settings-white.png"
            alt="Settings icon"></a>
        </div>
    </div>
</header>
<script>
    window.onload = function() {
        document.getElementById('side-menu').checked = false;
    }
</script>