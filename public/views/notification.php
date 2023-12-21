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

    <main class="content-flex content-start screen-height">
        <div class="content-column mobile-display-full">
            <h1>
                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </h1>
            <div class="content-column gap-h-5 mobile-display-full" style="padding-bottom: 5vh;">
                <?php
                const PHOTO_PATH = 'public/uploads/';
                $userAcceptedRepo = new UserAcceptedRepo();

                if (isset($notifications)) {
                    foreach ($notifications as $notification) {
                        $currentuserAnswer = $userAcceptedRepo->getUserAnswer($notification['meeting_id'], $_SESSION['user_id']);
                        $oppositeUserAnswer = $userAcceptedRepo->getUserAnswer($notification['meeting_id'], $notification['user_id']);

                        if ($currentuserAnswer == 1 && $oppositeUserAnswer == 1) {
                            echo '<div class="content-column content-wrap gap-h-5 mobile-display-full notification-card" style="width:80vw; border: var(--green) 5px solid">';
                        } else {
                            echo '<div class="content-column content-wrap gap-h-5 mobile-display-full notification-card" style="width:80vw;">';
                        }
                        echo '<div class="content-column gap-h-5">';
                        echo '<h3 class="black">Spotkanie z użytkownikiem ' . $notification['user'] . '</h3>';
                        echo '<div class="content-row content-wrap gap-h-5">';
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
                        if ($currentuserAnswer == 0) {
                            echo '<div class="content-row content-wrap gap-h-5">';
                            echo '<button id="save-button" name="button-answer" class="black hover-scale" onclick="notificationAnswer('. $notification['meeting_id'] .', 1)">Potwierdź</button>';
                            echo '<button id="cancel-button" name="button-answer" class="cancel hover-scale" onclick="notificationAnswer('. $notification['meeting_id'] .', -1)">Odmów</button>';
                            echo '</div>';
                        } else if ($currentuserAnswer == 1 && $oppositeUserAnswer == 0) {
                            echo '<h4 class="black">Potwierdzono spotkanie</h4>';
                        } else if ($currentuserAnswer == 1 && $oppositeUserAnswer == 1) {
                            echo '<h4 class="black" style="color: var(--green);">Spotkanie w realizacji</h4>';
                        }
                        echo '</div>';
                    }
                }
                ?>
            </div>
    </main>

    <?php include 'public/views/footer.php'; ?>
</body>
<script>
    function notificationAnswer(meetingId, answer){
        var formData = new FormData();
        formData.append('meeting_id', meetingId);
        var status = "";
        var oppositeUser = 0;

        if (answer == -1) {
            fetch ('bookAgain', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
            .then(data => {
                console.log(data);
                status = data.status;
                oppositeUser = data.data;
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        } else {
            
            fetch ('notificationAnswer', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }

        if (status == "success") {
            fromData.append('user_id', oppositeUser);
            fetch ('procesFinalMeeting', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }

        location.reload();
    }
</script>
</html>