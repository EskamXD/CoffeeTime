<html>

<head>
    <!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#edc098">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tutaj kiedyś pojawi się nasz merch">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>Pokój 315 - Merch</title>
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
            <h2>Merch</h2>
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
    <!-- Legends section -->
    <section class="background content-flex" style="height: 100vh; text-align: center;">
        <h1 style="font-size: 4vmax; font-weight: 300;">Tutaj jeszcze nic nie ma, ale może kiedyś? 🤔</h1>
    </section>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>
<script src="public/js.js"></script>

</html>