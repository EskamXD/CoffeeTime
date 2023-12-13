<?php

require_once 'src/controllers/AppController.php';
require_once __DIR__.'/../models/Photo.php';

class PhotoController extends AppController {
    const MAX_FILE_SIZE = 1024 * 1024 * 20;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];

    public function __construct() {
        parent::__construct();
    }

    public function addPhoto(array $photoData) {
        $targetDir = "uploads/"; // Create a folder named 'uploads' in your project directory
        $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        // Check if the file is an actual image or a fake image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = false;
        }
    
        // Check if file already exists
        $uploadOk = $this->validate($photoData);

    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == false) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    private function validate(array $file): bool {
        if($file['size'] > self::MAX_FILE_SIZE) {
            return false;
        }

        if(!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            return false;
        }

        return true;
    }

    public function getPhotoByUserId($databaseController, int $user_id) {
        $stmt = $databaseController->execute('SELECT * FROM photos WHERE user_id=:user_id', [':user_id' => $user_id]);
        $stmtStatus = $stmt->execute();

        if (!$stmtStatus) {
            $errorInfo = $stmt->errorInfo();
            // Display or log the error information for debugging
            echo "SQL Error | ";
            var_dump($errorInfo[2]);
            die();
        }

        $photo = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$photo) {
            return null;
        }

        return new Photo($photo['id'], $photo['user_id'], $photo['photo_name']);
    }
}