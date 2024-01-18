<html>

<?php
if (!isset($_SESSION['user'])) {
    header("Location: loginPage");
}
require_once 'src/repositories/UserRepo.php';
$userRepo = new UserRepo();
$user = $userRepo->getUser($_SESSION['user_id']);
if ($user->getUserBlocked()) {
    session_unset();
    session_destroy();
    header('Location: /blocked');
    exit;
}
if ($user->getUserRole() != 'admin') {
    header("Location: index");
}

require_once 'src/repositories/PhotoRepo.php';
require_once 'src/repositories/UserRepo.php';

$photoRepo = new PhotoRepo();
$userRepo = new UserRepo();
$user = $userRepo->getUser($_SESSION['user_id']);

// var_dump($user, $_SESSION['user_id']);
// die();

if ($user->getUserRole() != 'admin') {
    header("Location: index");
}
?>


<head>
    <!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#edc098">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>CoffeeTime - Panel administracyjny</title>
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

                $usersArray = $userRepo->getUsers();
                foreach ($usersArray as $user) {
                    echo '<div class="content-row content-wrap content-around gap-h-5 mobile-display-full notification-card" style="width:80vw;">';

                    echo '<div class="content-column" style="max-width: 500px; width: 500px; align-items: flex-start;">';
                    echo '<h4 class="black"><strong>Użytkownik:</strong> ' . $user['name'] . " " . $user['surname'] . '</h4>';
                    echo '<h4 class="black"><strong>Email:</strong> ' . $user['surname'] . '</h4>';
                    echo '<h4 class="black"><strong>Pokój:</strong> ' . $user['room_number'] . '</h4>';
                    echo '<h4 class="black"><strong>Rola:</strong> ' . $user['user_role'] . '</h4>';
                    if ($user['user_blocked'])
                        echo '<h4 class="black"><strong>Status:</strong> Zablokowany</h4>';
                    else
                        echo '<h4 class="black"><strong>Status:</strong> Konto aktywne</h4>';
                    echo '</div>';

                    echo '<div class="content-row content-wrap gap-h-5">';
                    $userPhoto = $photoRepo->getPhoto($user['user_id']);
                    if ($userPhoto == null) {
                        echo '<img src="' . PHOTO_PATH . 'default.png" class="image-circle profile black" alt="Zdjęcie użytkownika">';
                    } else {
                        echo '<img src="' . PHOTO_PATH . $userPhoto . '" class="image-circle profile black" alt="Zdjęcie użytkownika">';
                    }
                    echo '<h4 class="black"><strong>Ilość rezerwacje:</strong> ' . $user['reservations_count'] . '</h4>';
                    echo '<h4 class="black"><strong>Ilość spotkań:</strong> ' . $user['meetings_count'] . '</h4>';
                    echo '</div>';

                    echo '<div class="content-column gap-v-5">';
                    echo '<form id="adminForm" class="content-column gap-h-2" onsubmit="return false;">';
                    echo '<input type="hidden" name="login" value="' . $user['user_id'] . '">';

                    if ($user['user_blocked'])
                        echo '<button type="button" onclick="fetchApi(' . $user['user_id'] . ', \'unblock\')" class="full-width approve">Odblokuj</button>';
                    else
                        echo '<button type="button" onclick="fetchApi(' . $user['user_id'] . ', \'block\')" class="full-width black">Zablokuj</button>';
                    echo '<button type="button" onclick="fetchApi(' . $user['user_id'] . ', \'delete\')" class="full-width cancel">Usuń</button>';

                    echo '</form>';
                    echo '</div>';

                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </main>

    <?php include 'public/views/footer.php'; ?>
</body>
<script>
    function fetchApi(userId, action) {
        var formData = new FormData();
        formData.append('user_id', userId);
        formData.append('action', action);

        console.log(userId, action);
        // Potwierdzenie przed wykonaniem akcji
        var confirmation = confirm('Czy na pewno chcesz wykonać tę akcję?');
        if (!confirmation) {
            return; // Przerwij działanie funkcji, jeśli użytkownik anulował
        }

        fetch('adminForm', {
                method: 'POST',
                body: formData
            }).then(response => response.text())
            .then(data => {
                console.log(data);
                // Możesz dodać obsługę odpowiedzi tutaj
            })
            .catch((error) => {
                console.error('Error:', error);
            });

        // Sleep for 1 second
        setTimeout(function() {
           location.reload();
        }, 250);
    }
</script>

</html>