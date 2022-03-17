<?php

use JetBrains\PhpStorm\NoReturn;

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

#[NoReturn]
function redirect($url) {
    header('Location: ' . $url);
    exit();
}

function cleanInput($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function isCurrentUrl($url = ''): string
{
    if ($_SERVER['REQUEST_URI'] == $url) {
        return true;
    }

    return false;
}

function getUsernameById($id): string
{
    global $db;
    $user = $db->select('users', ['username'], ['id' => $id])[0];

    return $user['username'];
}

function getTradeName($trade): string
{
    return match ($trade) {
        'charge' => 'Nạp thẻ',
        'transfer' => 'Chuyển tiền',
        'receive' => 'Nhận tiền',
        'withdraw' => 'Rút tiền',
        'add_money' => 'Cộng tiền',
        'sub_money' => 'Trừ tiền',
        'refund' => 'Hoàn tiền',
    };
}

function getTradeType($trade): int
{
    return match ($trade) {
        'charge', 'add_money', 'receive', 'refund' => 1,
        'transfer', 'sub_money', 'withdraw' => 0,
    };
}

function emailValidate($email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function phoneValidate($phone): bool
{
    return preg_match('/^0[0-9]{9}$/', $phone);
}

function redirectIfNotLoggedIn()
{
    global $userClass;

    if (!$userClass->isLoggedIn()) {
        redirect('login');
    }
}

function bcrypt($password): string
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function roleName($role): string
{
    return match ($role) {
        'admin' => 'Quản trị viên',
        'user' => 'Người dùng',
        default => 'Không xác định',
    };
}

function isBanned($id): bool
{
    global $db;
    $user = $db->select('users', ['ban'], ['id' => $id])[0];

    return $user['ban'] == 1;
}

function now(): string
{
    return date('Y-m-d H:i:s');
}