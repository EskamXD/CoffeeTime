<?php
if (!isset($_SESSION['user'])) {
    header("Location: /loginPage");
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
    <meta name="description" content="Miejsce w którym możesz umówić się na świetną kawę w świetnym towarzystwie">
    <meta name="author" content="Kamil Urbanowski">
    <meta name="keywords" content="kawiarnia, kawa, herbata, studenci, portfolio">

    <title>CoffeeTime - Umów się</title>
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

        var id = <?php echo $_SESSION['user_id']; ?>;

        var formData = new FormData();
        formData.append('user_id', id);

        var flag = true;
        var temp

        // Check if user has already booked a meeting in selected date and time
        temp = fetch('checkUserBookings', {
                method: 'POST',
                body: formData,
                credentials: 'include',
            })
            .then((response) => response.json())
            .then(data => {
                console.log(data);
                let flag = true;

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
                            break
                        } else if (selectedDateTime < currentDateTime) {
                            alert('Nie możesz umówić spotkania w przeszłości');
                            flag = false;
                            break
                        } else if (startTime >= endTime) {
                            alert('Godzina rozpoczęcia nie może być większa lub równa godzinie zakończenia');
                            flag = false;
                            break
                        }
                    }

                }

                if (flag == true) {
                    // alert('Braun na prezydenta');
                    return true;
                } else {
                    document.getElementById('bookForm').reset();
                    return false;
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        temp.then((result) => {
            // console.log(result);
            if (result == true) {
                formData = new FormData();
                formData.append('date', dateInput);
                formData.append('time-start', startTime);
                formData.append('time-end', endTime);
                formData.append('room-number', <?php echo $_SESSION['room_number']; ?>);
                formData.append('room-preferences', document.querySelector('input[name="room-preferences"]:checked').value);


                // Make a booking for the user
                temp = fetch('bookForm', {
                        method: 'POST',
                        body: formData,
                        credentials: 'include',
                    })
                    .then((response) => response.json())
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });

                formData = new FormData();
                formData.append('user_id', id);

                // If success, book a meeting for the user
                fetch('procesFinalMeeting', {
                        method: 'POST',
                        body: formData,
                        credentials: 'include',
                    })
                    .then((response) => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.status == 'sucess') {
                            alert('Umówiono spotkanie');
                            window.location.href = 'notifications';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }
        });
    }
</script>

</html>