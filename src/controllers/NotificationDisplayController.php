<?php

const PHOTO_PATH = 'public/uploads/';

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION['user'])) {
    header("Location: /loginPage");
    exit; // Przerwij dalsze wykonywanie kodu, jeśli użytkownik nie jest zalogowany
}

require_once 'src/controllers/AppController.php';
require_once 'src/controllers/NotificationController.php';
require_once 'src/repositories/FinalMeetingRepo.php';
require_once 'src/repositories/UserRepo.php';
require_once 'src/repositories/PhotoRepo.php';

class NotificationDisplayController extends AppController
{
    /**
     * @return void
     * 
     * Przygotowuje dane do wyświetlenia na stronie
     */
    public static function prepareToDisplay(): void {
        $appController = new AppController();
        $notificationController = new NotificationController();

        $bookRepo = new BookRepo();
        $finalMeetingRepo = new FinalMeetingRepo();
        $photoRepo = new PhotoRepo();
        $userRepo = new UserRepo();

        // Pobierz powiadomienia użytkownika
        $meetingsArray = $notificationController->getUserNotifications($_SESSION['user_id']);

        // Pobierz szczegółowe informacje o spotkaniach
        $meetings = [];
        foreach ($meetingsArray as $meeting_id) {
            $meetings[] = $finalMeetingRepo->getFinalMeeting($meeting_id);
        }

        // Pobierz informacje o użytkownikach
        $notifications = [];

        foreach ($meetings as $meeting) {
            $user1_id = $bookRepo->getBook($meeting['book1_id'])['user_id'];
            $user2_id = $bookRepo->getBook($meeting['book2_id'])['user_id'];

            $user_id = ($user1_id == $_SESSION['user_id']) ? $user2_id : $user1_id;

            $user = $userRepo->getUser($user_id);

            $userInfo = [
                'meeting_id' => $meeting['meeting_id'],
                'user' => $user->getName() . ' ' . $user->getSurname(),
                'photo' => $photoRepo->getPhoto($user->getId()),
                'date' => $meeting['date'],
                'start_time' => $meeting['time'],
                'room' => $meeting['room']
            ];

            $notifications[] = $userInfo;
        }

        // var_dump($notifications);
        // echo '<br>';

        $appController->render('notification', ['notifications' => $notifications]);
    }
}