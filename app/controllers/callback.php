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

    $query = $db->select('charges', '*', [
        'AND' => [
            'status' => 0,
            'serial' => $serial,
            'request_id' => $request_id
        ]
    ]);

    if (count($query) > 0) {
        $charge = $query[0];
    } else {
        require_once '../controllers/errors/404.php';
    }
} else {
    require_once '../controllers/errors/404.php';
}
