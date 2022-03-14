<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../../bootstrap.php';

redirectIfNotLoggedIn();

$title = 'Lịch sử giao dịch';

$transactions = $db->select('transactions', '*', [
    'user_id' => $user['id'],
    'ORDER' => ['id' => 'DESC']
]);

require_once '../../views/user/tran-log.php';