<?php

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Lịch sử giao dịch';

$count = $db->count('transactions');

try {
    $pagination = new \ShopGame\core\Pagination([
        'totalCount' => $count,
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

$transactions = $db->select('transactions', '*', [
    'ORDER' => ['id' => 'DESC'],
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once '../../views/admin/tran-log.php';