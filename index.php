<?php

require_once 'app/bootstrap.php';

$title = 'Trang chủ';

$categories = $db->select('categories', '*', ['type' => 'game']);

require_once 'app/views/home.php';