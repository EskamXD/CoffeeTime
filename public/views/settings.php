<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header("Location: login");
        exit();
    }
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
    <?php var_dump($_SESSION); ?>
    <!-- Top arrow -->
    <?php include 'public/views/top-arrow.php'; ?>
    <!-- Navbar -->
    <?php include 'public/views/navbar.php'; ?>
    <!-- Title content -->
    <main class="content-row screen-height">
        <div class="content-column half-smaller screen-height mobile-display-none">
            <h3 class="black">Konto</h3>
            <h3 class="black">Ustawienia</h3>
        </div>
        <div class="content-column half-bigger screen-height bg-white round-left mobile-display-full">
            <form id="account" class="content-column gap-h-5" action="updateAccount" method="POST" enctype="multipart/form-data">
                <h3 class="black">Konto</h3>
                <div class="content-column gap-h-5">
                    <?php 
                        if(isset($_SESSION['photo'])) {
                            echo '<img class="image-circle black profile" src="public/uploads/'.$_SESSION['photo'].'" alt="Profilowe">';
                        } else {
                            echo '<img class="image-circle black profile" src="public/icons/webp_compressed/profile.webp" alt="Profilowe">';
                        }
                    ?>
                    <label class="button black hover-scale">
                        <input type="file" style="display: none;">
                        Zmień zdjęcie
                    </label>
                </div>
                <div class="content-row content-beetwen relative">
                    <?php
                        echo '  <input id="input-settings-user" type="text" name="user" placeholder="'.$_SESSION['user'].'" disabled>
                                <span class="border black"></span>';
                    ?>
                </div>
                <div class="content-row content-beetwen relative">
                    <?php
                        echo '  <input id="input-settings-name" type="text" name="name" placeholder="'.$_SESSION['name'].'" disabled>
                                <span class="border black"></span>';
                    ?>
                </div>
                <div class="content-row content-beetwen relative">
                    <?php
                        echo '  <input id="input-settings-surname" type="text" name="surname" placeholder="'.$_SESSION['surname'].'" disabled>
                                <span class="border black"></span>';
                    ?>
                </div>
                <div class="content-row content-beetwen relative">
                    <?php
                        echo '  <input id="input-settings-email" type="email" name="email" placeholder="'.$_SESSION['email'].'" disabled>
                                <span class="border black"></span>';
                    ?>
                </div>
                <div class="content-row content-around">
                    <button id="edit-button" class="black hover-scale" type="button">Edytuj</button>
                    <button id="save-button" class="black hover-scale hide" type="submit">Zapisz</button>
                    <button id="cancel-button" class="cancel hover-scale hide" type="reset">Anuluj</button>
                </div>
            </form>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>
<script src="public/scripts/buttons.js"></script>
</html>