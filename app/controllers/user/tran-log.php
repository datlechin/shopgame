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

$result = $db->query('SELECT * FROM `transactions` WHERE `user_id` = ' . $user['id'] . ' ORDER BY `id` DESC');
$transactions = $result->fetch_all(MYSQLI_ASSOC);

require_once '../../views/user/tran-log.php';