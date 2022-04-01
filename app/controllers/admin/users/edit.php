<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

define('ROOT_PATH', dirname(__DIR__, 4));

require_once ROOT_PATH . '/app/bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Chỉnh sửa người dùng';

$id = cleanInput($_GET['id']);

$userEdit = $userClass->findById($id);

if (!$userEdit) require_once ROOT_PATH . '/app/controllers/errors/404.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = cleanInput($_POST['name']);
    $phone = cleanInput($_POST['phone']);
    $role = cleanInput($_POST['role']);
    $lock = cleanInput($_POST['lock']);
    $password = cleanInput($_POST['password']);
}

require_once ROOT_PATH . '/app/views/admin/users/edit.php';