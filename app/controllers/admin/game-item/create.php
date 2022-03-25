<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

define('PATH_ROOT', dirname(dirname(dirname(__DIR__))));

require_once PATH_ROOT . '/bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Thêm mới tài khoản game';

$categories = $db->select('categories', '*', [
    'type' => 'game',
    'status' => 1
]);

require_once PATH_ROOT . '/views/admin/game-item/create.php';
