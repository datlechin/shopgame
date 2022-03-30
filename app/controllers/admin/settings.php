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
    $data = array();

    foreach ($_POST as $key => $value) {
        $db->update('settings', ['value' => $value], ['key' => $key]);
        $data = array(
            'status' => 'success',
            'message' => 'Cập nhật thành công'
        );
    }

    responseJson($data);
}

require_once '../../views/admin/settings.php';