<?php 

class Book {
    private $book_id;
    private $user_id;
    private $date;
    private $time_from;
    private $time_upto;
    private $user_room;
    private $room_preference;
    private $used_flag;

    public function __construct(int $book_id, int $user_id, string $date, string $time_from, string $time_upto, string $user_room, string $room_preference, int $used_flag) {
        $this->book_id = $book_id;
        $this->user_id = $user_id;
        $this->date = $date;
        $this->time_from = $time_from;
        $this->time_upto = $time_upto;
        $this->user_room = $user_room;
        $this->room_preference = $room_preference;
        $this->used_flag = $used_flag;
    }

    public function getBookId() {
        return $this->book_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTimeFrom() {
        return $this->time_from;
    }

    public function getTimeUpto() {
        return $this->time_upto;
    }

    public function getUserRoom() {
        return $this->user_room;
    }

    public function getRoomPreference() {
        return $this->room_preference;
    }

    public function getUsedFlag() {
        return $this->used_flag;
    }

    public function setBookId(int $book_id) {
        $this->book_id = $book_id;
    }

    public function setUserId(int $user_id) {
        $this->user_id = $user_id;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }

    public function setTimeFrom(string $time_from) {
        $this->time_from = $time_from;
    }

    public function setTimeUpto(string $time_upto) {
        $this->time_upto = $time_upto;
    }

    public function setUserRoom(string $user_room) {
        $this->user_room = $user_room;
    }

    public function setRoomPreference(string $room_preference) {
        $this->room_preference = $room_preference;
    }

    public function setUsedFlag(int $used_flag) {
        $this->used_flag = $used_flag;
    }
}