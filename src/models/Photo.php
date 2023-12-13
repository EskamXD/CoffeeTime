<?php 

class Photo {
    private $id;
    private $user_id;
    private $photo_name;

    public function __construct(int $id, int $user_id, string $photo_name) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->photo_name = $photo_name;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function getPhotoName(): string {
        return $this->photo_name;
    }

    public function setUserId(int $user_id) {
        $this->user_id = $user_id;
    }

    public function setPhotoName(string $photo_name) {
        $this->photo_name = $photo_name;
    }
}