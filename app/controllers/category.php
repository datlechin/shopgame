<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

use ShopGame\core\Pagination;

require_once '../bootstrap.php';

$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = explode('?', $request_uri);
$request_uri = $request_uri[1] ?? '';
$request_uri = explode('page=', $request_uri);
$page = $request_uri[1] ?? 1;

$slug = cleanInput($_GET['slug']);
$result = $db->select('categories', '*', [
    'type' => 'game',
    'slug' => $slug,
    'status' => 1
]);

if (count($result) > 0) {
    $_GET['page'] = $page;
    $category = $result[0];
    $title = $category['name'];

    $count = $db->count('accounts', [
        'category_id' => $category['id'],
        'status' => 1
    ]);

    $pagination = new Pagination([
        'totalCount' => $count,
    ]);

    $accounts = $db->select('accounts', '*', [
        'category_id' => $category['id'],
        'status' => 1,
        'ORDER' => ['id' => 'DESC'],
        'LIMIT' => [$pagination->offset, $pagination->limit]
    ]);

    require_once '../views/category.php';
} else {
    require_once '../controllers/errors/404.php';
}
