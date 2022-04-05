<?php
require_once '../../views/partials/header.php';
?>

<div class="container py-4">
    <div class="row">
        <?php require_once '../../views/partials/user-sidebar.php'; ?>
        <div class="col-md-9 mt-4 mt-md-0">
            <h2 class="text-uppercase fw-bold"><?php echo (isset($title)) ? $title : 'Lịch sử giao dịch'; ?></h2>
            <?php require_once '../../views/partials/message.php'; ?>
            <form action="/user/transfer" method="post">
                <div class="form-outline mb-3">
                    <input type="text" id="user" class="form-control" value="<?php echo $user['username']; ?> - <?php echo number_format($user['balance']); ?>đ" disabled>
                    <label for="user" class="form-label">Thông tin</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo (isset($username)) ? $username : ''; ?>">
                    <label for="username" class="form-label">Tài khoản/ID người nhận</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="number" id="amount" name="amount" class="form-control" value="<?php echo (isset($amount)) ? $amount : ''; ?>">
                    <label for="amount" class="form-label">Số tiền</label>
                </div>
                <div class="form-outline mb-3">
                    <textarea id="description" name="description" class="form-control"><?php echo (isset($description)) ? $description : ''; ?></textarea>
                    <label for="description" class="form-label">Nội dung chuyển tiền</label>
                </div>
                <button class="btn btn-info">Thực hiện</button>
            </form>
            <div class="table-responsive mt-4">
                <table class="table <?= (setting('dark_mode') == 1) ? 'table-dark' : null ?> table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Thời gian</th>
                        <th>Tài khoản chuyển/nhận</th>
                        <th>Số tiền</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($transfers as $transfer): ?>
                        <tr>
                            <td><?php echo $transfer['created_at']; ?></td>
                            <td>
                                <?php
                                if ($transfer['user_id'] == $user['id']) {
                                    echo getUsernameById($transfer['recipient_id']);
                                } else {
                                    echo getUsernameById($transfer['user_id']);
                                }
                                ?>
                            </td>
                            <td><?php echo number_format($transfer['amount']); ?>đ</td>
                            <td><?php echo $transfer['description']; ?></td>
                            <td>
                                <?php if ($transfer['status'] == 0): ?>
                                    <span class="badge bg-warning">Chờ xử lý</span>
                                <?php elseif ($transfer['status'] == 1): ?>
                                    <span class="badge bg-success">Thành công</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Thất bại</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php \ShopGame\core\PaginationWidget::widget(['pagination' => $pagination]); ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once '../../views/partials/footer.php';
?>
