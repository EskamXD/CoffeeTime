<?php

require_once 'src/controllers/AppController.php';
require_once 'src/controllers/NotificationController.php';

require_once 'src/repositories/BookRepo.php';
require_once 'src/repositories/FinalMeetingRepo.php';

class MatchController extends AppController
{

    private $notificationController;

    private $bookRepo;
    private $finalMeetingRepo;

    /**
     * MatchController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->notificationController = new NotificationController();

        $this->bookRepo = new BookRepo();
        $this->finalMeetingRepo = new FinalMeetingRepo();
    }

    /**
     * @param array $userBookings
     * @param array $notUserBookings
     * @return int|array
     * 
     * Zwraca tablicę z informacjami o spotkaniu, jeśli istnieje
     */
    public function findMatchingTimeSlot($userId): array
    {
        $userBookings = $this->bookRepo->getAllUserBookings($userId);
        $notUserBookings = $this->bookRepo->getAllNotUserBookings($userId);

        // var_dump($userBookings, $notUserBookings);
        if (empty($userBookings) || empty($notUserBookings)) {
            return array();
        }


        foreach ($userBookings as $userBooking) {

            if ($userBooking['used_flag'] == true) {
                continue;
            }
            // var_dump($userBooking);

            foreach ($notUserBookings as $notUserBooking) {

                if ($userBooking['used_flag'] == true) {
                    continue;
                }
                // var_dump($notUserBooking);

                $userStartDate = strtotime($userBooking['date'] . ' ' . $userBooking['time_start']);
                $userEndDate = strtotime($userBooking['date'] . ' ' . $userBooking['time_end']);

                $notUserStartDate = strtotime($notUserBooking['date'] . ' ' . $notUserBooking['time_start']);
                $notUserEndDate = strtotime($notUserBooking['date'] . ' ' . $notUserBooking['time_end']);

                if (
                    $userBooking['date'] == $notUserBooking['date'] &&
                    ($userStartDate <= $notUserEndDate && $userEndDate >= $notUserStartDate)
                ) {
                    $room1 = $userBooking['room_preference'];
                    $room2 = $notUserBooking['room_preference'];

                    if ($room1 === $room2) {
                        $chosenRoom = mt_rand(0, 1) == 0 ? $userBooking['user_room'] : $notUserBooking['user_room'];
                    } elseif ($room1 == 1) {
                        $chosenRoom = $userBooking['user_room'];
                    } else {
                        $chosenRoom = $notUserBooking['user_room'];
                    }

                    return [
                        'book1_id' => $userBooking['book_id'],
                        'book2_id' => $notUserBooking['book_id'],
                        'date' => $userBooking['date'],
                        'start_time' => gmdate('H:i', max($userStartDate, $notUserStartDate)),
                        'room' => $chosenRoom
                    ];
                }
            }
        }

        return [];
    }

    /**
     * @param array $matchArray
     * @return void
     * 
     * Dodaje spotkanie do bazy danych i wysyła powiadomienie
     */
    public function procesFinalMeeting()
    {
        $userId = $_POST['user_id'];
        
        // Find new meeting for opposite user
        $matchArray = self::findMatchingTimeSlot($userId);

        if (empty($matchArray)) {
            $response = [
                'status' => 'success',
                'message' => 'MatchController->procesFinalMeeting(): Nie znaleziono nowego spotkania ale umówiono spotkanie!',
                'data' => null
            ];
            echo json_encode($response);
            exit();
        }

        $this->finalMeetingRepo->addFinalMeeting($matchArray['book1_id'], $matchArray['book2_id'], $matchArray['date'], $matchArray['start_time'], $matchArray['room']);

        $this->bookRepo->changeBookingStatus($matchArray['book1_id'], 1);
        $this->bookRepo->changeBookingStatus($matchArray['book2_id'], 1);

        $this->notificationController->sendNotification($matchArray['book1_id'], $matchArray['book2_id'], $matchArray['date'], $matchArray['start_time'], $matchArray['room']);

        $response = [
            'status' => 'success',
            'message' => 'MatchController->procesFinalMeeting(): Umówiono spotkanie!',
            'data' => null
        ];

        echo json_encode($response);
        exit();
    }
}
