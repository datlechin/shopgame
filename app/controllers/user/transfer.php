<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @version 0.0.1
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
    } else if ($username === $user['id'] || $username === $user['username']) {
        $error = 'Không thể chuyển cho chính mình';
    } else {
        $recipient = $userClass->findByIdOrUsername($username);
        if ($recipient === null) {
            $error = 'Tài khoản không tồn tại';
        } else {
            if ($user['balance'] < $amount) {
                $error = 'Số dư không đủ';
            } else {
                $userBalance = (int) $user['balance'] - (int) $amount;
                $recipientBalance = (int) $recipient['balance'] + (int) $amount;
                $userTrade = 'transfer';
                $recipientTrade = 'receive';

                $db->query("UPDATE users SET balance = balance - $amount WHERE id = '$user[id]'");
                $db->query("UPDATE users SET balance = balance + $amount WHERE id = '$recipient[id]'");
                $db->query("INSERT INTO transfers (user_id, recipient_id, amount, description, status) VALUES ('$user[id]', '$recipient[id]', '$amount', '$description', 1)");
                $db->query("INSERT INTO transactions (user_id, trade_type, amount, balance, description, status) VALUES ('$user[id]', '$userTrade', '$amount', '$userBalance', 'Chuyển tiền cho $recipient[username]', 1)");
                $db->query("INSERT INTO transactions (user_id, trade_type, amount, balance, description, status) VALUES ('$recipient[id]', '$recipientTrade', '$amount', '$recipientBalance', 'Nhận tiền từ $user[username]', 1)");
                $success = 'Chuyển tiền thành công';
            }
        }
    }
}

$result = $db->query("SELECT * FROM transfers WHERE user_id = '$user[id]' OR `recipient_id` = '$user[id]' ORDER BY id DESC");
$transfers = $result->fetch_all(MYSQLI_ASSOC);

require_once '../../views/user/transfer.php';