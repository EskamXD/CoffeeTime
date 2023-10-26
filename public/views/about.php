<html>

<head>
    <!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#edc098">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Trochę o mnie">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>Pokój 315 - O nas</title>
    <link rel="icon" href="public/icons/webp_compressed/coffee-cup.webp">

    <link rel="stylesheet" media="screen and (min-width: 768px)" href="public/css/pc.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="public/css/phone.css">

    <link rel="stylesheet" type="text/css" href="public/css/fonts.css">

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto&display=swap" rel="stylesheet"> -->
</head>

<body>
    <button onclick="topFunction()" id="button-top" title="Go to top">
        <div id="button-arrow"></div>
    </button>
    <!-- Navigation bar -->
    <?php include 'public/views/navbar.php'; ?>
    <!-- Title content -->
    <main class="title-screen content-flex">
        <div class="content-column screen">
            <h2>O nas</h2>
            <h3 style="color: white; text-align: center; margin: 0;">Czyli czterej pancerni bez psa</h3>
            <!-- Social media icons -->
            <div class="social">
                <a href="https://www.facebook.com/Urban4G" class="social-button" target="_blank"><img
                        src="public/icons/webp_compressed/facebook.webp" alt="Facebook link"></a>
                <a href="https://www.instagram.com/urbanseskam/" class="social-button" target="_blank"><img
                        src="public/icons/webp_compressed/instagram.webp" alt="Instagram link"></a>
                <a href="https://twitter.com/EskamXD" class="social-button" target="_blank"><img
                        src="public/icons/webp_compressed/twitter.webp" alt="Twitter link"></a>
            </div>
            <div class="arrow-mobile arrow-pc">
                <div id="arrow"></div>
            </div>
        </div>
    </main>
    <!-- Hymn section -->
    <section class="content-flex" style="height: fit-content !important; margin-top: 5vh; margin-bottom: 5vh;">
        <div class="content-column screen">
            <h3 style="text-align: center;">"To my, to my, chłopaki z polibudy..."</h3>
            <div style="width: 100%; height: 100%; position: relative;
            overflow: hidden;
            padding-top: 56.25%;">
                <iframe class="responsive-iframe" src="https://www.youtube.com/embed/V7K3OgbdXPw" loading="lazy"
                    allowfullscreen="true"></iframe>
            </div>
        </div>
    </section>
    <!-- Legends section -->
    <section class="scrolling-background scrolling-background-mobile content-flex"
        style="background-image: url('public/images/webp_compressed/galeria-slaw.webp'); background-size: contain;">
        <div class=" content-column screen"></div>
    </section>
    <!-- Kamil section -->
    <hr class="screen">
    <section class="content-flex">
        <div class="content-row screen reverse">
            <div class="image-border">
                <img src="public/images/webp_compressed/kamil.webp" alt="" loading="lazy">
            </div>
            <div class="list-text">
                <h3>Kamil</h3>
                <h2></h2>
            </div>
        </div>
    </section>
    <!-- Seba section -->
    <hr class="screen">
    <section class="content-flex">
        <div class="content-row screen">
            <div class="list-text">
                <h3>Seba</h3>
                <h2></h2>
            </div>
            <div class="image-border">
                <img src="public/images/webp_compressed/seba.webp" alt="" loading="lazy">
            </div>
        </div>
    </section>
    <!-- Pawel section -->
    <hr class="screen">
    <section class="content-flex">
        <div class="content-row screen reverse">
            <div class="image-border">
                <img src="public/images/webp_compressed/pawel.webp" alt="" loading="lazy">
            </div>
            <div class="list-text">
                <h3>Paweł</h3>
                <h2></h2>
            </div>
        </div>
    </section>
    <!-- Kuba section -->
    <hr class="screen">
    <section class="content-flex">
        <div class="content-row screen">
            <div class="list-text">
                <h3>Kuba</h3>
                <h2></h2>
            </div>
            <div class="image-border">
                <img src="public/images/webp_compressed/kuba.webp" alt="" loading="lazy">
            </div>
        </div>
    </section>
    <!-- Krzych section -->
    <hr class="screen">
    <section class="content-flex">
        <div class="content-row screen reverse">
            <div class="image-border">
                <img src="public/images/webp_compressed/krzych.webp" alt="" loading="lazy" style="filter: grayscale(100%);">
            </div>
            <div class="list-text">
                <h3>Krzychu</h3>
                <h2></h2>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>
<script src="public/js.js"></script>

</html>