document.addEventListener('DOMContentLoaded', () => {
    // Wywołaj funkcję sprawdzającą ilość aktywnych spotkań przy załadowaniu strony
    checkActiveMeetings();

    // Następnie co jakiś czas ponownie sprawdzaj (na przykład co minutę)
    setInterval(checkActiveMeetings, 60000); // 60000 milisekund = 1 minuta
});

function checkActiveMeetings() {
    // Zapytaj serwer o ilość aktywnych spotkań
    var formData = new FormData();
    var id = document.getElementById('user-id-to-take').innerText;
    formData.append('user_id', id);

    fetch('getUserActiveNotifications', {
        method: 'POST',
        body: formData,
        credentials: 'include',
    })
    .then((response) => response.json())
    .then(data => {
        // Aktualizuj widok na podstawie otrzymanych danych
        // console.log("wartość data " + data.status);
        if (data.status != "error") {
            updateNotificationCount(data.data.length);
        }
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}

function updateNotificationCount(count) {
    console.log('updateNotificationCount', count);
    const notificationNumber = document.getElementById('notification-number');  
    if (count > 0) {
        notificationNumber.innerText = count;
        notificationNumber.classList.remove('hide');
    }
}
