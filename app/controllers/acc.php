<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

define('ROOT_PATH', dirname(__DIR__, 2));

require_once ROOT_PATH . '/app/bootstrap.php';

$id = cleanInput($_GET['id']);
$account = $db->select('accounts', '*', [
    'id' => $id,
    'OR' => [
        'status' => 1,
        'OR' => [
            'status' => 0
        ]
    ]
]);


if (count($account) < 1) require_once ROOT_PATH . '/app/controllers/errors/404.php';

$account = $account[0];
$title = categoryName($account['category_id']) . ' - ' . $account['id'];

require_once ROOT_PATH . '/app/views/acc.php';