<?php

require_once 'src/repositories/Repo.php';

class PhotoRepo extends Repo {
    public function addPhoto($userId, $photoName) {
        $sql = "INSERT INTO photos (user_id, photo_name) VALUES (:user_id, :photo_name)";
        $params = array(
            ':user_id' => $userId,
            ':photo_name' => $photoName,
        );

        $this->databaseController->execute($sql, $params); 
    }

    public function deletePhoto($photoId) {
        // Usunięcie zdjęcia o określonym $photoId.
        $sql = "DELETE FROM photos WHERE id = :photoId";
        $params = array(':photoId' => $photoId);

        $this->databaseController->execute($sql, $params);
    }

    public function getPhoto($userId) {
        // Pobranie wszystkich zdjęć użytkownika o określonym $user_id.
        $sql = "SELECT * FROM photos WHERE user_id = :userId";
        $params = array(':userId' => $userId);

        $stmt = $this->databaseController->execute($sql, $params);
        $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!$photos) {
            return null;
        }

        return $photos[0]['photo_name'];
    }
}