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

function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']);
}

function isCurrentUrl($url = ''): string
{
    if (str_contains($_SERVER['REQUEST_URI'], $url)) {
        return true;
    }

    return false;
}

function getUsernameById($id): string
{
    global $db;
    $result = $db->query("SELECT username FROM users WHERE id = $id");
    $user = $result->fetch_assoc();

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