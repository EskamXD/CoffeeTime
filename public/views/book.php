<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header("Location: /loginPage");
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
    <!-- Title content -->
    <main class="content-flex screen-height">
        <form class="content-column gap-h-5">
            <h1>
                <?php 
                    if(isset($messages)) {
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </h1>
            <div class="relative">
                <input type="date" name="" required> 
                <span class="border"></span>
            </div>
            <div class="content-row content-beetwen">
                <div class="relative" style="width: 43%;"> 
                    <input type="time" name="" required>
                    <span class="border"></span>
                </div>
                <div class="relative" style="width: 43%;">
                    <input type="time" name="" required>
                    <span class="border"></span>
                </div>  
            </div>
            <div class="relative">
                <input type="text" name="" placeholder="Numer pokoju" required>
                <span class="border"></span>
            </div>
            <div class="content-row content-around content-wrap">
                <label>Zapraszasz do siebie?</label>
                <div>
                    <input type="radio" name="radio-choose-your-room" id="radio-yes" value="Y">
                    <label for="radio-yes">Tak</label>
                </div>
                <div>
                    <input type="radio" name="radio-choose-your-room" id="radio-no" value="N" checked>
                    <label for="radio-no">Nie</label>
                </div>
            </div>
            <button id="button" class="hover-scale">Umów się</button>
        </form>
    </main>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>
</html>