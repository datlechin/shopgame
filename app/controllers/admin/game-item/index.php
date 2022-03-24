<?php

use ShopGame\core\Pagination;

define('PATH_ROOT', dirname(dirname(dirname(__DIR__))));

require_once PATH_ROOT . '/bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Tài khoản game';

$count = $db->count('categories');
$pagination = new Pagination([
    'totalCount' => $count,
]);

$accounts = $db->select('accounts', '*', [
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once PATH_ROOT . '/views/admin/game-item/index.php';
