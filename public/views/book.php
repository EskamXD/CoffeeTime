<?php
if (!isset($_SESSION['user'])) {
    header("Location: /loginPage");
}

require_once 'src/controllers/BookingController.php';
$bookingController = new BookingController();
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
        <div class="content-column gap-h-5">
            <form id="bookForm" class="content-column gap-h-5" action="bookForm" method="POST">
                <h1>
                    <?php
                    if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </h1>
                <div class="relative">
                    <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required>
                    <span class="border"></span>
                </div>
                <div class="content-row content-beetwen">
                    <div class="relative" style="width: 43%;">
                        <select name="time-start" id="time-start" required>
                            <?php
                            for ($i = 0; $i <= 23; $i++) {
                                $hour = sprintf("%02d", $i);
                                $currentHour = (date('H') + 2) % 24;


                                $selected = '';
                                if ($hour == $currentHour) {
                                    $selected = 'selected="selected"';
                                }

                                echo "<option value=\"$hour\" $selected>$hour:00</option>";
                            }
                            ?>
                        </select>
                        <span class="border"></span>
                    </div>
                    <div class="relative" style="width: 43%;">
                        <select name="time-end" id="time-end" required>
                            <?php
                            for ($i = 0; $i <= 23; $i++) {
                                $hour = sprintf("%02d", $i);
                                $currentHour = (date('H') + 3) % 24;

                                $selected = '';
                                if ($hour == $currentHour) {
                                    $selected = 'selected="selected"';
                                }

                                echo "<option value=\"$hour\" $selected>$hour:00</option>";
                            }
                            ?>
                        </select>
                        <span class="border"></span>
                    </div>
                </div>
                <div class="relative">
                    <input type="text" name="room-number" placeholder="Numer pokoju" value="<?php echo $_SESSION['room_number']; ?>" required>
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
            </form>
            <button class="hover-scale" onclick="validateForm()">Umów się</button>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'public/views/footer.php'; ?>
</body>
<script>
    function validateForm() {
        var dateInput = document.getElementById('date').value;
        var startTime = document.getElementById('time-start').value;
        var endTime = document.getElementById('time-end').value;

        var selectedDateTime = new Date(dateInput + 'T' + startTime + ':00:00');
        var currentDateTime = new Date();

        var formData = new FormData();
        var id = <?php echo $_SESSION['user_id']; ?>;
        formData.append('user_id', id);

        fetch('checkUserBookings', {
                method: 'POST',
                body: formData,
                credentials: 'include',
            })
            .then((response) => response.json())
            .then(data => {
                console.log(data);
                var flag = true;

                if (data.status != 'error') {
                    var userBookings = data.data;
                    var userStartDate;
                    var userEndDate;
                    var userStartDateTime;
                    var userEndDateTime;

                    for (var i = 0; i < userBookings.length; i++) {
                        userStartDate = new Date(userBookings[i].date + 'T' + userBookings[i].time_start);
                        userEndDate = new Date(userBookings[i].date + 'T' + userBookings[i].time_end);

                        if (selectedDateTime >= userStartDate && selectedDateTime <= userEndDate) {
                            alert('Masz już umówione spotkanie w tym terminie. Wybierz inną datę i godzinę');
                            flag = false;
                            document.getElementById('bookForm').reset();
                            return;
                        } else if (selectedDateTime < currentDateTime) {
                            alert('Nie możesz umówić spotkania w przeszłości');
                            flag = false;
                            document.getElementById('bookForm').reset();
                            return;
                        } else if (startTime >= endTime) {
                            alert('Godzina rozpoczęcia nie może być większa lub równa godzinie zakończenia');
                            flag = false;
                            document.getElementById('bookForm').reset();
                            return;
                        }
                    }

                }
                
                if (flag == true) {
                    alert('Braun na prezydenta');
                    document.getElementById('bookForm').submit();
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
</script>

</html>