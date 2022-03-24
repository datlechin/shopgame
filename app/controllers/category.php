<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../bootstrap.php';

$slug = cleanInput($_GET['slug']);
$result = $db->select('categories', '*', ['type' => 'game', 'slug' => $slug]);

if ($result) {
    $category = $result[0];
    $accounts = $db->select('accounts', '*', ['category_id' => $category['id']]);
    $title = $category['name'];
    require_once '../views/category.php';
} else {
    require_once '../controllers/errors/404.php';
}
