<?php

require_once 'src/controllers/AppController.php';
require_once __DIR__.'/../models/Photo.php';

class PhotoController extends AppController {
    const MAX_FILE_SIZE = 1024 * 1024 * 20;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const PHOTO_PATH = 'public/uploads/';

    private $photoRepo;
    private string $photoName;

    public function __construct() {
        parent::__construct();
        $this->photoRepo = new PhotoRepo();
    }

    public function addPhotoController(array $photoData) {
        $photoData['name'] = $_SESSION['user_id'] . '.' . "jpg";
        $this->photoName = $photoData['name'];

        $targetFileLocation = self::PHOTO_PATH.basename($photoData["name"]);
       
        $uploadOk = $this->validate($photoData);

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == false) {
            echo "Sorry, your file was not uploaded.";
            return;
        }

        if (move_uploaded_file($photoData["tmp_name"], $targetFileLocation)) {
            echo "The file " . htmlspecialchars(basename($photoData["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            return;
        }
        
        $this->photoRepo->addPhoto($_SESSION['user_id'], $this->photoName);
    }

    private function validate(array $photoData): bool {
        if($photoData['size'] > self::MAX_FILE_SIZE) {
            return false;
        }

        if(!isset($photoData['type']) || !in_array($photoData['type'], self::SUPPORTED_TYPES)) {
            return false;
        }

        return true;
    }
}