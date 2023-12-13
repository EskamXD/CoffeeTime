<?php

require_once 'src/repositories/Repo.php';

class PhotoRepo extends Repo {
    public function updatePhoto($userId, $photo_name) {
        // Dodanie zdjęcia do bazy danych.
        $sql = "INSERT INTO photos (user_id, name) VALUES (:userId, :photo_name)";
        $params = array(
            ':userId' => $userId,
            ':photo_name' => $photo_name,
        );

        $this->db->execute($sql, $params);
    }

    public function deletePhoto($photoId) {
        // Usunięcie zdjęcia o określonym $photoId.
        $sql = "DELETE FROM photos WHERE id = :photoId";
        $params = array(':photoId' => $photoId);

        $this->db->execute($sql, $params);
    }

    public function getPhotos($userId) {
        // Pobranie wszystkich zdjęć użytkownika o określonym $user_id.
        $sql = "SELECT * FROM photos WHERE user_id = :userId";
        $params = array(':userId' => $userId);

        $stmt = $this->db->execute($sql, $params);
        $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $photos;
    }
}