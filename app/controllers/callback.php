<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../bootstrap.php';

if (isset($_GET['status'], $_GET['card_code'], $_GET['card_seri'], $_GET['requestid'])) {
    $status = cleanInput($_GET['status']);
    $pin = cleanInput($_GET['card_code']);
    $serial = cleanInput($_GET['card_seri']);
    $request_id = cleanInput($_GET['requestid']);
    $amount = $_GET['value_receive'];

    $query = $db->select('charges', '*', [
        'AND' => [
            'status' => 0,
            'serial' => $serial,
            'request_id' => $request_id
        ]
    ]);

    if (count($query) > 0) {
        $charge = $query[0];
        if ($status == 200) {
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
        } else if ($status == 201) {
            // Thẻ sai mệnh giá
            $real_status = 2;
        } else if ($status == 100) {
            // Thẻ sai
            $real_status = 3;
        }
        $db->update('charges', [
            'status' => $real_status,
            'amount' => $amount,
            'updated_at' => now()
        ], ['id' => $charge['id']]);
    } else {
        require_once '../controllers/errors/404.php';
    }
} else {
    require_once '../controllers/errors/404.php';
}
