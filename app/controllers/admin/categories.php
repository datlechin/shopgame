<?php

use ShopGame\core\Upload;

require_once '../../bootstrap.php';

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
        $upload = new Upload($image);
        $upload->allowed(['image/jpeg', 'image/png', 'image/gif']);
        $upload->maxSize(2 * 1024 * 1024);
        $upload->path(dirname(dirname(dirname(__DIR__))));
        $imagePath = $upload->upload();
        if ($upload->getError() != '') {
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
                'image' => $imagePath,
                'status' => 1
            ]);

            $data = [
                'status' => 'success',
                'message' => 'Thêm mới thành công'
            ];
        }
    }

    echo json_encode($data);
    header('Content-Type: application/json');
    exit();
}

$count = $db->count('categories');
$pagination = new \ShopGame\core\Pagination([
    'totalCount' => $count,
]);

$categories = $db->select('categories', '*', [
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once '../../views/admin/categories.php';
