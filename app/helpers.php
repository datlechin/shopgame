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
        case '1':
            return 'Nạp thẻ';
        case '2':
            return 'Chuyển tiền';
        case '3':
            return 'Nhận tiền';
        case '4':
            return 'Rút tiền';
        case '5':
            return 'Cộng tiền';
        case '6':
            return 'Trừ tiền';
        case '7':
            return 'Hoàn tiền';
        default:
            return 'Không xác định';
    }
}

function getTradeType($trade): ?string
{
    switch ($trade) {
        case '1':
        case '3':
        case '5':
        case '7':
            return 'plus';
        case '2':
        case '4':
        case '6':
            return 'minus';
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

function categoryName($category_id): string
{
    global $db;

    return $db->select('categories', ['name'], ['id' => $category_id])[0]['name'];
}

function str_limit(string $string, int $limit): string
{
    if (strlen($string) > $limit) {
        $string = substr($string, 0, $limit);
        $string .= '...';
    }

    return $string;
}