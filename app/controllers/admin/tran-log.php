<?php

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

$title = 'Lịch sử giao dịch';

$transactions = $db->select('transactions', '*', [
    'ORDER' => ['id' => 'DESC']
]);

require_once '../../views/admin/tran-log.php';