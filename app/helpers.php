<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

function redirect($url): void
{
    header('Location: ' . $url);
    exit();
}

function cleanInput($data): string
{
    $data = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data);
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
    switch ($trade) {
        case 'charge':
            return 'Nạp thẻ';
        case 'transfer':
            return 'Chuyển tiền';
        case 'receive':
            return 'Nhận tiền';
        case 'withdraw':
            return 'Rút tiền';
        case 'add_money':
            return 'Cộng tiền';
        case 'sub_money':
            return 'Trừ tiền';
        case 'refund':
            return 'Hoàn tiền';
        default:
            return 'Không xác định';
    }
}

function getTradeType($trade): ?int
{
    switch ($trade) {
        case 'charge':
        case 'add_money':
        case 'receive':
        case 'refund':
            return 1;
        case 'transfer':
        case 'sub_money':
        case 'withdraw':
            return 0;
        default:
            return null;
    }
}

function emailValidate($email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function phoneValidate($phone): bool
{
    return preg_match('/^0\d{9}$/', $phone);
}

function redirectIfNotLoggedIn(): void
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
    switch ($role) {
        case 'admin':
            return 'Quản trị viên';
        case 'user':
            return 'Người dùng';
        default:
            return 'Không xác định';
    }
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

function chargeProvider($provider): string
{
    switch ($provider) {
        case 'CARDVIP':
            return 'Cardvip.vn';
        case 'TSR':
            return 'Thesieure.com';
        default:
            return 'Không xác định';
    }
}

function slug($string): string
{
    $string = strip_tags($string);
    $string = preg_replace('~[^\pL\d]+~u', '-', $string);
    setlocale(LC_ALL, 'en_US.utf8');
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
    $string = preg_replace('~[^-\w]+~', '', $string);
    $string = trim($string, '-');
    $string = preg_replace('~-+~', '-', $string);
    $string = strtolower($string);

    if (empty($string)) {
        return 'n-a';
    }

    return $string;
}

function setting($key): ?string
{
    global $db;
    $query = $db->select('settings', ['value'], ['key' => $key]);
    
    if (count($query) > 0) {
        return $query[0]['value'];
    }

    return null;
}

function responseJson($data): void
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}

function asset($path): string
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $path = $protocol . $host . '/' . $path;

    return $path;
}