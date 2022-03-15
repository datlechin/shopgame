<?php

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Người dùng';

$count = $db->count('users');

try {
    $pagination = new \ShopGame\core\Pagination([
        'totalCount' => $count,
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

$users = $db->select('users', '*', [
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once '../../views/admin/users.php';