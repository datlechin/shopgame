<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../../bootstrap.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$title = 'Thông tin tài khoản';

require_once '../../views/user/profile.php';