<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../../bootstrap.php';

redirectIfNotLoggedIn();

$title = 'Thông tin tài khoản';

require_once '../../views/user/profile.php';