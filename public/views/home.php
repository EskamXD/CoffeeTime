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
            <h2>Tutaj zaczyna się dobra znajomość...</h2>
            <!-- Social media icons -->
            <div class="social">
                <a href="https://www.facebook.com/Urban4G" class="social-button image-hover" target="_blank"><img
                        src="public/icons/webp_compressed/facebook.webp" alt="Facebook link"></a>
                <a href="https://www.instagram.com/urbanseskam/" class="social-button image-hover" target="_blank"><img
                        src="public/icons/webp_compressed/instagram.webp" alt="Instagram link"></a>
                <a href="https://twitter.com/EskamXD" class="social-button image-hover" target="_blank"><img
                        src="public/icons/webp_compressed/twitter.webp" alt="Twitter link"></a>
            </div>
            <div class="arrow-mobile">
                <div id="arrow"></div>
            </div>
        </div>
    </main>
    <!-- Coffee section -->
    <section class="coffee content-flex">
        <div class="content-row screen">
            <div class="list-text">
                <h3>Kawusia studencka</h3>
                <ul>
                    <li>• Kawa Czarna</li>
                    <li>• Kawa Biała</li>
                    <li>• Latte Macchiato</li>
                </ul>
            </div>
            <div class="image-border">
                <img src="public/images/webp_compressed/coffee1.webp" alt="Photo" loading="lazy">
            </div>
        </div>
    </section>
    <!-- Scrolling background, coffee price -->
    <section class="scrolling-background scrolling-background-mobile content-flex"
        style="background-image: url('public/images/webp_compressed/coffee2.webp');">
        <div class="content-column screen">
            <h2>Wszystkie kawy 2,50&nbsp;PLN!</h2>
        </div>
    </section>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>
<script src="js.js"></script>

</html>