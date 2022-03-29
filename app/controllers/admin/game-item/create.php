<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

use ShopGame\core\Upload;

define('PATH_ROOT', dirname(dirname(dirname(__DIR__))));

require_once PATH_ROOT . '/bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Thêm mới tài khoản game';

$categories = $db->select('categories', '*', [
    'type' => 'game',
    'status' => 1
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = cleanInput($_POST['category_id']) ?? $categories[0]['id'];
    $acc_name = cleanInput($_POST['acc_name']);
    $acc_pass = cleanInput($_POST['acc_pass']);
    $price = cleanInput($_POST['price']);
    $description = cleanInput($_POST['description']);
    $image = $_FILES['image'];
    $content = trim(cleanInput($_POST['content']));
    $urls = explode(',', $content);

    if (!in_array($category_id, array_column($categories, 'id'))) {
        $error = 'Danh mục game đã chọn không hợp lệ';
    } else if ($acc_name == '') {
        $error = 'Vui lòng nhập tài khoản game';
    } else if ($price == '') {
        $error = 'Vui lòng nhập giá bán';
    } else if ($price < 1000) {
        $error = 'Giá bán không được nhỏ hơn 1.000';
    } else if ($price > 100000000) {
        $error = 'Giá bán không được lớn hơn 100.000.000';
    } else if (count($urls) > 20) {
        $error = 'Số lượng link không được lớn hơn 20';
    } else {
        $uploadImage = new Upload($image);
        $image = $uploadImage->allowed(['image/jpeg', 'image/png', 'image/gif'])
            ->maxSize(10 * 1024 * 1024)
            ->path(dirname(__DIR__, 4))
            ->upload();

        if ($uploadImage->getError()) {
            $error = $uploadImage->getError();
        } else {
            $db->insert('accounts', [
                'seller_id' => $user['id'],
                'category_id' => $category_id,
                'acc_name' => $acc_name,
                'acc_pass' => $acc_pass,
                'price' => $price,
                'image' => $image,
                'content' => $content,
                'description' => $description,
                'status' => 1,
            ]);

            $success = 'Thêm mới tài khoản game thành công';

            $acc_name = '';
            $acc_pass = '';
            $price = '';
            $description = '';
            $content = '';
        }
    }
}

require_once PATH_ROOT . '/views/admin/game-item/create.php';