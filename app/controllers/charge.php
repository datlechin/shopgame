<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

use ShopGame\core\ChargeProvider;

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

            $charge = new ChargeProvider($user, $db);
            $charge->init($telco, (int) $amount, $serial, $pin, $request_id);
            $charge->postCard();

            if ($charge->status == 200 || $charge->status == 99) {
                $success = 'Nạp thẻ thành công';
            } else {
                $error = $charge->message;
            }
        }
    }
}

$count = $db->count('charges', ['user_id' => $user['id']]);

try {
    $pagination = new \ShopGame\core\Pagination([
        'totalCount' => $count,
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

$charges = $db->select('charges', '*', [
    'user_id' => $user['id'],
    'ORDER' => ['id' => 'DESC'],
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once '../views/charge.php';
