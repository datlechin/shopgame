<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Bảng điều khiển';

$users = $db->count('users');
$charges = $db->count('charges');
$accounts = $db->count('accounts');

require_once '../../views/admin/dashboard.php';