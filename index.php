<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once 'app/bootstrap.php';

$title = 'Trang chủ';

$categories = $db->select('categories', '*', ['type' => 'game']);

require_once 'app/views/home.php';
