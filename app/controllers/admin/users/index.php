<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

use ShopGame\core\Pagination;

define('ROOT_PATH', dirname(__DIR__, 4));

require_once ROOT_PATH . '/app/bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Người dùng';

$count = $db->count('users');
$pagination = new Pagination([
    'totalCount' => $count,
]);

$users = $db->select('users', '*', [
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once ROOT_PATH . '/app/views/admin/users/index.php';