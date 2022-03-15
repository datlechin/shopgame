<?php

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Bảng điều khiển';

$users = $db->count('users');

require_once '../../views/admin/dashboard.php';