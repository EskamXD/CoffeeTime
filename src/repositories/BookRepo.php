<?php

require_once 'src/repositories/Repo.php';

class BookRepo extends Repo {
    public function addBooking($user_id, $date, $time_start, $time_end, $user_room, $room_preference, $usedFlag) {
        $sql = "INSERT INTO booking (user_id, date, time_start, time_end, user_room, room_preference, used_flag) VALUES (:user_id, :date, :time_start, :time_end, :user_room, :room_preference, :used_flag)";
        $params = array(
            ':user_id' => $user_id,
            ':date' => $date,
            ':time_start' => $time_start,
            ':time_end' => $time_end,
            ':user_room' => $user_room,
            ':room_preference' => $room_preference,
            ':used_flag' => $usedFlag
        );

        $this->databaseController->execute($sql, $params);
    }

    public function getBook($book_id) {
        $sql = "SELECT * FROM booking WHERE book_id = :book_id";
        $params = array(":book_id" => $book_id);

        $stmt = $this->databaseController->execute($sql, $params);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$book) {
            return null;
        }

        return $book;
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

    public function changeBookingStatus($book_id, $usedFlag) {
        $sql = "UPDATE booking SET used_flag = :used_flag WHERE book_id = :book_id";
        $params = array(
            ':book_id' => $book_id,
            ':used_flag' => $usedFlag
        );

        $this->databaseController->execute($sql, $params);
    }

    public function deleteBooking($book_id) {
        $sql = "DELETE FROM booking WHERE book_id = :book_id";
        $params = array(":book_id" => $book_id);

        $this->databaseController->execute($sql, $params);
    }

    public function deleteBookingByUserId($user_id) {
        $sql = "DELETE FROM booking WHERE user_id = :user_id";
        $params = array(":user_id" => $user_id);

        $this->databaseController->execute($sql, $params);
    }
}
