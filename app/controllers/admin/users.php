<?php

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Người dùng';

$users = $db->select('users', '*');

require_once '../../views/admin/users.php';