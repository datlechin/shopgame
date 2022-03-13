<?php

class User
{
    private object $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findById($id): array|null
    {
        return $this->db->query("SELECT * FROM users WHERE id = '$id'")->fetch_assoc();
    }

    public function findByUsername($username): array|null
    {
        return $this->db->query("SELECT * FROM users WHERE username = '$username'")->fetch_assoc();
    }

    public function findByIdOrUsername($string): array|null
    {
        return $this->db->query("SELECT * FROM users WHERE id = '$string' OR username = '$string'")->fetch_assoc();
    }

    public function findAll(): array
    {
        $result = $this->db->query("SELECT * FROM users");
        $users = [];
        foreach ($result as $user) {
            $users[] = $user;
        }

        return $users;
    }
}