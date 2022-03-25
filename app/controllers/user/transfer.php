<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

require_once '../../bootstrap.php';

redirectIfNotLoggedIn();

$title = 'Chuyển tiền';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = cleanInput($_POST['username']);
    $amount = cleanInput($_POST['amount']);
    $description = cleanInput($_POST['description']);

    if ($username === '') {
        $error = 'Vui lòng nhập tài khoản hoặc ID người nhận';
    } else if ($amount === '') {
        $error = 'Vui lòng nhập số tiền';
    } else if ($description === '') {
        $error = 'Vui lòng nhập nội dung';
    } else if ($amount < 10000) {
        $error = 'Số tiền chuyển phải lớn hơn 10.000';
    } else if ($username == $user['id'] || $username == $user['username']) {
        $error = 'Không thể chuyển cho chính mình';
    } else {
        $recipient = $userClass->findByIdOrUsername($username);
        if ($recipient === null) {
            $error = 'Tài khoản không tồn tại';
        } else {
            if ($user['balance'] < $amount) {
                $error = 'Số dư không đủ';
            } else {
                $userBalance = (int)$user['balance'] - (int)$amount;
                $recipientBalance = (int)$recipient['balance'] + (int)$amount;

                $db->update('users', ['balance' => $userBalance], ['id' => $user['id']]);
                $db->update('users', ['balance' => $recipientBalance], ['id' => $recipient['id']]);
                $db->insert('transfers', [
                    'user_id' => $user['id'],
                    'recipient_id' => $recipient['id'],
                    'amount' => $amount,
                    'description' => $description,
                    'status' => 1
                ]);
                $db->insert('transactions', [
                    'user_id' => $user['id'],
                    'trade_type' => 2,
                    'amount' => $amount,
                    'balance' => $userBalance,
                    'description' => 'Chuyển tiền cho ' . $recipient['username'],
                    'status' => 1
                ]);
                $db->insert('transactions', ['user_id' => $recipient['id'],
                    'trade_type' => 3,
                    'amount' => $amount,
                    'balance' => $recipientBalance,
                    'description' => 'Nhận tiền từ ' . $user['username'],
                    'status' => 1
                ]);
                $success = 'Chuyển tiền thành công';
                $username = '';
                $amount = '';
                $description = '';
            }
        }
    }
}

$count = $db->count('transfers', ['user_id' => $user['id']]);

try {
    $pagination = new \ShopGame\core\Pagination([
        'totalCount' => $count,
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

$transfers = $db->select('transfers', '*', [
    'OR' => ['user_id' => $user['id'], 'recipient_id' => $user['id']],
    'ORDER' => ['id' => 'DESC'],
    'LIMIT' => [$pagination->offset, $pagination->limit]
]);

require_once '../../views/user/transfer.php';