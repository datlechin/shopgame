<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

use ShopGame\core\Upload;

define('ROOT_PATH', dirname(__DIR__, 4));


require_once ROOT_PATH . '/app/bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Chỉnh sửa danh mục';

$id = cleanInput($_GET['id']);

$query = $db->select('categories', '*', ['id' => $id]);

if (count($query) < 1) {
    require_once ROOT_PATH . '/app/controllers/errors/404.php';
}

$category = $query[0];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = cleanInput($_POST['type']);
    $name = cleanInput($_POST['name']);
    $description = cleanInput($_POST['description']);
    $image = $_FILES['image'] ?? null;

    if (!in_array($type, ['game', 'blog'])) {
        $error = 'Loại danh mục không hợp lệ';
    } else if ($name == '') {
        $error = 'Tên danh mục không được để trống';
    } else {
        $cateCount = $db->count('categories', ['type' => $type, 'slug[!]' => $category['slug']]);
        if ($cateCount > 0) {
            $error = 'Tên danh mục đã tồn tại';
        } else {
            if ($image['size'] > 0) {
                $upload = new Upload($image);
                $image = $upload->allowed(['image/jpeg', 'image/png', 'image/gif'])
                    ->maxSize(2 * 1024 * 1024)
                    ->path(ROOT_PATH)
                    ->upload();

                if ($upload->getError()) {
                    $error = $upload->getError();
                }
            } else {
                $image = $category['image'];
            }

            $db->update('categories', [
                'type' => $type,
                'name' => $name,
                'description' => $description,
                'image' => $image,
            ], 'categories', ['id' => $id]);

            $_SESSION['success'] = 'Sửa danh mục thành công';

            redirect('/admin/categories');
        }
    }
}

require_once ROOT_PATH . '/app/views/admin/categories/edit.php';
