<?php

require_once 'src/controllers/AppController.php';
require_once 'src/repositories/BookRepo.php';

class BookingController extends AppController
{
    private $bookRepo;

    /**
     * BookingController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->bookRepo = new BookRepo();
    }

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
                'message' => 'Brak powiadomień',
                'data' => null
            ];
        } else {
            $response = [
                'status' => 'success',
                'message' => 'Pobrano powiadomienia',
                'data' => $userBookings
            ];
        }

        echo json_encode($response);
        exit;
    }
}
