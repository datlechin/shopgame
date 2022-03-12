<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../../bootstrap.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_password = cleanInput($_POST['old_password']);
    $password = cleanInput($_POST['password']);
    $password_confirm = cleanInput($_POST['password_confirm']);

    if ($old_password === '') {
        $error = 'Vui lòng nhập mật khẩu cũ';
    } else if ($password === '') {
        $error = 'Vui lòng nhập mật khẩu mới';
    } else if ($password_confirm === '') {
        $error = 'Vui lòng nhập lại mật khẩu mới';
    }
}
require_once '../../views/user/change-password.php';