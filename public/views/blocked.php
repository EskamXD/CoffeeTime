<?php
if (!isset($_SESSION['user'])) {
    header("Location: loginPage");
}
require_once 'src/repositories/UserRepo.php';
$userRepo = new UserRepo();
$user = $userRepo->getUser($_SESSION['user_id']);
if (!$user->getUserBlocked()) {
    header("Location: index");
    exit;
}
?>

<html>

<head>
    <!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#edc098">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Strona dla osób zablokowanych">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>CoffeeTime - Konto zablokowane</title>
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
            <h1>
                Twoje konto zostało zablokowane przez administratora.
            </h1>
            <p>
                Jeżeli uważasz, że to błąd, <a href="mailto: kamil.urbanowski@student.pk.edu.pl" style="text-decoration: underline;">skontaktuj się z nami<a>.
            </p>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>

</html>