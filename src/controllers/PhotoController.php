<?php

require_once 'src/controllers/AppController.php';

require_once 'src/models/Photo.php';

class PhotoController extends AppController {
    const MAX_FILE_SIZE = 1024 * 1024 * 20;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const PHOTO_PATH = 'public/uploads/';

    private $photoRepo;
    private string $photoName;

    /**
     * PhotoController constructor.
     */
    public function __construct() {
        parent::__construct();
        
        $this->photoRepo = new PhotoRepo();
    }

    /**
     * @return void
     * 
     * Funkcja dodająca zdjęcie uzytkownika do bazy danych
     */
    public function addPhotoForm(): void {
        if ($this->isPost()) {
            // Jeśli przekazano plik, dodaj go do zdjęć
            if (!isset($_FILES['profilePhoto']) || $_FILES['profilePhoto']['error'] != 0) {
                echo 'Wystąpił błąd podczas przesyłania zdjęcia <br>';
                var_dump($_FILES['profilePhoto']['error']);
                die();
            } 

            $photoData = $_FILES['profilePhoto'];

            $_SESSION['profilePhoto'] = self::PHOTO_PATH.$this->photoRepo->getPhoto($_SESSION['user_id']);

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
            
            // Check if image is already in database
            if($this->photoRepo->getPhoto($_SESSION['user_id']) == null) {
                $this->photoRepo->addPhoto($_SESSION['user_id'], $this->photoName);
            }

            $response = [
                'status' => 'success',
                'message' => 'PhotoScontroller->addPhotoForm(): Zaktualizowano zdjęcie użytkownika',
                'data' => $photoData
            ];

            echo json_encode($response);
            exit;
        }
    }

    /**
     * @return void
     * 
     * Funkcja usuwająca zdjęcie użytkownika z bazy danych
     */
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