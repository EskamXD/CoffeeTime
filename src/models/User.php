<?php

class User {
    private $id;
    private $email;
    private $password;
    private $login;
    private $name;
    private $surname;

    public function __construct(int $id, string $email, string $login, string $password, string $name, string $surname) {
        // echo 'User constructor | ';
        // var_dump($id, $email, $login, $password, $name, $surname);
        // die();
        $this->id = $id;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getId(): int {
        // echo 'getId | ';
        // var_dump($this->id, (int)$this->id);
        // die();
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
}