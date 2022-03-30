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

    public function updateBalance($id, int $money, string $type, string $description)
    {
        $user = $this->findById($id);
        $tradeType = null;
        $userBalance = null;

        if ($type == 1) {
            $tradeType = 5;
            $userBalance = $user['balance'] + $money;
        } else if ($type == 2) {
            $tradeType = 6;
            $userBalance = $user['balance'] - $money;
        } else if ($type == 3) {
            $tradeType = 7;
            $userBalance = $user['balance'] + $money;
        }

        $this->db->insert('transactions', [
            'user_id' => $user['id'],
            'trade_type' => $tradeType,
            'amount' => $money,
            'balance' => $userBalance,
            'description' => $description,
            'status' => 1
        ]);

        $this->db->update('users', ['balance' => $userBalance], ['id' => $user['id']]);
    }

    public function findByEmail(?string $email)
    {
        return $this->db->select('users', '*', ['email' => $email])[0] ?? null;
    }
}