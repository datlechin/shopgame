<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../../bootstrap.php';

$title = 'Blog';

$categories = $db->select('categories', '*', [
    'type' => 'blog',
]);

require_once '../../views/blog/index.php';