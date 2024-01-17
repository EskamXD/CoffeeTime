<?php
if (!isset($_SESSION['user'])) {
    header("Location: /loginPage");
    exit;
}

require_once 'src/repositories/UserRepo.php';
$UserRepo = new UserRepo();
$user = $UserRepo->getUser($_SESSION['user_id']);
if ($user->getUserBlocked()) {
    session_unset();
    session_destroy();
    header('Location: /blocked');
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
    <meta name="description" content="Strona do zmian ustawień użytkownika i edycji danych konta">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>CoffeeTime - Ustawienia użytkownika</title>
    <link rel="icon" href="public/icons/webp_compressed/coffee-cup.webp">
</head>

<body>
    <!-- Top arrow -->
    <?php include 'public/views/top-arrow.php'; ?>
    <!-- Navbar -->
    <?php include 'public/views/navbar.php'; ?>

    <?php //var_dump($_SESSION); 
    ?>
    <!-- Title content -->
    <main class="content-row screen-height">
        <div class="content-column half-smaller screen-height mobile-display-none">
            <h3 class="black">Konto</h3>
            <!-- <h3 class="black">Ustawienia</h3> -->
        </div>
        <div class="content-column half-bigger screen-height bg-white round-left mobile-display-full">
            <!-- Form using function updateAccount from AccountController -->
            <div class="content-column gap-h-5">
                <form id="accountForm" class="content-column gap-h-5" method="POST" enctype="multipart/form-data">
                    <h3 class="black">Konto</h3>
                    <div class="content-column gap-h-5">
                        <?php
                        echo '<img class="image-circle black profile" src="' . $_SESSION['profilePhoto'] . '" alt="Profilowe">';
                        ?>
                        <label id="input-settings-photo-label" class="content-flex button black hover-scale hide" disabled>
                            <input id="input-settings-photo" type="file" name="profilePhoto" class="hide" disabled>
                            Zmień zdjęcie
                        </label>
                    </div>
                    <div class="content-row content-beetwen relative">
                        <?php
                        echo '  <input id="input-settings-user" type="text" name="user" placeholder="' . $_SESSION['user'] . '" disabled>
                                    <span class="border black"></span>';
                        ?>
                    </div>
                    <div class="content-row content-beetwen relative">
                        <?php
                        echo '  <input id="input-settings-name" type="text" name="name" placeholder="' . $_SESSION['name'] . '" disabled>
                                    <span class="border black"></span>';
                        ?>
                    </div>
                    <div class="content-row content-beetwen relative">
                        <?php
                        echo '  <input id="input-settings-surname" type="text" name="surname" placeholder="' . $_SESSION['surname'] . '" disabled>
                                    <span class="border black"></span>';
                        ?>
                    </div>
                    <div class="content-row content-beetwen relative">
                        <?php
                        echo '  <input id="input-settings-email" type="email" name="email" placeholder="' . $_SESSION['email'] . '" disabled>
                                    <span class="border black"></span>';
                        ?>
                    </div>
                </form>
                <div class="content-row content-around" style="width: 350px;">
                    <button id="edit-button" class="black hover-scale">Edytuj</button>
                    <button id="save-button" class="black hover-scale hide" onclick="formAccept()">Zapisz</button>
                    <button id="cancel-button" class="cancel hover-scale hide" onclick="formReset()">Anuluj</button>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>

    <?php echo '<p id="user-id" hidden>' . $_SESSION["user_id"] . '</p>'; ?>
</body>
<script src="public/scripts/buttons.js"></script>
<script src="public/scripts/photoChange.js"></script>
<script>
    function formAccept() {
        var name = document.getElementById("input-settings-name").value;
        var surname = document.getElementById("input-settings-surname").value;
        var email = document.getElementById("input-settings-email").value;

        if (name == "") {
            name = document.getElementById("input-settings-name").placeholder;
        }
        if (surname == "") {
            surname = document.getElementById("input-settings-surname").placeholder;
        }
        if (email == "") {
            email = document.getElementById("input-settings-email").placeholder;
        }

        var formData = new FormData();
        formData.append("name", name);
        formData.append("surname", surname);
        formData.append("email", email);

        fetch('updateAccountForm', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });


        var photo = document.getElementById("input-settings-photo");
        var file = photo.files[0];
        console.log(file);

        if (photo.files.length != 0) {
            var formData = new FormData();
            formData.append("profilePhoto", photo.files[0]);

            fetch('addPhotoForm', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    location.reload();
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
    }

    function formReset() {
        var form = document.getElementById("accountForm");
        account.reset();
    }
</script>

</html>