<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

define('ROOT_PATH', dirname(__DIR__, 2));

require_once ROOT_PATH . '/app/bootstrap.php';

$title = 'Ủng hộ';

$sponsors = array(
    [
        'name' => 'Nguyễn Xuân Nam',
        'money' => 20000,
    ],
    [
        'name' => 'Bùi Văn Hải',
        'money' => 100000
    ],
    [
        'name' => 'Vũ Quốc Hải',
        'money' => 10000
    ]
);

require_once ROOT_PATH . '/app/views/sponsors.php';