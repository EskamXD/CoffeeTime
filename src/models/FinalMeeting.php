<?php 

class FinalMeeting {
    private $meeting_id;
    private $book1_id;
    private $book2_id;
    private $date;
    private $time;
    private $room;


    public function __construct($meeting_id, $book1_id, $book2_id, $date, $time, $room) {
        $this->meeting_id = $meeting_id;
        $this->book1_id = $book1_id;
        $this->book2_id = $book2_id;
        $this->date = $date;
        $this->time = $time;
        $this->room = $room;
    }

    public function getMeetingId() {
        return $this->meeting_id;
    }

    public function getBook1Id() {
        return $this->book1_id;
    }

    public function getBook2Id() {
        return $this->book2_id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTime() {
        return $this->time;
    }

    public function getRoom() {
        return $this->room;
    }

    public function setMeetingId($meeting_id) {
        $this->meeting_id = $meeting_id;
    }

    public function setBook1Id($book1_id) {
        $this->book1_id = $book1_id;
    }

    public function setBook2Id($book1_id) {
        $this->book1_id = $book1_id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function setRoom($room) {
        $this->room = $room;
    }

    public function __toString() {
        return $this->meeting_id . ' ' . $this->book1_id . ' ' . $this->book2_id . ' ' . $this->date . ' ' . $this->time . ' ' . $this->room;
    }
}