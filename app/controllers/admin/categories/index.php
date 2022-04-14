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

$title = 'Danh mục';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = cleanInput($_POST['type']);
    $name = cleanInput($_POST['name']);
    $description = cleanInput($_POST['description']);
    $image = $_FILES['image'] ?? null;

    $data = array();

    if (!in_array($type, ['game', 'blog'])) {
        $data = [
            'status' => 'error',
            'message' => 'Loại danh mục không hợp lệ'
        ];
    } else if ($name == '') {
        $data = [
            'status' => 'error',
            'message' => 'Tên danh mục không được để trống'
        ];
    } else if ($image == '') {
        $data = [
            'status' => 'error',
            'message' => 'Hình ảnh không được để trống'
        ];
    } else {
        $cateCount = $db->count('categories', ['type' => $type, 'slug' => slug($name)]);
        if ($cateCount > 0) {
            $data = [
                'status' => 'error',
                'message' => 'Tên danh mục đã tồn tại'
            ];
        } else {
            $upload = new Upload($image);
            $image = $upload->allowed(['image/jpeg', 'image/png', 'image/gif'])
                ->maxSize(2 * 1024 * 1024)
                ->path(ROOT_PATH)
                ->upload();

            if ($upload->getError()) {
                $data = [
                    'status' => 'error',
                    'message' => $upload->getError()
                ];
            } else {
                $db->insert('categories', [
                    'type' => $type,
                    'name' => $name,
                    'slug' => slug($name),
                    'description' => $description,
                    'image' => $image,
                    'status' => 1
                ]);

                $data = [
                    'status' => 'success',
                    'message' => 'Thêm mới thành công'
                ];
            }
        }
    }

    responseJson($data);
}

$count = $db->count('categories');
$pagination = new \ShopGame\core\Pagination([
    'totalCount' => $count,
]);

$categories = $db->select('categories', '*', [
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once ROOT_PATH . '/app/views/admin/categories/index.php';
