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

$title = 'Cộng trừ tiền';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = cleanInput($_POST['username']);
    $type = cleanInput($_POST['type']);
    $money = cleanInput($_POST['money']);
    $description = cleanInput($_POST['description']);

    if ($username == '') {
        $error = 'Tên tài khoản nguời nhận không được để trống';
    } else if ($type == '') {
        $error = 'Loại giao dịch không được để trống';
    } else if ($money == '') {
        $error = 'Vui lòng nhập số tiền';
    } else if (!in_array($type, [1, 2, 3])) {
        $error = 'Loại giao dịch không hợp lệ';
    } else if ($money <= 0) {
        $error = 'Số tiền phải lớn hơn 0';
    } else {
        $user = $userClass->findByAny($username);
        if ($user) {
            if ($description == '') {
                if ($type == 1) {
                    $description = 'Được quản trị viên cộng ' . number_format($money) . 'đ';
                } else if ($type == 2) {
                    $description = 'Bị quản trị viên trừ ' . number_format($money) . 'đ';
                } else if ($type == 3) {
                    $description = 'Được quản trị viên hoàn trả ' . number_format($money) . 'đ';
                }
            }
            $userClass->updateBalance($user['id'], $money, $type, $description);
            $success = 'Thực hiện thành công';

            $username = '';
            $type = '';
            $money = '';
            $description = '';
        } else {
            $error = 'Không tìm thấy người nhận';
        }
    }
}

require_once '../../views/admin/money.php';