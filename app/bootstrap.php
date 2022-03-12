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

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isLoggedIn()) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        header('Location: /logout');
    }
}