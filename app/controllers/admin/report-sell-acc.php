<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

use ShopGame\core\Pagination;

define('ROOT_PATH', dirname(__DIR__, 3));

require_once ROOT_PATH . '/app/bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Lịch sử bán nick';

$count = $db->count('accounts', ['status' => 0]);
$pagination = new Pagination([
    'totalCount' => $count,
]);

$accounts = $db->select('accounts', '*', [
    'status' => 0,
    'ORDER' => ['id' => 'DESC'],
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once ROOT_PATH . '/app/views/admin/report-sell.acc.php';