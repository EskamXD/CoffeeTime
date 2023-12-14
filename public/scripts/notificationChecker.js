const eventSource = new EventSource('/src/controllers/MatchController.php');

eventSource.addEventListener('message', (event) => {
    const data = JSON.parse(event.data);
    console.log("cos tu działa?");
    // Aktualizuj widok lub wyświetl powiadomienie
});
