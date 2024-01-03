<html>

<?php
    if (!isset($_SESSION['user'])) {
        header("Location: loginPage");
    }
    if ($_SESSION['user']->getUserRole() != 'admin') {
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
                $userRepo = new UserRepo();

                $usersArray = $userRepo->getUsers();
                foreach($usersArray as $user) {
                    echo '<div class="content-row gap-h-5">';
                    echo '<div class="content-column gap-v-5">';
                    echo '<h2>' . $user->getLogin() . '</h2>';
                    echo '<h3>' . $user->getName() . ' ' . $user->getSurname() . '</h3>';
                    echo '<h3>' . $user->getEmail() . '</h3>';
                    echo '<h3>' . $user->getRoomNumber() . '</h3>';
                    echo '<h3>' . $user->getUserRole() . '</h3>';
                    echo '<h3>' . $user->getUserBlocked() . '</h3>';
                    echo '</div>';
                    echo '<div class="content-column gap-v-5">';
                    echo '<img src="' . PHOTO_PATH . $user->getLogin() . '.jpg" alt="Zdjęcie użytkownika" class="user-photo">';
                    echo '<form action="admin" method="POST">';
                    echo '<input type="hidden" name="login" value="' . $user->getLogin() . '">';
                    echo '<input type="submit" name="block" value="Zablokuj" class="button">';
                    echo '<input type="submit" name="unblock" value="Odblokuj" class="button">';
                    echo '<input type="submit" name="delete" value="Usuń" class="button">';
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

</html>