<?php

require_once 'src/controllers/AppController.php';

class PhotoController extends AppController {
    const MAX_FILE_SIZE = 25*1048576;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];

    public function addPhoto(array $photoData) {
        if (is_uploaded_file($photoData['tmp_name']) && $this->validate($photoData)) {
            
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
}