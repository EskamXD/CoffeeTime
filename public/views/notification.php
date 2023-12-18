<html>

<head>
    <!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#edc098">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CoffeeTime - Strona z powiadomieniami">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>CoffeeTime - Powiadomienia</title>
    <link rel="icon" href="public/icons/webp_compressed/coffee-cup.webp">
</head>

<body>
    <?php include 'public/views/top-arrow.php'; ?>
    <?php include 'public/views/navbar.php'; ?>

    <main class="contenf-flex screen-height">
        <div class="content-column">
            <h1>
                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </h1>
            <div class="content-column gap-h-5" style="padding-bottom: 5vh;">
                <?php
                // const PHOTO_PATH = 'public/uploads/';

                if (isset($notifications)) {
                    foreach ($notifications as $notification) {
                        echo '<div class="content-column content-wrap gap-h-5 notification-card" style="width:50vw">';
                        echo '<div class="content-column gap-h-5">';
                        echo '<h3 class="black">Spotkanie z użytkownikiem ' . $notification['user'] . '</h3>';
                        echo '<div class="content-row gap-h-5">';
                        if ($notification['photo'] == null) {
                            echo '<img src="' . PHOTO_PATH . 'default.png" class="image-circle profile black" alt="Zdjęcie użytkownika">';
                        } else {
                            echo '<img src="' . PHOTO_PATH . $notification['photo'] . '" class="image-circle profile black" alt="Zdjęcie użytkownika">';
                        }
                        echo '<div class="content-column gap-h-5">';
                        echo '<h4 class="black center">' . $notification['date'] . '<br>' . $notification['start_time'] . '</h4>';
                        echo '<h4 class="black">Pokój: ' . $notification['room'] . '</h4>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $userAcceptedRepo = new UserAcceptedRepo();
                        $userAnswer = $userAcceptedRepo->getUserAnswer($notification['meeting_id'], $_SESSION['user_id']);
                        if ($userAnswer == 0) {
                            echo '<form class="content-row gap-h-5" action="notificationAnswerForm" method="post">';
                            echo '<input type="hidden" name="meeting-id" value="' . $notification['meeting_id'] . '">';
                            echo '<button id="save-button" name="button-answer" class="black hover-scale" value="' . $notification['meeting_id'] . '" type="submit">Potwierdź</button>';
                            echo '<button id="cancel-button" name="button-answer" class="cancel hover-scale" value="-1" type="submit">Odmów</button>';
                            echo '</form>';
                        } else if ($userAnswer == 1) {
                            echo '<h4 class="black">Potwierdzono spotkanie</h4>';
                        }
                        echo '</div>';
                    }
                }
                ?>
            </div>
    </main>

    <?php include 'public/views/footer.php'; ?>
</body>

</html>