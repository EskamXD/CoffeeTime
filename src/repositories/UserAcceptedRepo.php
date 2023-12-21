<?php 

require_once 'src/repositories/Repo.php';

class UserAcceptedRepo extends Repo {
    /**
     * @param $meeting_id
     * @param $user_id
     * @param $answer
     * @return void
     * 
     * Dodaje wpisy w bazie dla ospowiedzi użytkownika
     */
    public function addUserAccepted($meeting_id, $user_id, $answer): void {
        $sql = "INSERT INTO acceptance (meeting_id, user_id, answer) VALUES (:meeting_id, :user_id, :answer)";
        $params = array(
            ':meeting_id' => $meeting_id,
            ':user_id' => $user_id,
            ':answer' => $answer
        );

        $this->databaseController->execute($sql, $params);
    }

    /**
     * @param $meeting_id
     * @param $user_id
     * @return array
     * 
     * Pobiera odpowiedź użytkownika na spotkanie
     */
    public function getUserAccepted($user_id): array {
        $sql = "SELECT * FROM acceptance WHERE user_id = :user_id";
        $params = array(
            ':user_id' => $user_id
        );

        $stmt = $this->databaseController->execute($sql, $params);

        $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $notifications;
    }

    public function getUserAnswer($meeting_id, $user_id): int {
        $sql = "SELECT answer FROM acceptance WHERE meeting_id = :meeting_id AND user_id = :user_id";
        $params = array(
            ':meeting_id' => $meeting_id,
            ':user_id' => $user_id
        );

        $stmt = $this->databaseController->execute($sql, $params);

        $answer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $answer['answer'];
    }

    /**
     * @param $meeting_id
     * @param $user_id
     * @param $answer
     * @return void
     * 
     * Aktualizuje odpowiedź użytkownika na spotkanie
     */
    public function updateUserAccepted($meeting_id, $user_id, $answer): void {
        $sql = "UPDATE acceptance SET answer = :answer WHERE meeting_id = :meeting_id AND user_id = :user_id";
        $params = array(
            ':meeting_id' => $meeting_id,
            ':user_id' => $user_id,
            ':answer' => $answer
        );

        $this->databaseController->execute($sql, $params);
    }

    /**
     * @param $meeting_id
     * @return void
     * 
     * Usuwa odpowiedzi użytkowników na spotkanie
     */
    public function deleteUserAccepted($meeting_id): void {
        $sql = "DELETE FROM acceptance WHERE meeting_id = :meeting_id";
        $params = array(
            ':meeting_id' => $meeting_id,
        );

        $this->databaseController->execute($sql, $params);
    }
}