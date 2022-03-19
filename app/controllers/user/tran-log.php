<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

use ShopGame\core\Pagination;

require_once '../../bootstrap.php';

redirectIfNotLoggedIn();

$title = 'Lịch sử giao dịch';

$count = $db->count('transactions', [
    'user_id' => $user['id']
]);

try {
    $pagination = new Pagination([
        'totalCount' => $count,
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

$transactions = $db->select('transactions', '*', [
    'user_id' => $user['id'],
    'ORDER' => ['id' => 'DESC'],
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once '../../views/user/tran-log.php';