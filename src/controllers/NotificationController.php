<?php

require_once 'src/controllers/AppController.php';
require_once 'src/repositories/FinalMeetingRepo.php';
require_once 'src/repositories/UserAcceptedRepo.php';

class NotificationController extends AppController {
    private $bookRepo;
    private $finalMeetingRepo;
    private $userAcceptedRepo;

    /**
     * NotificationController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->bookRepo = new BookRepo();
        $this->finalMeetingRepo = new FinalMeetingRepo();
        $this->userAcceptedRepo = new UserAcceptedRepo();
    }

    /**
     * @param int $user1_id
     * @param int $user2_id
     * @param string $date
     * @param string $start_time
     * @param string $room
     * @return void
     * 
     * Dodaje powiadomienie o spotkaniu dla uytkowników do bazy danych
     */
    public function sendNotification($book1_id, $book2_id, $date, $start_time, $room): void {
        $meeting_id = $this->finalMeetingRepo->getFinalMeetingId($book1_id, $book2_id, $date, $start_time, $room);

        $user1_id = $this->bookRepo->getBook($book1_id)['user_id'];
        $user2_id = $this->bookRepo->getBook($book2_id)['user_id'];

        $this->userAcceptedRepo->addUserAccepted($meeting_id, $user1_id, 0);
        $this->userAcceptedRepo->addUserAccepted($meeting_id, $user2_id, 0);
    }

    /**
     * @param int $$user_id
     * @return array
     * 
     * Zwraca tablicę z id spotkań, które są dostępne dla użytkownika
     */
    public function getUserNotifications($user_id): array {
        $meetingsArray = array();

        foreach ($this->userAcceptedRepo->getUserAccepted($user_id) as $notification) {
            array_push($meetingsArray, $notification['meeting_id']);
        }

        return $meetingsArray;
    }

    /**
     * @return array
     * 
     * Zwraca tablicę z aktywnymi spokatniami dla użytkownika
     */
    public function getUserActiveNotifications(): array {
        if (!isset($_SESSION['user_id'])) {
            exit();
        }

        $user_id = $_POST['user_id'];
        
        $meetingsArray = array();

        // Pobierz wszystkie spotkania, które są dostępne dla użytkownika
        $notifications = $this->userAcceptedRepo->getUserAccepted($user_id);

        foreach ($notifications as $notification) {
            if ($notification['answer'] == 0) {
                array_push($meetingsArray, $notification['meeting_id']);
            }
        }

        if (count($meetingsArray) == 0) {
            $response = [
                'status' => 'error',
                'message' => 'Brak powiadomień',
                'data' => null
            ];
        }
        else {
            $response = [
                'status' => 'success',
                'message' => 'Pobrano powiadomienia',
                'data' => $meetingsArray
            ];
        }

        echo json_encode($response);
        exit;
    }

    public function notificationAnswerForm() {
        if (!isset($_POST['meeting-id'])) {
            header('Location: /notificationCheck');
            exit();
        }

        $meetingId = intval($_POST['meeting-id']);
        $buttonAnswer = intval($_POST['button-answer']);

        if ($buttonAnswer == -1) {
            $this->userAcceptedRepo->deleteUserAccepted($meetingId);
            $this->finalMeetingRepo->deleteFinalMeeting($meetingId);
            $this->bookRepo->deleteBookingByUserId($_SESSION['user_id']);
            header('Location: /notificationCheck');
            exit();
        } 

        $this->userAcceptedRepo->updateUserAccepted($meetingId, $_SESSION['user_id'], true);

        header('Location: /notificationCheck');
        exit();
    }
}