<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

define('ROOT_PATH', dirname(__DIR__, 2));

require_once ROOT_PATH . '/app/bootstrap.php';

$title = 'Trang chủ';

$categories = $db->select('categories', '*', ['type' => 'game', 'status' => 1]);

require_once ROOT_PATH . '/app/views/home.php';
