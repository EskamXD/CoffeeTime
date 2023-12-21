<?php

require_once 'src/controllers/AppController.php';

require_once 'src/repositories/BookRepo.php';
require_once 'src/repositories/FinalMeetingRepo.php';
require_once 'src/repositories/UserAcceptedRepo.php';

class BookingController extends AppController
{

    private $bookRepo;
    private $finalMeetingRepo;
    private $userAcceptedRepo;

    /**
     * BookingController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->bookRepo = new BookRepo();
        $this->finalMeetingRepo = new FinalMeetingRepo();
        $this->userAcceptedRepo = new UserAcceptedRepo();
    }

    /**
     * @return array
     * 
     * Pobiera wszystkie bookingi użytkownika
     */
    public function checkUserBookings(): array
    {
        if (!isset($_SESSION['user_id'])) {
            exit();
        }

        $user_id = $_POST['user_id'];

        $userBookings = $this->bookRepo->getAllUserBookings($user_id);

        if (empty($userBookings)) {
            $response = [
                'status' => 'error',
                'message' => 'Brak bookingow dla tego użytkownika',
                'data' => null
            ];
        } else {
            $response = [
                'status' => 'success',
                'message' => 'BookingController->checkUserBookings(): Pobrano bookingi użytkownika',
                'data' => $userBookings
            ];
        }

        echo json_encode($response);
        exit;
    }

    /**
     * @return void
     * 
     * Obsługuje formularz do umawiania spotkań
     */
    public function bookForm(): void {
        $timeStart = gmdate($_POST['time-start'].':00');
        $timeEnd = gmdate($_POST['time-end'].':00');

        $this->bookRepo->addBooking($_SESSION['user_id'], $_POST['date'], $timeStart, $timeEnd, $_POST['room-number'], intval($_POST['room-preferences']), 0);

        $response = [
            'status' => 'success',
            'message' => 'BookingController->bookForm(): Umówiono spotkanie',
            'data' => null
        ];

        echo json_encode($response);
    }

    /**
     * @param array $book
     * @return void
     * 
     * Umawia spotkanie ponownie 
     */
    public function bookAgain(): void {
        if ($this->isPost()) {
            $meetingId = $_POST['meeting_id'];

            $meeting = $this->finalMeetingRepo->getMeetingAndUsers($meetingId);
            
            // Change booking status for opposite user
            $currentUserId = $_SESSION['user_id'];
            $oppositeUser = $meeting['user1_id'] == $currentUserId ? $meeting['user2_id'] : $meeting['user1_id']; 
            $oppositeBook = $meeting['user1_id'] == $currentUserId ? $meeting['book2_id'] : $meeting['book1_id'];

            $this->bookRepo->changeBookingStatus($oppositeBook, 0);

            // Delete final meeting and user bookings
            $this->userAcceptedRepo->deleteUserAccepted($meetingId);
            $this->finalMeetingRepo->deleteFinalMeeting($meetingId);
            $this->bookRepo->deleteBookingByUserId($currentUserId);


            $response = [
                'status' => 'success',
                'message' => 'BookingController->bookAgain(): Przebookowano spotkanie',
                'data' => $oppositeUser
            ];

            echo json_encode($response);
        }
    }
}
