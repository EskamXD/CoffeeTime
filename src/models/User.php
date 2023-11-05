<?php

class User {
    private $id;
    private $email;
    private $password;
    private $login;
    private $name;
    private $surname;

    public function __construct(int $id, string $email, string $password, string $login, string $name, string $surname) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->login = $login;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getLogin(): string {
        return $this->login;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setLogin(string $login) {
        $this->login = $login;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setSurname(string $surname) {
        $this->surname = $surname;
    }
}