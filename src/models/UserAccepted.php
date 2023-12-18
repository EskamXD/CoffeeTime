<?php

class UserAccepted {
    private $meeting_id;
    private $user_id;
    private $answer;

    public function __construct($meeting_id, $user_id, $answer) {
        $this->meeting_id = $meeting_id;
        $this->user_id = $user_id;
        $this->answer = $answer;
    }

    public function getMeetingId() {
        return $this->meeting_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function setMeetingId($meeting_id) {
        $this->meeting_id = $meeting_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setAnswer($answer) {
        $this->answer = $answer;
    }
}