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
    <?php include 'public/views/navbar.php'; ?>
    <main class="title-screen content-flex">
        <div class="content-column screen">
            <h2>Umów się</h2>
            <form class="content-column" style="width: 50%;">
                <input type="date" name="book-date" class="input"> 
                <div class="content-row">
                    <input type="time" name="book-hour-from" class="input">
                    <input type="time" name="book-hour-upto" class="input">
                </div>
                <input type="text" name="book-room-number" class="input" placeholder="Number pokoju">
                <div class="content-row">
                    <p>Zaprawszasz do siebie?</p>
                    <label class="radio-group">
                        <input type="radio" name="radio-button" class="radio-button">
                        <p class="radio-text">Tak</p>
                    </label>
                    <label class="radio-group">
                        <input type="radio" name="radio-button" class="radio-button" checked>
                        <p class="radio-text">Nie</p>
                    </label>
                </div>
            </form>
        </div>
    </main>
    <?php include 'public/views/footer.php'; ?>
</body>
</html>