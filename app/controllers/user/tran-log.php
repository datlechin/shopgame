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

$where = 'WHERE `user_id` = ' . $user['id'];

if (isset($_GET['trade_type']) || isset($_GET['started_at']) || isset($_GET['ended_at'])) {
    $trade_type = cleanInput($_GET['trade_type']);
    $started_at = cleanInput($_GET['started_at']);
    $ended_at = cleanInput($_GET['ended_at']);

    if ($trade_type) {
        $where .= ' AND `trade_type` = ' . $trade_type;
    }
    if ($started_at) {
        $where .= ' AND `created_at` >= "' . $started_at . '"';
    }
    if ($ended_at) {
        $where .= ' AND `created_at` <= "' . $ended_at . '"';
    }
}

$result = $db->query('SELECT * FROM `transactions` ' . $where . ' ORDER BY `id` DESC');
$transactions = $result->fetch_all(MYSQLI_ASSOC);

require_once '../../views/user/tran-log.php';