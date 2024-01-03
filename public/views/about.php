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

    <title>CoffeeTime - O nas</title>
    <link rel="icon" href="public/icons/webp_compressed/coffee-cup.webp">
</head>

<body>
    <!-- Top arrow -->
    <?php include 'public/views/top-arrow.php'; ?>
    <!-- Navigation bar -->
    <?php include 'public/views/navbar.php'; ?>
    <!-- Title content -->
    <main class="content-flex screen-height">
        <div class="content-column">
            <h1>O nas</h1>
            <h2>Czyli czterej pancerni bez psa</h2>
            <!-- Social media icons -->
            <div class="content-row content-around">
                <a href="https://www.facebook.com/Urban4G" class="icon hover-scale" target="_blank"><img
                        src="public/icons/webp_compressed/facebook.webp" alt="Facebook link"></a>
                <a href="https://www.instagram.com/urbanseskam/" class="icon hover-scale" target="_blank"><img
                        src="public/icons/webp_compressed/instagram.webp" alt="Instagram link"></a>
                <a href="https://twitter.com/EskamXD" class="icon hover-scale" target="_blank"><img
                        src="public/icons/webp_compressed/twitter.webp" alt="Twitter link"></a>
            </div>
            <div class="arrow">
            </div>
        </div>
    </main>
    <!-- Hymn section -->
    <section class="content-flex screen-height" style="background-color: var(--white);">
        <div class="content-column content-around screen-height screen-width">
            <h3 class="black">"To my, to my, chłopaki z polibudy..."</h3>
            <div class="iframe-container image-round">
                <iframe class="iframe-responsive" src="https://www.youtube.com/embed/V7K3OgbdXPw" loading="lazy"
                    allowfullscreen="true"></iframe>
            </div>
        </div>
    </section>
    <!-- Legends section -->
    <!-- <section class="scrolling-background scrolling-background-mobile content-flex"
        style="background-image: url('public/images/webp_compressed/galeria-slaw.webp'); background-size: contain;">
        <div class=" content-column screen"></div>
    </section> -->
    <!-- Kamil section -->
    <hr>
    <section class="content-flex screen-height" style="background-color: var(--white);">
        <div class="content-row">
            <div class="image-round">
                <img src="public/images/webp_compressed/kamil.webp" alt="" loading="lazy">
            </div>
            <div class="content-column">
                <h1 class="black">Kamil</h3>
                <h2 class="black"></h2>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>

</html>