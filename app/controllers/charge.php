<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../bootstrap.php';

redirectIfNotLoggedIn();

$title = 'Nạp thẻ';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telco = cleanInput($_POST['telco']);
    $amount = cleanInput($_POST['amount']);
    $serial = cleanInput($_POST['serial']);
    $pin = cleanInput($_POST['pin']);

    if ($telco === '') {
        $error = 'Vui lòng chọn loại thẻ';
    } else if ($amount === '') {
        $error = 'Vui lòng chọn mệnh giá';
    } else if ($serial === '') {
        $error = 'Vui lòng nhập số serial';
    } else if ($pin === '') {
        $error = 'Vui lòng nhập mã thẻ';
    } else {
        $cardExists = $db->has('charges', [
            'serial' => $serial,
            'pin' => $pin
        ]);
        if ($cardExists) {
            $error = 'Thẻ bạn nạp đã tồn tại trong hệ thống';
        } else {
            $request_id = rand(000000000, 999999999);
            $card = [
                'user_id' => $user['id'],
                'telco' => $telco,
                'amount_declared' => $amount,
                'serial' => $serial,
                'pin' => $pin,
                'request_id' => $request_id,
                'status' => '0'
            ];
            $db->insert('charges', $card);
            $success = 'Nạp thẻ thành công';
        }
    }
}

$charges = $db->select('charges', '*', [
    'user_id' => $user['id'],
    'ORDER' => ['id' => 'DESC']
]);

require_once '../views/charge.php';