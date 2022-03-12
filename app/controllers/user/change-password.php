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
    } else if ($password !== $password_confirm) {
        $error = 'Mật khẩu mới và mật khẩu xác nhận không khớp';
    } else if (strlen($password) < 6 || strlen($password) > 32) {
        $error = 'Mật khẩu phải có độ dài từ 6 đến 32 ký tự';
    } else if (password_verify($old_password, $user['password']) === false) {
        $error = 'Mật khẩu cũ không đúng';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = '$password' WHERE id = {$user['id']}";
        $db->query($query);
        $success = 'Đổi mật khẩu thành công';
    }
}

require_once '../../views/user/change-password.php';