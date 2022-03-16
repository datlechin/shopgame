<?php

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Danh mục';

$count = $db->count('categories');

try {
    $pagination = new \ShopGame\core\Pagination([
        'totalCount' => $count,
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

$categories = $db->select('categories', '*', [
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once '../../views/admin/categories.php';