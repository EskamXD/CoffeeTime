<?php

require_once 'src/repositories/Repo.php';

class FinalMeetingRepo extends Repo {
    /**
     * @param int $user1_id
     * @param int $user2_id
     * @param string $date
     * @param string $time
     * @param string $room
     * @return void
     * 
     * Dodaje spotkanie do bazy danych
     */
    public function addFinalMeeting($book1_id, $book2_id, $date, $time, $room): void {
        $sql = "INSERT INTO meetings (book1_id, book2_id, date, time, room) VALUES (:book1_id, :book2_id, :date, :time, :room)";
        $params = array(
            ':book1_id' => $book1_id,
            ':book2_id' => $book2_id,
            ':date' => $date,
            ':time' => $time,
            ':room' => $room
        );

        $this->databaseController->execute($sql, $params);
    }
    
    /**
     * @param int $user1_id
     * @param int $user2_id
     * @param string $date
     * @param string $time
     * @param string $room
     * @return int
     * 
     * Zwraca id spotkania
     */
    public function getMeetingId($book1_id, $book2_id, $date, $time, $room): int {
        $sql = "SELECT meeting_id FROM meetings WHERE book1_id = :book1_id AND book2_id = :book2_id AND date = :date AND time = :time AND room = :room";
        $params = array(
            ':book1_id' => $book1_id,
            ':book2_id' => $book2_id,
            ':date' => $date,
            ':time' => $time,
            ':room' => $room
        );
    
        $stmt = $this->databaseController->execute($sql, $params);
    
        $meeting_id = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$meeting_id) {
            return -1;
        }

        return $meeting_id['meeting_id'];        
    }

    /**
     * @param int $meeting_id
     * @return array
     * 
     * Zwraca spotkanie o podanym id
     */
    public function getMeeting($meeting_id): array {
        $sql = "SELECT * FROM meetings WHERE meeting_id = :meeting_id";
        $params = array(
            ':meeting_id' => $meeting_id
        );

        $stmt = $this->databaseController->execute($sql, $params);

        $meeting = $stmt->fetch(PDO::FETCH_ASSOC);

        return $meeting;
    }

    public function getMeetingAndUsers($meeting_id): array {
        $sql = 'SELECT * FROM public."finalMeetingView" WHERE meeting_id = :meeting_id';
        $params = array(
            ':meeting_id' => $meeting_id
        );

        $stmt = $this->databaseController->execute($sql, $params);

        $meeting = $stmt->fetch(PDO::FETCH_ASSOC);

        return $meeting;
    }

    /**
     * @param int $user_id
     * @return array
     * 
     * Usuwa spotkanie o podanym id
     */
    public function deleteFinalMeeting($meeting_id): void {
        $sql = "DELETE FROM meetings WHERE meeting_id = :meeting_id";
        $params = array(
            ':meeting_id' => $meeting_id
        );

        $this->databaseController->execute($sql, $params);
    }
}
