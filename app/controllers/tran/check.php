<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

define('ROOT_PATH', dirname(__DIR__, 3));

require_once ROOT_PATH . '/app/bootstrap.php';

redirectIfNotLoggedIn();

$id = cleanInput($_GET['id']);

$account = $db->select('accounts', '*', [
    'id' => $id,
    'buyer_id' => $user['id'],
    'status' => 0
]);

if (count($account) > 0) {
    $account = $account[0];
    if ($account['checked_at'] == null) {
        $db->update('accounts', [
            'checked_at' => now(),
        ], ['id' => $account['id']]);
    }

    require_once ROOT_PATH . '/app/views/tran/check.php';
} else {
    require_once ROOT_PATH . '/app/controllers/errors/404.php';
}
