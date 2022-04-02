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

redirectIfNotLoggedIn();

$title = 'Tài khoản đã mua';

$accounts = $db->select('accounts', '*', [
    'buyer_id' => $user['id'],
    'status' => 0,
    'ORDER' => ['id' => 'DESC']
]);

$pagination = new Pagination([
    'totalCount' => count($accounts),
]);

$categories = $db->select('categories', '*', [
    'status' => 1,
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once ROOT_PATH . '/app/views/tran/acc.php';
