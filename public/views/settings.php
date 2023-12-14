<?php
    // Start session
    // session_start();
    // var_dump($_SESSION);
    // die();

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
    <!-- Top arrow -->
    <?php include 'public/views/top-arrow.php'; ?>
    <!-- Navbar -->
    <?php include 'public/views/navbar.php'; ?>

    <?php //var_dump($_SESSION); ?>
    <!-- Title content -->
    <main class="content-row screen-height">
        <div class="content-column half-smaller screen-height mobile-display-none">
            <h3 class="black">Konto</h3>
            <!-- <h3 class="black">Ustawienia</h3> -->
        </div>
        <div class="content-column half-bigger screen-height bg-white round-left mobile-display-full">
            <!-- Form using function updateAccount from AccountController -->
            <form id="account" class="content-column gap-h-5" action="updateAccount" method="POST" enctype="multipart/form-data">
                <h3 class="black">Konto</h3>
                <div class="content-column gap-h-5">
                    <?php 
                        echo '<img class="image-circle black profile" src="'.$_SESSION['profilePhoto'].'" alt="Profilowe">';
                    ?>
                    <label id="input-settings-photo-label" class="content-flex button black hover-scale hide" disabled>
                        <input id="input-settings-photo" type="file" name="profilePhoto" class="hide" disabled>
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

    <?php echo '<p id="user-id" hidden>' . $_SESSION["user_id"] . '</p>'; ?>
</body>
<script src="public/scripts/buttons.js"></script>
<script src="public/scripts/photoChange.js"></script>
</html>