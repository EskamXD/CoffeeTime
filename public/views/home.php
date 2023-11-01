<?php
    session_start();
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
</head>

<body>
    <!-- Top arrow -->
    <?php include 'public/views/top-arrow.php'; ?>
    <!-- Navigation bar -->
    <?php include 'public/views/navbar.php'; ?>
    <!-- Title content -->
    <main class="content-flex screen-height">
        <div class="content-column">
            <h1>Tutaj zaczyna się dobra znajomość...</h2>
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
    <!-- Coffee section -->
    <section class="content-flex screen-height bg-white">
        <div class="content-row content-beetwen content-wrap screen-width">
            <div class="content-column content-beetwen gap-h-10">
                <div class="content-column">
                    <h2 class="black">Kawusia studencka</h3>
                    <p class="black">Potrzebujesz z kimś pogadać, wypić dobrą kawę?</p>
                </div>
                <div class="content-flex">
                    <button class="big black hover-scale">Umów się na kawę</button>
                </div>
            </div>
            <div class="content-flex">
                <img src="public/images/webp_compressed/coffee1.webp" alt="Photo" loading="lazy" class="image-round">
            </div>
        </div>
    </section>
    <!-- Scrolling background, coffee price -->
    <section class="content-flex screen-height"
        style="background-image: url('public/images/webp_compressed/coffee2.webp'); background-attachment: fixed; background-size: cover;">
        <div class="content-column gap-h-10">
            <div class="content-column">
                <h2>Nie masz jeszcze konta?</h2>
                <p>Dołącz do nas już dziś!</p>
            </div>
            <div class="content-flex">
                <button class="big hover-scale">Dołącz</button>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>

</html>