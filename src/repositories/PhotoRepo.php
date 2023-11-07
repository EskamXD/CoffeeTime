<?php

require_once 'src/repositories/Repo.php';

class PhotoRepo extends Repo {
    public function updatePhoto($userId, $photoName, $photoPath) {
        // Dodanie zdjęcia do bazy danych.
        $sql = "INSERT INTO photos (user_id, name, path) VALUES (:userId, :photoName, :photoPath)";
        $params = array(
            ':userId' => $userId,
            ':photoName' => $photoName,
            ':photoPath' => $photoPath
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
        // Pobranie wszystkich zdjęć użytkownika o określonym $userId.
        $sql = "SELECT * FROM photos WHERE user_id = :userId";
        $params = array(':userId' => $userId);

        $stmt = $this->db->execute($sql, $params);
        $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $photos;
    }
}