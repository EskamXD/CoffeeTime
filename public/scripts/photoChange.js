document.addEventListener('DOMContentLoaded', function () {
    var cancelButton = document.getElementById('cancel-button');
    var photoInput = document.getElementById('input-settings-photo');
    var profileImage = document.querySelector('.profile');
    
    // Dodaj obsługę zdarzenia po wybraniu nowego zdjęcia
    photoInput.addEventListener('change', function () {
        var file = photoInput.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // Aktualizuj podgląd zdjęcia przed wysłaniem formularza
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Dodaj obsługę zdarzenia po kliknięciu przycisku Anuluj
    cancelButton.addEventListener('click', function () {
        // Przywróć domyślne zdjęcie profilowe
        console.log(document.getElementById('user-id').innerText);
        profileImage.src = "public/uploads/" + document.getElementById('user-id').innerText + '.jpg';
    });
});