<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

session_start();
ob_start();

require_once 'config.php';
require_once 'helpers.php';
require_once 'core/User.php';

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$userClass = new User($db);

if ($userClass->isLoggedIn()) {
    $user_id = cleanInput($_SESSION['user_id']);
    $user = $userClass->findById($user_id);
}