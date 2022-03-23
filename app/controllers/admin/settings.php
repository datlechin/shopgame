<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Cài đặt trang web';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? cleanInput($_POST['title']) : setting('title');
    $description = isset($_POST['description']) ? cleanInput($_POST['description']) : setting('description');
    $keywords = isset($_POST['keywords']) ? cleanInput($_POST['keywords']) : setting('keywords');
    $noticeModal = isset($_POST['noticeModal']) ? cleanInput($_POST['noticeModal']) : setting('noticeModal');

    $data = array();

    foreach ($_POST as $key => $value) {
        if ($key === 'title' || $key === 'description' || $key === 'keywords' || $key === 'noticeModal') {
            $db->update('settings', ['value' => $value], ['key' => $key]);
            $data = array(
                'status' => 'success',
                'message' => 'Cập nhật thành công'
            );
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'Cập nhật thất bại'
            );
        }
    }

    responseJson($data);
}

require_once '../../views/admin/settings.php';