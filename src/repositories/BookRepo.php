<?php

require_once 'src/repositories/Repo.php';

class BookRepo extends Repo {
    public function addBooking($user_id, $date, $time_from, $time_upto, $user_room, $room_preference, $usedFlag) {
        $sql = "INSERT INTO booking (user_id, date, time_from, time_upto, user_room, room_preference, used_flag) VALUES (:user_id, :date, :time_from, :time_upto, :user_room, :room_preference, :used_flag)";
        $params = array(
            ':user_id' => $user_id,
            ':date' => $date,
            ':time_from' => $time_from,
            ':time_upto' => $time_upto,
            ':user_room' => $user_room,
            ':room_preference' => $room_preference,
            ':used_flag' => $usedFlag
        );

        $this->databaseController->execute($sql, $params);
    }

    public function getAllUserBookings($user_id) {
        $sql = "SELECT * FROM booking WHERE user_id = :user_id";
        $params = array(":user_id" => $user_id);
        
        $stmt = $this->databaseController->execute($sql, $params);
        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!$bookings) {
            return null;
        }

        return $bookings;
    }

    public function getAllNotUserBookings($user_id) {
        $sql = "SELECT * FROM booking WHERE user_id != :user_id";
        $params = array(":user_id" => $user_id);
        
        $stmt = $this->databaseController->execute($sql, $params);
        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!$bookings) {
            return null;
        }

        return $bookings;
    }
}
