<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../bootstrap.php';

if ($userClass->isLoggedIn()) {
    redirect('/');
}

$title = 'Đăng nhập';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);

    if ($username === '') {
        $error = 'Vui lòng nhập tên đăng nhập';
    } else {
        $user = $userClass->findByAny($username);

        if ($user !== null && password_verify($password, $user['password']) === true) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /');
        } else {
            $error = 'Tên đăng nhập hoặc mật khẩu không đúng';
        }
    }
}

require_once '../views/login.php';
