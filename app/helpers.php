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
    if ($_SERVER['REQUEST_URI'] === $url) {
        return true;
    }

    return false;
}