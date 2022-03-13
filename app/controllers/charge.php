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
        $cardExists = $db->query("SELECT * FROM charges WHERE serial = '$serial' AND pin = '$pin'")->num_rows;
        if ($cardExists == 0) {

        } else {
            $error = 'Thẻ bạn nạp đã tồn tại trong hệ thống';
        }
    }
}

require_once '../views/charge.php';