<?php 

require_once 'src/controllers/AppController.php';
require_once __DIR__.'/../models/Photo.php';

class MatchController extends AppController {

    public function findMatchingTimeSlot($userBookings, $notUserBookings) {
        foreach ($userBookings as $userBooking) {
            foreach ($notUserBookings as $notUserBooking) {
                // var_dump($userBooking);
                // var_dump($notUserBooking);
                // die();
                $userStartDate = strtotime($userBooking['date'] . ' ' . $userBooking['time_from']);
                $userEndDate = strtotime($userBooking['date'] . ' ' . $userBooking['time_upto']);
    
                $notUserStartDate = strtotime($notUserBooking['date'] . ' ' . $notUserBooking['time_from']);
                $notUserEndDate = strtotime($notUserBooking['date'] . ' ' . $notUserBooking['time_upto']);
    
                // Check for overlapping date and time ranges
                if (
                    $userBooking['date'] == $notUserBooking['date'] &&
                    ($userStartDate <= $notUserEndDate && $userEndDate >= $notUserStartDate)
                ) {
                    // Zwracamy informacje o godzinie, dacie i użytkownikach
                    return [
                        'date' => $userBooking['date'],
                        'start_time' => gmdate('H:i', max($userStartDate, $notUserStartDate)),
                        'end_time' => gmdate('H:i', min($userEndDate, $notUserEndDate)),
                        'user1_id' => $userBooking['user_id'],
                        'user2_id' => $notUserBooking['user_id'],
                    ];
                }
            }
        }
    
        return null; // Brak matcha
    }    

    public function addFinalMeeting($matchArray) {
        
    }
}    