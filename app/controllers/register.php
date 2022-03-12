<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../bootstrap.php';

if (isLoggedIn()) {
    redirect('/');
}

$title = 'Đăng ký';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = cleanInput($_POST['username']);
    $email = cleanInput($_POST['email']);
    $phone = cleanInput($_POST['phone']);
    $password = cleanInput($_POST['password']);
    $password_confirm = cleanInput($_POST['password_confirm']);

    if ($username === '') {
        $error = 'Tên đăng nhập không được để trống';
    } else if (strlen($username) < 4 || strlen($username) > 30) {
        $error = 'Tên đăng nhập phải từ 4 đến 30 ký tự';
    } else if ($email === '') {
        $error = 'Email không được để trống';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email không hợp lệ';
    } else if ($phone === '') {
        $error = 'Số điện thoại không được để trống';
    } else if (!preg_match('/^0[0-9]{9}$/', $phone)) {
        $error = 'Số điện thoại không hợp lệ';
    } else if ($password === '') {
        $error = 'Mật khẩu không được để trống';
    } else if ($password_confirm === '') {
        $error = 'Mật khẩu xác nhận không được để trống';
    } else if ($password !== $password_confirm) {
        $error = 'Mật khẩu xác nhận không trùng khớp';
    } else {
        $usernameExist = mysqli_num_rows($db->query("SELECT * FROM users WHERE username = '$username'"));
        $emailExist = mysqli_num_rows($db->query("SELECT * FROM users WHERE email = '$email'"));
        $phoneExist = mysqli_num_rows($db->query("SELECT * FROM users WHERE phone = '$phone'"));

        if ($usernameExist) {
            $error = 'Tên đăng nhập đã tồn tại';
        } else if ($emailExist) {
            $error = 'Email đã tồn tại';
        } else if ($phoneExist) {
            $error = 'Số điện thoại đã tồn tại';
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $db->query("INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')");
            redirect('/login');
        }
    }
}

require_once '../views/register.php';