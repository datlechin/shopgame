<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

define('ROOT_PATH', dirname(__DIR__, 2));

require_once ROOT_PATH . '/app/bootstrap.php';

$status = null;
$serial = null;
$amount = null;
$request_id = null;
$real_status = null;

// Cardvip callback
if (isset($_GET['card_seri'], $_GET['requestid'])) {
    $status = cleanInput($_GET['status']);
    $serial = cleanInput($_GET['card_seri']);
    $amount = cleanInput($_GET['value_receive']);
    $request_id = cleanInput($_GET['requestid']);
}

// Thesieure callback
if (isset($_GET['serial'], $_GET['request_id'])) {
    $status = cleanInput($_GET['status']);
    $serial = cleanInput($_GET['serial']);
    $amount = cleanInput($_GET['value']);
    $request_id = cleanInput($_GET['request_id']);
}

$query = $db->select('charges', '*', [
    'AND' => [
        'status' => 0,
        'serial' => $serial,
        'request_id' => $request_id
    ]
]);

if (!empty($query)) {
    $charge = $query[0];

    if ($status == 200 || $status == 1) {
        // Thẻ đúng: cộng tiền cho người dùng, thêm lịch sử giao dịch
        $real_status = 1;
        $balance = $user['balance'] + $amount;
        $db->update('users', [
            'balance' => $balance
        ], ['id' => $charge['user_id']]);
        $db->insert('transactions', [
            'user_id' => $user['id'],
            'trade_type' => 1,
            'amount' => $amount,
            'balance' => $balance,
            'description' => 'Nạp thành công thẻ ' . number_format($amount) . 'đ',
            'status' => 1
        ]);
    } else if ($status == 201 || $status == 2) {
        // Thẻ sai mệnh giá
        $real_status = 2;
    } else if ($status == 100 || $status == 3) {
        // Thẻ sai
        $real_status = 3;
    }
    $db->update('charges', [
        'status' => $real_status,
        'amount' => $amount,
        'updated_at' => now()
    ], ['id' => $charge['id']]);
} else {
    require_once ROOT_PATH . '/app/controllers/errors/404.php';
}