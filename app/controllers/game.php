<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../bootstrap.php';

$slug = cleanInput($_GET['slug']);
$result = $db->select('categories', '*', ['slug' => $slug]);

if ($result) {
    $game = $result[0];
    $title = $game['name'];
    require_once '../views/game.php';
} else {
    require_once '../controllers/errors/404.php';
}
