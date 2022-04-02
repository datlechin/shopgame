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
        case '8':
            return 'Mua tài khoản game';
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
        case '8':
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
        redirect(site_url('login'));
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

function slug($str,  $options = array()): string
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true,
    );
    $options = array_merge($defaults, $options);
    if ($options['lowercase']) {
        $str = mb_strtolower($str, 'UTF-8');
    }
    $char_map = array(
        // Latin
        'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'đ' => 'd', 'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);

    return $str;
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

function str_random($length = 10): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function site_url($path = ''): string
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $path = $protocol . $host . '/' . $path;

    return $path;
}

function selected($value, $selected): string
{
    if ($value == $selected) {
        return 'selected';
    }

    return '';
}
