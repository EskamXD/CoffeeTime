<?php

class User {
    private $id;
    private $email;
    private $password;
    private $login;
    private $name;
    private $surname;
    private $room_number;
    private $user_role;
    private $user_blocked;

    public function __construct(int $id, string $email, string $login, string $password, string $name, string $surname, int $room_number, string $user_role = 'user', bool $user_blocked = false) {
        $this->id = $id;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->room_number = $room_number;
        $this->user_role = $user_role;
        $this->user_blocked = $user_blocked;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getLogin(): string {
        return $this->login;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getRoomNumber(): int {
        return $this->room_number;
    }

    public function getUserRole(): string {
        return $this->user_role;
    }

    public function getUserBlocked(): bool {
        return $this->user_blocked;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }
    
    public function setLogin(string $login) {
        $this->login = $login;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setSurname(string $surname) {
        $this->surname = $surname;
    }

    public function setRoomNumber(int $room_number) {
        $this->room_number = $room_number;
    }

    public function setUserRole(string $user_role) {
        $this->user_role = $user_role;
    }

    public function setUserBlocked(bool $user_blocked) {
        $this->user_blocked = $user_blocked;
    }
}