<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

namespace ShopGame\core;

class User
{
    private object $db;
    private ?string $user_id;

    public function __construct(Medoo $db)
    {
        $this->db = $db;
        $this->user_id = $_SESSION['user_id'] ?? null;
    }

    public function findById($id): ?array
    {
        return $this->db->select('users', '*', ['id' => $id])[0] ?? null;
    }

    public function findByUsername($username): ?array
    {
        return $this->db->select('users', '*', ['username' => $username])[0] ?? null;
    }

    public function findByAny($string): ?array
    {
        return $this->db->select('users', '*', ['OR' => ['username' => $string, 'email' => $string, 'phone' => $string]])[0] ?? null;
    }

    public function findByIdOrUsername($string): ?array
    {
        return $this->db->select('users', '*', ['OR' => ['id' => $string, 'username' => $string]])[0] ?? null;
    }

    public function usernameExists($username): bool
    {
        return $this->db->has('users', ['username' => $username]);
    }

    public function emailExists($email): bool
    {
        return $this->db->has('users', ['email' => $email]);
    }

    public function phoneExists($phone): bool
    {
        return $this->db->has('users', ['phone' => $phone]);
    }

    public function isLoggedIn(): bool
    {
        return isset($this->user_id) && $this->db->has('users', ['id' => $this->user_id]);
    }

    public function isAdmin(): bool
    {
        return $this->isLoggedIn() && $this->db->has('users', ['id' => $this->user_id, 'role' => 'admin']);
    }
}