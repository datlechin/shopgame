<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__, 3));
}

require_once ROOT_PATH . '/app/bootstrap.php';

$title = '404 Not Found';

require_once ROOT_PATH . '/app/views/errors/404.php';

header('HTTP/1.0 404 Not Found');
exit();