<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

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

    public function usernameExists($username): bool
    {
        $result = $this->db->query("SELECT * FROM users WHERE username = '$username'");
        return $result->num_rows > 0;
    }

    public function emailExists($email): bool
    {
        $result = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        return $result->num_rows > 0;
    }

    public function phoneExists($phone): bool
    {
        $result = $this->db->query("SELECT * FROM users WHERE phone = '$phone'");
        return $result->num_rows > 0;
    }

    public function isLoggedIn(): bool
    {
        if (isset($_SESSION['user_id'])) {
            $user = $this->findById($_SESSION['user_id']);
            if ($user) {
                return true;
            }
        }
        return false;
    }
}