<html>
<head>
    <!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#edc098">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Strona rejestracji CoffeeTime">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>CoffeeTime - Rejestracja</title>
    <link rel="icon" href="public/icons/webp_compressed/coffee-cup.webp">
</head>

<body>
    <!-- Top arrow -->
    <?php include 'public/views/top-arrow.php'; ?>
    <!-- Navbar -->
    <?php include 'public/views/navbar.php'; ?>
    <!-- Title content -->
    <main class="content-flex screen-height">
        <form id="register-form" class="content-column content-around screen-height-80" action="register" method="POST">
            <h1>Rejestracja</h1>
            <h3>
                <?php 
                    if(isset($messages)) {
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </h3>
            <div class="relative">
                <input type="text" name="login" placeholder="Login" required> 
                <span class="border"></span>
            </div>
            <div class="relative">
                <input type="password" id="password" name="password" placeholder="Hasło" required> 
                <span class="border"></span>
            </div>
            <div class="relative">
                <input type="password" id="password-check" name="password-check" placeholder="Powtórz hasło" required> 
                <span class="border"></span>
            </div>
            <p id="password-error" class="error-message"></p>
            <div class="relative">
                <input type="text" name="email" placeholder="Email" required> 
                <span class="border"></span>
            </div>
            <div class="relative">
                <input type="text" name="name" placeholder="Imię" required> 
                <span class="border"></span>
            </div>
            <div class="relative">
                <input type="text" name="surname" placeholder="Nazwisko" required> 
                <span class="border"></span>
            </div>
            <div class="relative">
                <input type="number" name="roomNumber" placeholder="Numer pokoju" required> 
                <span class="border"></span>
            </div>
            <button class="hover-scale" onclick="formSubmit()">Zarejestruj się</button>
        </form>
    </main>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Pobranie referencji do pól hasła
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('password-check');
            var passwordError = document.getElementById('password-error');

            // Dodanie zdarzeń do pól hasła
            passwordInput.addEventListener('input', validatePassword);
            confirmPasswordInput.addEventListener('input', validatePassword);

            function validatePassword() {
                var password = passwordInput.value;
                var confirmPassword = confirmPasswordInput.value;

                passwordError.textContent = 'Hasło musi ';

                // Sprawdzenie minimalnych wymogów bezpieczeństwa
                var isValid = true;
                if (password.length < 8) {
                    isValid = false;
                    passwordError.textContent += 'mieć co najmniej 8 znaków';
                } else {
                    passwordError.textContent = '';
                }
                if (!/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/\d/.test(password)) {
                    isValid = false;
                    passwordError.textContent += ', zawierać małą literę, dużą literę i cyfrę.';
                } else {
                    passwordError.textContent = '';
                }

                // Sprawdzenie, czy hasła się zgadzają
                if (isValid && password !== confirmPassword) {
                    isValid = false;
                    passwordError.textContent = 'Hasła nie są identyczne.';
                }

                // Wyświetlenie ewentualnych błędów
                if (isValid) {
                    passwordError.textContent = '';

                    // 
                }
            }
        });

        function formSubmit() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('password-check').value;

            // alert("działam");

            if (password !== confirmPassword) {
                alert('Hasła nie są identyczne!');
            } else {
                document.getElementsById('register-form').submit();
            }
        }
    </script>

</html>