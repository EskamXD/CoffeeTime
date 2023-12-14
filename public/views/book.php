<?php
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
        <form class="content-column gap-h-5" action="bookForm" method="POST">
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
                <input type="date" name="date" value="<?php echo date('Y-m-d');?>" required> 
                <span class="border"></span>
            </div>
            <!-- <div class="content-row content-beetwen">
                <div class="relative" style="width: 43%;"> 
                    <input type="text" name="time-from" id="time-from" value="<?php echo date('H:00'); ?>" pattern="^(0[0-9]|1[0-9]|2[0-3]):00" required>
                    <span class="border"></span>
                </div>
                <div class="relative" style="width: 43%;">
                    <input type="text" name="time-upto" id="time-upto" value="<?php echo date('H:00'); ?>" pattern="^(0[0-9]|1[0-9]|2[0-3]):00" required>
                    <span class="border"></span>
                </div>  
            </div> -->
            <div class="content-row content-beetwen">
                <div class="relative" style="width: 43%;"> 
                    <select name="hour-from" id="hour-from" required>
                        <?php
                        for ($i = 0; $i <= 23; $i++) {
                            $hour = sprintf("%02d", $i);
                            echo "<option value=\"$hour\">$hour:00</option>";
                        }
                        ?>
                    </select>
                    <span class="border"></span>
                </div>
                <div class="relative" style="width: 43%;">
                    <select name="hour-upto" id="hour-upto" required>
                        <?php
                        for ($i = 0; $i <= 23; $i++) {
                            $hour = sprintf("%02d", $i);
                            echo "<option value=\"$hour\">$hour:00</option>";
                        }
                        ?>
                    </select>
                    <span class="border"></span>
                </div>  
            </div>
            <div class="relative">
                <input type="text" name="room-number" placeholder="Numer pokoju" value="<?php echo $_SESSION['room_number'];?>" required>
                <span class="border"></span>
            </div>
            <div class="content-row content-around content-wrap">
                <label>Zapraszasz do siebie?</label>
                <div>
                    <input type="radio" name="room-preferences" id="radio-yes" value="1">
                    <label for="radio-yes">Tak</label>
                </div>
                <div>
                    <input type="radio" name="room-preferences" id="radio-no" value="0" checked>
                    <label for="radio-no">Nie</label>
                </div>
            </div>
            <button id="button" class="hover-scale">Umów się</button>
        </form>
    </main>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>
<script>
    // // JS do obsługi wybierania godzin
    // document.addEventListener('DOMContentLoaded', function () {
    //     // Funkcja, która usuwa zegar obok pola czasowego i ustawia atrybut type na text
    //     function removeTimePicker(elementId) {
    //         var timeInput = document.getElementById(elementId);
    //         timeInput.type = 'text';
    //         timeInput.step = '3600'; // Ustawienie kroku co jedną godzinę
    //         timeInput.addEventListener('input', validateTime); // Dodanie obsługi walidacji
    //     }

    //     // Funkcja do walidacji, czy godzina "upto" jest większa niż godzina "from"
    //     function validateTime() {
    //         var timeFrom = document.getElementById('time-from').value;
    //         var timeUpto = document.getElementById('time-upto').value;

    //         var isValid = isTimeValid(timeFrom, timeUpto);

    //         if (!isValid) {
    //             alert('Godzina "upto" musi być większa niż godzina "from".');
    //             // Tutaj możesz dodatkowo zablokować przycisk zapisywania lub podjąć inne działania
    //         }
    //     }

    //     // Funkcja do sprawdzania, czy godzina "upto" jest większa niż godzina "from"
    //     function isTimeValid(timeFrom, timeUpto) {
    //         var timeFromValue = new Date('2000-01-01T' + timeFrom + ':00').getTime();
    //         var timeUptoValue = new Date('2000-01-01T' + timeUpto + ':00').getTime();

    //         return timeUptoValue > timeFromValue;
    //     }

    //     // Usuwanie zegara obok pól czasowych
    //     removeTimePicker('time-from');
    //     removeTimePicker('time-upto');
    // });
</script>
</html>