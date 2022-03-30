<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

define('ROOT_PATH', dirname(__DIR__, 2));

require_once ROOT_PATH . '/app/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = cleanInput($_GET['id']);
    $account = $db->select('accounts', '*', [
        'id' => $id,
        'status' => 1
    ]);

    if (count($account) < 1) require_once ROOT_PATH . '/app/controllers/errors/404.php';

    $account = $account[0];

    require_once ROOT_PATH . '/app/views/buyacc.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = cleanInput($_POST['id']);
    $account = $db->select('accounts', '*', [
        'id' => $id,
        'status' => 1
    ]);

    $succes = null;
    $error = null;

    if (!$userClass->isLoggedIn()) {
        $error = 'Bạn cần đăng nhập để mua tài khoản';
    } else if (count($account) < 1) {
        require_once ROOT_PATH . '/app/controllers/errors/404.php';
    } else {
        $account = $account[0];
        if ($user['balance'] < $account['price']) {
            $error = 'Bạn không đủ tiền để mua tài khoản này';
        } else if ($account['price'] < 1000) {
            $error = 'Tài khoản game không thể mua với giá nhỏ hơn 1000đ, vui lòng thử lại sau!';
        } else {
            $balance = (int) $user['balance'] - (int) $account['price'];
            $db->update('users', ['balance' => $balance], ['id' => $user['id']]);
            $db->update('accounts', [
                'status' => 0,
                'buyer_id' => $user['id'],
                'sold_at' => now()
            ], ['id' => $account['id']]);
            $db->insert('transactions', ['user_id' => $user['id'],
                'trade_type' => 8,
                'amount' => $account['price'],
                'balance' => $balance,
                'description' => 'Mua tài khoản game #' . $account['id'],
                'status' => 1
            ]);
            $succes  = 'Mua tài khoản thành công';
        }
        $_SESSION['error'] = $error;
        $_SESSION['success'] = $succes;

        redirect('/acc/' . $id);
    }
}