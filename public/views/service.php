<html>

<head>
    <!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#edc098">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Serwis i usługi">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>Pokój 315 - Serwis</title>
    <link rel="icon" href="../icons/webp_compressed/coffee-cup.webp">

    <link rel="stylesheet" media="screen and (min-width: 768px)" href="../css/pc.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="../css/phone.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <button onclick="topFunction()" id="button-top" title="Go to top">
        <div id="button-arrow"></div>
    </button>
    <!-- Navigation bar -->
    <header class="header content-flex" id="main">
        <div class="content-row screen mobile-switch">
            <!-- Logo -->
            <a href="../index.html" class="logo"><img src="../icons/webp_compressed/coffee-cup.webp" alt="logo"></a>
            <!-- Hamburger icon -->
            <input class="side-menu" type="checkbox" id="side-menu" />
            <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
            <!-- Menu -->
            <nav class="nav">
                <ul class="menu">
                    <li><a href="../html/home.html">Home</a></li>
                    <li><a href="../html/about.html">O nas</a> </li>
                    <li><a href="../html/merch.html">Merch</a></li>
                    <li><a href="../html/service.html">Serwis i usługi</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Title content -->
    <main class="title-screen content-flex">
        <div class="content-column screen">
            <h2>Serwis</h2>
            <h3 style="color: white; text-align: center; margin: 0;">Czyli usługi od siedmiu boleści</h3>
            <!-- Social media icons -->
            <div class="social">
                <a href="https://www.facebook.com/Urban4G" class="social-button" target="_blank"><img
                        src="../icons/webp_compressed/facebook.webp" alt="Facebook link"></a>
                <a href="https://www.instagram.com/urbanseskam/" class="social-button" target="_blank"><img
                        src="../icons/webp_compressed/instagram.webp" alt="Instagram link"></a>
                <a href="https://twitter.com/EskamXD" class="social-button" target="_blank"><img
                        src="../icons/webp_compressed/twitter.webp" alt="Twitter link"></a>
            </div>
            <div class="arrow-mobile arrow-pc">
                <div id="arrow"></div>
            </div>
        </div>
    </main>
    <!-- Service section -->
    <section class="scrolling-background scrolling-background-mobile content-flex"
        style="background-image: url('../images/webp_compressed/service.webp'); background-color: var(--white);">
        <div class=" content-column screen">
            <h2>Serwis i uslugi informatyczne oraz elektroniczne</h2>
        </div>
    </section>
    <!-- Joke section -->
    <section class="content-flex"
        style="height: fit-content !important; font-family: 'work sans', sans-serif !important;">
        <div class="screen">
            <h3>Ogólnie rzecz biorąc potrafimy pomóc w wielu kwestiach, zwłaszcza w kwestiach technicznych, hah, w końcu
                czterech przyszłych inżynierów nie? No i dlatego pomysłowość czasem nasza nie zna granic:</h3>
            <ul class="list-left">
                <li>• Zapomniałeś hasła do komputera? To nie problem,
                    przeinstalujemy Windowsa 😃</li>
                <li>• Nie odpala się ekran w telefonie? Nic się nie martw, jak nie
                    naprawimy to przynajmniej
                    przygotujemy
                    go do sprzedaży na części 😊</li>
                <li>• Potrzebujesz więcej miejsca na dysku? Usuniemy Windowsa -
                    miejsca będzie w brud! 😜</li>
                <li>• Twój telefon jest stary i wolny? Nasz fizyk go
                    przyspieszy... do prędkości 1g, wyrzucając go za okno!
                    😂</li>
            </ul>
            <h5>* Ogólnie przepraszam za te żarty, to nie ja je pisałem tylko ChatGPT</h5>
    </section>
    <section class="scrolling-background scrolling-background-mobile content-flex"
        style="background-image: url('../images/webp_compressed/service2.webp'); background-color: var(--white);">
        <div class=" content-column screen">
            <h3 style="color: var(--white) !important;">Wszystko to i wiele więcej możemy zrobić za bardzo niską cenę, a
                nawet za darmo! 😎</h3>
            <h3 style="color: var(--white) !important;">Jeśli chcesz się dowiedzieć więcej, to zapraszamy do kontaktu!
                Wiesz gdzie nas szukać 😏</h3>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer content-flex">
        <div class="content-column screen" style="gap: 5%;">
            <a href="#main" class="social-button"><img src="../icons/webp_compressed/coffee-cup.webp" alt="Logo"
                    loading="lazy"></a>
            <hr style="width: 60%; margin: 20px">
            <!-- Social media icons -->
            <div class="social">
                <a href="https://www.facebook.com/Urban4G" class="social-button" target="_blank"><img
                        src="../icons/webp_compressed/facebook.webp" alt="Facebook link"></a>
                <a href="https://www.instagram.com/urbanseskam/" class="social-button" target="_blank"><img
                        src="../icons/webp_compressed/instagram.webp" alt="Instagram link"></a>
                <a href="https://twitter.com/EskamXD" class="social-button" target="_blank"><img
                        src="../icons/webp_compressed/twitter.webp" alt="Twitter link"></a>
            </div>
            <p>
                All rights reserved &copy; 2023 by <a href="Kamil Urbanowski" class="rights-name">Kamil
                    Urbanowski</a>
            </p>
        </div>
    </footer>
</body>
<script src="../js.js"></script>

</html>